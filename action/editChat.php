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

$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : NULL;
$chatid = isset($_POST['id']) ? $_POST['id'] : NULL;

if($userid AND $chatid):

 	if(isset($_POST['getText'])):
		$db->go("SELECT `text` FROM `tb_chats` WHERE `chat_id` = '$chatid' AND `user_id` = '$userid'");
	 	echo $db->fetchObject()->text;
	endif;

	if(isset($_POST['editText'])):
		$chat = mysqli_real_escape_string($connection, trim(strip_tags($_POST['chat'], '<a><b><strong><s><strike>')));

		if($db->go("UPDATE `tb_chats` SET `text` = '$chat' WHERE `chat_id` = '$chatid' AND `user_id` = '$userid'")):
			echo 'Success';
		else:
			echo 'Failed';
		endif;

	endif;

endif;
