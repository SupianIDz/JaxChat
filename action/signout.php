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

$userid = $_SESSION['userid'];

$db->go("UPDATE `tb_users` SET `online` = '0' WHERE `user_id` = '$userid'");

session_destroy();
header('location:../index.php');