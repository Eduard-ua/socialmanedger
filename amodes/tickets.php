<?php
if (!defined("TKM")) {
	die("<pre>Нет доступа!</pre>");
}

$page['title']   = "Тикеты";
$page['pid']	 = "tickets";

if (isset($_GET['do']) && $_GET['do'] == "delete") {
	$id = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$sth = $link->prepare("SELECT `id` FROM `tickets` WHERE `id` = ?");
		$sth->execute(array($id));
		$check = $sth->fetch();
		
		if (empty($check['id'])) {
			MessageSend(1, "Не найден!", '?mode=tickets');
		}

		$count = $link->query("SELECT COUNT(*) FROM `tickets`")->fetchColumn();

		if ($count <= 1) {
			MessageSend(1, "Должен быть минимум 1 Тикет.", '?mode=tickets');
		}

		if (!$link->prepare("DELETE FROM `tickets` WHERE `id` = ?")->execute(array($id))) {
			MessageSend(1, "Ошибка!", '?mode=tickets');
		}

		MessageSend(3, "Тикет успешно удалён!", '?mode=tickets');
	}

	$page['title'] = "Подтверждение";

	ob_start();
	include STYLE_DIR . '/admin/check.html';
	$page['content'] = ob_get_clean();
} elseif (isset($_GET['do']) && $_GET['do'] == "ok") {
	$id = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$link->query("UPDATE `tickets` SET `status` = 'Ответ отправлен на ваш Email' WHERE `id` = '".$id."'");

		MessageSend(3, "Тикету #".$id.", установлен статус <<Ответ отправлен на ваш Email!>>", '?mode=tickets');
	}

	$page['title'] = "Подтверждение";

	ob_start();
	include STYLE_DIR . '/admin/check.html';
	$page['content'] = ob_get_clean();
} elseif (isset($_GET['do']) && $_GET['do'] == "none") {
	$id = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$link->query("UPDATE `tickets` SET `status` = 'Отказано в ответе' WHERE `id` = '".$id."'");

		MessageSend(3, "Тикету #".$id.", установлен статус <<Отказано в ответе>>!", '?mode=tickets');
	}

	$page['title'] = "Подтверждение";

	ob_start();
	include STYLE_DIR . '/admin/check.html';
	$page['content'] = ob_get_clean();
} elseif (isset($_GET['do']) && $_GET['do'] == "wait") {
	$id = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$link->query("UPDATE `tickets` SET `status` = 'В ожидании' WHERE `id` = '".$id."'");

		MessageSend(3, "Тикету #".$id.", установлен статус <<В ожидании>>!", '?mode=tickets');
	}

	$page['title'] = "Подтверждение";

	ob_start();
	include STYLE_DIR . '/admin/check.html';
	$page['content'] = ob_get_clean();
} else {
	$qur = $link->query("SELECT * FROM `tickets`");

	ob_start();

	while ($data = $qur->fetch()) {
		include STYLE_DIR . '/admin/tickets/list_id.html';
	}

	$list = ob_get_clean();

	if (empty($list)) {
		$list = '<tr><td class="text-center" colspan="3"><b>Пусто <i class="ti-face-sad"></i></b></td></tr>';
	}

	ob_start();
	include STYLE_DIR . '/admin/tickets/main.html';
	$page['content'] = ob_get_clean();
}