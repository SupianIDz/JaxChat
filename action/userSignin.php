<?php
/*
*	Name   : Global Chat v1.0 Free Version
*	Author : Supian M
*	Email  : privcodelab@gmail.com
*	
*	2017 (c) www.priv-code.com
*/
require '../system/config.php';

if(isset($_POST['username']) && isset($_POST['password'])):

	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = $_POST['password'];

	$db->go("SELECT `user_id`, `password` FROM `tb_users` WHERE `username` = '$username'");
	$row = $db->fetchObject();

	if($db->numRows() == 0){
		Notify('error', 'Username tidak terdaftar.');
	} else if(!password_verify($password, $row->password)){
		Notify('error', 'Password salah.');
	} else {
		session_start();
		$_SESSION['userid'] = $row->user_id;
		$time = time();
		$db->go("UPDATE `tb_users` SET `last_action` = '$time', `online` = '1' WHERE `user_id` = '$row->user_id'");
		Notify('success', 'Sign In successfully', 'Sign In', true, 'index.php');
	}

endif;