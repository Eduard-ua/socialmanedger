<?php
define("TKM", true);
require(realpath("../system.php"));

if (isset($_GET['prepare_once'])) {
	$hash = md5($config['merchant']['fk_shop_id'] . ":" .
		$_GET['oa'] . ":" .
		$config['merchant']['fk_shop_key_2'] . ":" .
		$_GET['l']);

	exit('<hash>'.$hash.'</hash>');
}

function getrIP() {
	if(isset($_SERVER['HTTP_X_REAL_IP'])) {
		return $_SERVER['HTTP_X_REAL_IP'];
	}

	return $_SERVER['REMOTE_ADDR'];
}

if (!in_array(getrIP(), array(
	'136.243.38.147',
	'136.243.38.149',
	'136.243.38.150',
	'136.243.38.151',
	'136.243.38.189',
	'136.243.38.108')
)) {
	die("Hacking attempt!");
}

$sign = md5($config['merchant']['fk_shop_id'] . ':' .
	$_REQUEST['AMOUNT'] . ':' .
	$config['merchant']['fk_shop_key_2'] . ':' .
	$_REQUEST['MERCHANT_ORDER_ID']);

if ($sign != $_REQUEST['SIGN']) {
	die('wrong sign');
}

$link->query("UPDATE `users` SET `balance` = `balance` + '".$_REQUEST['AMOUNT']."', WHERE `login` = '".$_REQUEST['MERCHANT_ORDER_ID']."'");

exit('YES');