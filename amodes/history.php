<?php
if (!defined("TKM")) {
	die("<pre>Нет доступа!</pre>");
}

$page['title']   = "Заказы";
$page['pid']	 = "history";

if (isset($_GET['do']) && $_GET['do'] == "delete") {
	$id = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$sth = $link->prepare("SELECT `id` FROM `history` WHERE `id` = ?");
		$sth->execute(array($id));
		$check = $sth->fetch();
		
		if (empty($check['id'])) {
			MessageSend(1, "Не найден!", '?mode=history');
		}

		$count = $link->query("SELECT COUNT(*) FROM `history`")->fetchColumn();

		if ($count <= 1) {
			MessageSend(1, "Должен быть минимум 1 Заказ.", '?mode=history');
		}

		if (!$link->prepare("DELETE FROM `history` WHERE `id` = ?")->execute(array($id))) {
			MessageSend(1, "Ошибка!", '?mode=history');
		}

		MessageSend(3, "Заказ успешно удалён!", '?mode=history');
	}

	$page['title'] = "Подтверждение";

	ob_start();
	include STYLE_DIR . '/admin/check.html';
	$page['content'] = ob_get_clean();
} elseif (isset($_GET['do']) && $_GET['do'] == "ok") {
	$id = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$link->query("UPDATE `history` SET `status` = 'Выполнено' WHERE `id` = '".$id."'");

		MessageSend(3, "Заказу #".$id.", установлен статус <<Выполнено!>>", '?mode=history');
	}

	$page['title'] = "Подтверждение";

	ob_start();
	include STYLE_DIR . '/admin/check.html';
	$page['content'] = ob_get_clean();
} elseif (isset($_GET['do']) && $_GET['do'] == "none") {
	$id = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$o = $link->query("SELECT * FROM `history` WHERE `id` = '".$id."'");
		$p = $o->fetch();
		$a = $link->query("SELECT * FROM `users` WHERE `login` = '".$p['login']."'");
		$b = $a->fetch();
		$link->query("UPDATE `users` SET `balance` = `balance` + '".$p['cost']."' WHERE `login` = '".$b['login']."'");
		$link->query("UPDATE `history` SET `status` = 'Отказано, деньги остались на балансе' WHERE `id` = '".$id."'");

		MessageSend(3, "Заказу #".$id.", установлен статус <<Отказано>>!", '?mode=history');
	}

	$page['title'] = "Подтверждение";

	ob_start();
	include STYLE_DIR . '/admin/check.html';
	$page['content'] = ob_get_clean();
} elseif (isset($_GET['do']) && $_GET['do'] == "wait") {
	$id = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$link->query("UPDATE `history` SET `status` = 'В ожидании' WHERE `id` = '".$id."'");

		MessageSend(3, "Заказу #".$id.", установлен статус <<В ожидании>>!", '?mode=history');
	}

	$page['title'] = "Подтверждение";

	ob_start();
	include STYLE_DIR . '/admin/check.html';
	$page['content'] = ob_get_clean();
} else {
	$qur = $link->query("SELECT * FROM `history`");

	ob_start();

	while ($data = $qur->fetch()) {
		include STYLE_DIR . '/admin/history/list_id.html';
	}

	$list = ob_get_clean();

	if (empty($list)) {
		$list = '<tr><td class="text-center" colspan="3"><b>Пусто <i class="ti-face-sad"></i></b></td></tr>';
	}

	ob_start();
	include STYLE_DIR . '/admin/history/main.html';
	$page['content'] = ob_get_clean();
}