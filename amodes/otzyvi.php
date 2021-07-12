<?php
if (!defined("TKM")) {
	die("<pre>Нет доступа!</pre>");
}

$page['title']   = "Отзывы";
$page['pid']	 = "otzyvi";

if (isset($_GET['do']) && $_GET['do'] == "edit") {
	$login = $_GET['id'];
	$sth = $link->prepare("SELECT * FROM `otzyvi` WHERE `login` = ?");
	$sth->execute(array($login));
	$row = $sth->fetch();

	if (empty($row['login'])) {
		MessageSend(1, "Не найдено!", '?mode=otzyvi');
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$new_login = TextSave(@$_POST['login']);
		$new_city = TextSave(@$_POST['city']);
		$new_rate = TextSave(@$_POST['rate']);
		$new_text = TextSave(@$_POST['text']);

		if (empty($new_login)) {
			MessageSend(1, "Заполните все поля!");
		}

		$link->prepare("UPDATE `otzyvi` SET `login` = '{$new_login}',`city`='{$new_city}',`rate`='{$new_rate}',`text`='{$new_text}' WHERE `login` = '{$login}'")->execute();
		MessageSend(3, "Отзыв успешно изменён!", '?mode=otzyvi');
	}

	$page['title'] = "Изменение \"{$row['login']}\"";

	ob_start();
	include STYLE_DIR . '/admin/otzyvi/edit.html';
	$page['content'] = ob_get_clean();
} elseif (isset($_GET['do']) && $_GET['do'] == "add") {
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$new_login = TextSave(@$_POST['login']);
		$new_city = TextSave(@$_POST['city']);
		$new_rate = TextSave(@$_POST['rate']);
		$new_text = TextSave(@$_POST['text']);

		if (empty($login)) {
			MessageSend(1, "Заполните все поля!");
		}

		$link->prepare("INSERT INTO `otzyvi` (`login`,`city`,`rate`,`text`) VALUES ('{$new_login}','{$new_city}','{$new_rate}','{$new_text}')")->execute();
		MessageSend(3, "Отзыв успешно добавлен!", '?mode=otzyvi');
	}

	$page['title'] = "Добавление отзыва";
	$row = array('login' => '', 'ip' => '', );

	ob_start();
	include STYLE_DIR . '/admin/otzyvi/edit.html';
	$page['content'] = ob_get_clean();
} elseif (isset($_GET['do']) && $_GET['do'] == "delete") {
	$login = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$sth = $link->prepare("SELECT `login` FROM `otzyvi` WHERE `login` = ?");
		$sth->execute(array($login));
		$check = $sth->fetch();
		
		if (empty($check['login'])) {
			MessageSend(1, "Не найден!", '?mode=otzyvi');
		}

		$count = $link->query("SELECT COUNT(*) FROM `otzyvi`")->fetchColumn();

		if ($count <= 1) {
			MessageSend(1, "Должен быть минимум 1 отзыв.", '?mode=otzyvi');
		}

		if (!$link->prepare("DELETE FROM `otzyvi` WHERE `login` = ?")->execute(array($login))) {
			MessageSend(1, "Ошибка!", '?mode=otzyvi');
		}

		MessageSend(3, "Отзыв успешно удалён!", '?mode=otzyvi');
	}

	$page['title'] = "Подтверждение";

	ob_start();
	include STYLE_DIR . '/admin/check.html';
	$page['content'] = ob_get_clean();
} else {
	$qur = $link->query("SELECT * FROM `otzyvi`");

	ob_start();

	while ($data = $qur->fetch()) {
		include STYLE_DIR . '/admin/otzyvi/list_id.html';
	}

	$list = ob_get_clean();

	if (empty($list)) {
		$list = '<tr><td class="text-center" colspan="3"><b>Пусто <i class="ti-face-sad"></i></b></td></tr>';
	}

	ob_start();
	include STYLE_DIR . '/admin/otzyvi/main.html';
	$page['content'] = ob_get_clean();
}