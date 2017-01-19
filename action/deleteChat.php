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

if(isset($_POST['id']) && !empty($_SESSION['userid'])):
	$id = (int)$_POST['id'];
	
	if($db->go("DELETE FROM `tb_chats` WHERE `chat_id` = '$id'")):
		echo 'Success';
	else:
		echo 'Failed';
	endif;
endif;