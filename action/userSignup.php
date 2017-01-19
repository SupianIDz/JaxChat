<?php
/*
*	Name   : Global Chat v1.0 Free Version
*	Author : Supian M
*	Email  : privcodelab@gmail.com
*	
*	2017 (c) www.priv-code.com
*/
require '../system/config.php';

if(isset($_POST['username']) && isset($_POST['email'])):
	
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$email    = mysqli_real_escape_string($connection, $_POST['email']);

	$db->go("SELECT `user_id` FROM `tb_users` WHERE `username` = '$username' OR `email` = '$email'");
	if($db->numRows()):
		Notify('error', 'Username atau email sudah terdaftar.');
	else:
		$time = time();
		if($db->go("INSERT INTO `tb_users` (`user_id`, `username`, `password`, `email`, `avatar`, `last_action`, `online`) VALUES (NULL, '$username', '$password', '$email', 'default.jpg', '', '0')")):
			Notify('success', 'Pendaftaran berhasil.');
		endif;

	endif;
endif;