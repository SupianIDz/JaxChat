<?php
/*
*	Name   : Global Chat v1.0 Free Version
*	Author : Supian M
*	Email  : privcodelab@gmail.com
*	
*	2017 (c) www.priv-code.com
*/
require '../system/config.php';

if(isset($_GET['getOnline'])):
	$db->go("SELECT `username`, `email`, `avatar`, `last_action` FROM `tb_users` WHERE `online` = '1' ");
	while ($row = $db->fetchObject()): ?>
		<li class="online">
			<div class="media">
				<a href="#" class="pull-left media-thumb">
					<img alt="" src="assets/images/avatar/<?php echo $row->avatar;?>" class="media-object">
				</a>
				<div class="media-body">
					<strong><?php echo ucwords($row->username);?></strong>
					<small><a href="mailto:<?php echo $row->email;?>" target="_blank"><?php echo $row->email;?></a></small>
				</div>
			</div>
		</li>
<?php endwhile; endif;