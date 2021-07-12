<?php
if (!defined("TKM")) {
	die("<pre>Нет доступа!</pre>");
}

$page['title']   = "Админ-панель";
$page['pid']     = "info";
ini_set('default_socket_timeout', '10');

$users_count     = $link->query("SELECT COUNT(*) FROM `AD_ADMINS`")->fetchColumn();

ob_start();
include STYLE_DIR . '/admin/info/main.html';
$page['content'] = ob_get_clean();