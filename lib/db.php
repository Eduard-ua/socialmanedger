<?php 
require 'rb.php';
define('TKM', true);
require $_SERVER['DOCUMENT_ROOT'].'/system.php';
R::setup( 'mysql:host='.$config['main']['db_host'].';dbname='.$config['main']['db_name'],$config['main']['db_user'], $config['main']['db_pass'] ); 

if ( !R::testconnection() )
{
		exit ('Нет соединения с базой данных');
}