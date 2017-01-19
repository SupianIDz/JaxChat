<?php
/*
*	Name   : Global Chat v1.0 Free Version
*	Author : Supian M
*	Email  : privcodelab@gmail.com
*	
*	2017 (c) www.priv-code.com
*/
require '../system/config.php';

session_start();

if(isset($_POST['chat'])):

	$userid = $_SESSION['userid'];
	$time = time();
	$chat = mysqli_real_escape_string($connection, trim(strip_tags($_POST['chat'], '<a><b><strong><s><strike>')));
	$query = $db->go("INSERT INTO `tb_chats`(`chat_id`, `user_id`, `text`, `date`) VALUES (NULL, '$userid', '$chat', now())");
	$db->go("UPDATE `tb_users` SET `last_action` = '$time', `online` = '1' WHERE `user_id` = '$userid'");
	if($query):
		echo 'Success';
	else:
		echo 'Failed';
	endif;
endif;