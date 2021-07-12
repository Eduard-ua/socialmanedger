<?php 
	require '../lib/db.php';
	unset($_SESSION['logged_user']);
	MessageSend(3, 'Вы успешно вышли из своего аккаунта!', '/');
?>
