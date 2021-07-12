<?php
if (!defined("TKM")) {
	die("<pre>Нет доступа!</pre>");
}

$page['title']   = "Пользователи";
$page['pid']	 = "user";

if (isset($_GET['do']) && $_GET['do'] == "edit") {
	$login = $_GET['id'];
	$sth = $link->prepare("SELECT * FROM `users` WHERE `login` = ?");
	$sth->execute(array($login));
	$row = $sth->fetch();

	if (empty($row['login'])) {
		MessageSend(1, "Не найдено!", '?mode=user');
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$new_login = TextSave(@$_POST['login']);
		$new_email = TextSave(@$_POST['email']);
		$new_balance = TextSave(@$_POST['balance']);
		$new_familiya = TextSave(@$_POST['familiya']);

		if (empty($new_login)) {
			MessageSend(1, "Заполните все поля!");
		}

		$link->prepare("UPDATE `users` SET `login` = '{$new_login}',`email`='{$new_email}',`familiya`='{$new_familiya}',`balance`='{$new_balance}' WHERE `login` = '{$login}'")->execute();
		MessageSend(3, "Пользователь успешно изменён!", '?mode=user');
	}

	$page['title'] = "Изменение \"{$row['login']}\"";

	ob_start();
	include STYLE_DIR . '/admin/user/edit.html';
	$page['content'] = ob_get_clean();
} elseif (isset($_GET['do']) && $_GET['do'] == "add") {
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$new_login = TextSave(@$_POST['login']);
		$new_email = TextSave(@$_POST['email']);
		$new_balance = TextSave(@$_POST['balance']);
		$new_familiya = TextSave(@$_POST['familiya']);

		if (empty($login)) {
			MessageSend(1, "Заполните все поля!");
		}

		$link->prepare("INSERT INTO `users` (`login`,`email`,`familiya`,`balance`) VALUES ('{$new_login}','{$new_email}','{$new_familiya}','{$new_balance}')")->execute();
		MessageSend(3, "Пользователь успешно добавлен!", '?mode=user');
	}

	$page['title'] = "Добавление пользователя";
	$row = array('login' => '', 'email' => '', 'familiya' => '', 'balance' => '');

	ob_start();
	include STYLE_DIR . '/admin/user/edit.html';
	$page['content'] = ob_get_clean();
} elseif (isset($_GET['do']) && $_GET['do'] == "delete") {
	$login = $_GET['id'];

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$sth = $link->prepare("SELECT `login` FROM `users` WHERE `login` = ?");
		$sth->execute(array($login));
		$check = $sth->fetch();
		
		if (empty($check['login'])) {
			MessageSend(1, "Не найден!", '?mode=user');
		}

		$count = $link->query("SELECT COUNT(*) FROM `users`")->fetchColumn();

		if ($count <= 1) {
			MessageSend(1, "Должен быть минимум 1 пользователь.", '?mode=user');
		}

		if (!$link->prepare("DELETE FROM `users` WHERE `login` = ?")->execute(array($login))) {
			MessageSend(1, "Ошибка!", '?mode=user');
		}

		MessageSend(3, "Пользователь успешно удалён!", '?mode=user');
	}

	$page['title'] = "Подтверждение";

	ob_start();
	include STYLE_DIR . '/admin/check.html';
	$page['content'] = ob_get_clean();
} else {
	$qur = $link->query("SELECT * FROM `users`");

	ob_start();

	while ($data = $qur->fetch()) {
		include STYLE_DIR . '/admin/user/list_id.html';
	}

	$list = ob_get_clean();

	if (empty($list)) {
		$list = '<tr><td class="text-center" colspan="3"><b>Пусто <i class="ti-face-sad"></i></b></td></tr>';
	}

	ob_start();
	include STYLE_DIR . '/admin/user/main.html';
	$page['content'] = ob_get_clean();
}