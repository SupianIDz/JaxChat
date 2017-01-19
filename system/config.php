<?php
/*
*	Name   : Global Chat v1.0 Free Version
*	Author : Supian M
*	Email  : privcodelab@gmail.com
*	
*	2017 (c) www.priv-code.com
*/

define('base_url', 'http://localhost/chat/');
define('db_hostname', '127.0.0.1');
define('db_name'   ,  'chat');
define('db_username', 'root');
define('db_password', 'exploded');

/*
* 
*/

$parse = parse_url(base_url);
define('SYS_DIR', $_SERVER['DOCUMENT_ROOT'] . $parse['path'] . 'system'.DIRECTORY_SEPARATOR);

/*
*
*/

require SYS_DIR . 'helper.php';

require SYS_DIR . 'database.class.php';

$db = new db();
$connection = $db->connect();

/*
*
*/