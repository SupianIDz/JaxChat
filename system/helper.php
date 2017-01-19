<?php
/*
*	Name   : Global Chat v1.0 Free Version
*	Author : Supian M
*	Email  : privcodelab@gmail.com
*	
*	2017 (c) www.priv-code.com
*/

function Notify($type = 'success', $message = '', $title = 'Notification', $progress = false, $redirect = false){
	$data = array(
		'type' => $type,
		'message' => $message, 
		'title' => $title,
		'progress' => $progress,
		'redirect' => $redirect
		);
	echo json_encode($data);
	exit();
}
