<?php
/*
*	Name   : Global Chat v1.0 Free Version
*	Author : Supian M
*	Email  : privcodelab@gmail.com
*	
*	2017 (c) www.priv-code.com
*/
require 'system/config.php';
session_start();

$online = NULL;
if(!empty($_SESSION['userid'])):
	$id = $_SESSION['userid'];
	$db->go("SELECT tb_users.online FROM `tb_users` WHERE `user_id` = '$id'");
	$online = $db->fetchObject()->online;
endif;

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Priv Code | Global Chat App Free Version</title>
		<link rel="shortcut icon" href="assets/images/favicon.png">
		<link type="text/css" href="assets/css/bootstrap.css" rel="stylesheet">
		<link type="text/css" href="assets/css/bootstrap-overide.css" rel="stylesheet">
		<link type="text/css" href="assets/css/fontawesome.css" rel="stylesheet">
		<link type="text/css" href="assets/css/style.css" rel="stylesheet">
		<link type="text/css" href="assets/css/toastr.css" rel="stylesheet">
	</head>
	<body class="login-body">
		<section id="scrolltainer">
			<section class="wrapper">
				<div class="row">
					<div class="col-lg-9">
						<section class="panel">
							<header class="panel-heading panel-default">
								Chat Box
								<?php if(!empty($_SESSION['userid']) && $online != NULL && $online == 1): ?>
								<span class="tools pull-right">
									<a class="btn btn-danger btn-sm fa fa-sign-out" href="action/signout.php"></a>
									<a class="btn btn-primary btn-sm fa fa-chevron-down" href="javascript:;"onclick="goDown('div.chat-box');"></a>
									<a class="btn btn-primary btn-sm fa fa-chevron-up" href="javascript:;" onclick="goTop('div.chat-box');"></a>
								</span>
							<?php endif;?>
							</header>
							<div class="panel-body">
								
								<div class="timeline-messages">
									<!-- Comment -->
									<div class="chat-box"></div>
									<!-- /comment -->
								</div>
								<div class="chat-form">
									<!-- <form method="POST" id="chat-form"> -->
									<?php if(!empty($_SESSION['userid']) && $online != NULL && $online == 1): ?>
									<div class="input-scrollt">
										<!-- <input type="text" class="form-control col-lg-12" id="chat-text" name="message" placeholder="Type a message here..."> -->
										<textarea class="form-control" id="chat-text" name="message"></textarea>
										<input type="hidden" id="id" value="">
									</div>
									<!-- </form> -->
									<div class="form-group">
										<div class="pull-right chat-features">
											<button class="btn btn-primary" id="chat-send"><i class="fa fa-send"></i> Send</button>
											<button class="btn btn-primary" id="edit-send"><i class="fa fa-send"></i> Edit</button>
											<button class="btn btn-danger" id="emoticons" data-placement="top"><i class="fa fa-smile-o"></i> Emoticons</button>
										</div>
									</div>
									<audio scrolltrols id="sound">
										<source src="assets/audio/chat.mp3" type="audio/mpeg">
									</audio>
									<?php else: ?>
									<div class="col-lg-5">
										<div class="col-sm-6">
											<div class="form-group">
												<input type="text" id="username" class="form-control" placeholder="Username">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<input type="password" id="password" class="form-control" placeholder="Password">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<button class="btn btn-primary btn-compose" onclick="Signin();"><i class="fa fa-sign-in"></i> Sign In</button>
											</div>
										</div>
									</div>

									<div class="col-lg-7">
										<div class="col-sm-4">
											<div class="form-group">
												<input type="text" id="username2" class="form-control" placeholder="Username">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<input type="text" id="email" class="form-control" placeholder="Email">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<input type="password" id="password2" class="form-control" placeholder="Password">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<button class="btn btn-danger btn-compose" onclick="Signup();"><i class="fa fa-plus"></i> Sign Up</button>
											</div>
										</div>
									</div>
									<?php endif;?>
									
								</div>
								
							</div>
						</section>
					</div>
					<div class="col-lg-3">
						<section class="panel">
							<header class="panel-heading panel-default">
								People
								<?php if(!empty($_SESSION['userid']) && $online != NULL && $online == 1): ?>
								<span class="tools pull-right">
									<a class="btn btn-primary btn-sm fa fa-chevron-down" href="javascript:;"onclick="goDown('div.box-online');"></a>
									<a class="btn btn-primary btn-sm fa fa-chevron-up" href="javascript:;" onclick="goTop('div.box-online');"></a>
								</span>
								<?php endif;?>
							</header>
							<div class="panel-body">
								<div class="credit">
									<img src="assets/images/logo-small.png" class="logo-credit">
									<font style="font-weight: bold;font-size: 20px;text-align: center;">Global Chat App Free Version</font>
									<p>
										<ul style="font-weight:bold; font-size: 15px;text-align: left;">
											<li>Coded by : Supian M</li>
											<li>Facebook : <a href="www.facebook.com/monyet.linuxers">monyet.linuxers</a></li>
											<li>Email : <a href="mailto:privcodelab@gmail.com">privcodelab@gmail.com</a></li>
											<li><br> 2017 <i class="fa fa-copyright"></i> Priv Code</li>
										</ul>
									</p>
								</div>
								<ul class="quick-chat-list">
									<div class="box-online"></div>
								</ul>
							</div>
						</section>
					</div>
					<div class="col-lg-12" hidden="">
						<section class="panel">
							<div class="panel-body">
								<div class="box-online2"></div>
							</div>
						</section>
					</div>
				</div>
			</section>
		</section>
	</section>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery.nicescroll.js"></script>
	<script type="text/javascript" src="assets/js/toastr.js"></script>
	<script type="text/javascript" src="assets/js/common.js"></script>	
	<script type="text/javascript" src="assets/js/chat.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#sound,#edit-send,div.credit').hide();
		    
		    <?php if(!empty($_SESSION['userid'])): ?>
		    getChat();
		    getOnline();
		    setInterval(getChat, 3000);
		    setInterval(getOnline, 3000);
		    setInterval(getCheckOnline, 30000);
		    <?php else: ?>
		    $('div.timeline-messages').attr('class', '');
		    $('div.chat-box').html('<img src="assets/images/welcome.png">');
		    $('div.credit').show();
		    <?php endif;?>
		});


		function getChat() {
		    $('div.chat-box').load("action/getChat.php?userid=<?php echo isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;?>");  
		}

		
	</script>
	</body>
</html>