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
error_reporting(0);
if(isset($_GET['checkOnline'])):
	$db->go("SELECT `user_id`, `username`, `last_action`, `online` FROM `tb_users` WHERE `online` = '1'");
	if($db->numRows() > 0):
		while($row = $db->fetchObject()):
			$time = time() - $row->last_action;
			if($time > 600):
				$db->go("UPDATE `tb_users` SET `online` = '0' WHERE `user_id` = '$row->user_id'");
				if($_SESSION['userid'] == $row->user_id):
					echo 0;
				endif;
			else:
				// echo "ID : $_SESSION[userid] - $row->user_id | Status : $row->online | Username : $row->username | Sekarang : ".time()." | Terakhir : $row->last_action | Selisih : $time  ";
			endif;
			 
		endwhile;
	endif;
endif;