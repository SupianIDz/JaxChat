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

if(isset($_GET['userid'])):
	
	$db->go("SELECT `chat_id` FROM `tb_chats`");
	$count = $db->numRows();
	
	if($count > 30):
		$from = $count - 30;
	else:
		$from = 0;
	endif;

	$db->go("SELECT tb_chats.chat_id, tb_chats.text, tb_chats.date, tb_users.user_id, tb_users.username, tb_users.avatar FROM `tb_chats` INNER JOIN `tb_users` ON tb_chats.user_id = tb_users.user_id ORDER BY `date` LIMIT $from, $count");

	while ($row = $db->fetchObject()):  
		/*
		*	
		*/
		if($row->user_id == $userid):
			$msg = "message-body msg-out";
		else:
			$msg = "message-body msg-in";
		endif;

		/*
		*	Converting Text To Emoticons
		*/
		
		$enum = array();
		$pict = array();
		for ($i=1; $i < 50 ; $i++) { 
			if($i < 10){
				$i = '0'.$i;
			}
			$enum[] = '#'.$i;
			$pict[]  = '<img alt="'.$row->username.'" class="img-chat-box" src="'.base_url.'assets/images/emoticons/%23'.$i.'.png'.'">';
		}
		$text = str_replace($enum, $pict, $row->text);
?>
		
		<div class="msg-time-chat">
			<a href="#" class="message-img">
				<img class="avatar" src="<?php echo base_url . 'assets/images/avatar/' . $row->avatar; ?>" alt="">
			</a>
			<div class="<?php echo $msg;?>">
				<span class="arrow"></span>
				<div class="text">
					<p class="attribution">
					<a href="#"><?php echo ucwords($row->username);?></a>at <?php echo $row->date;?> 
					<?php if($userid == $row->user_id):?>
					<button class="btn btn-xs btn-primary" onclick="Edit(<?php echo $row->chat_id;?>);"><i class="fa fa-edit"></i></button>
					<button class="btn btn-xs btn-danger" onclick="Delete(<?php echo $row->chat_id;?>);"><i class="fa fa-trash"></i></button>
					
					<?php endif;?>
					</p>
					<p><?php echo $text;?></p>
				</div>
			</div>
		</div>
	
<?php endwhile; endif; ?>
