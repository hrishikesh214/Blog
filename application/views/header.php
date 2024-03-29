<!DOCTYPE html>
<html>
<head>
	<title>Dream Blog v1.4 (Beta)</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./loader.css">
	<link rel="icon" type="image/png" href="<?=base_url()?>/dp_logo.png">
	<!-- Jquery CDN Link -->
	<script
	src="https://code.jquery.com/jquery-3.4.1.js"
	integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous"></script>

	<!-- PopperJS CDN Link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0-next.1/esm/popper.js" ></script>

	<!-- Bootstrap CDN Link -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<!-- FontAwesome CDN Link -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	
	<!-- CKEditor CDN Link -->
	<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
	<?php 
	if (isset($_SESSION['curr_msg'])) {
		echo "<script>alert('".$_SESSION['curr_msg']."');</script>";
		unset($_SESSION['curr_msg']);
	}

	?>
</head>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans:300);

	.wrapper {
		background-color: cyan;
		z-index: 2;
		position: absolute;
		top:50%;
		left: 50%;
		transform: translate(-50%,-50%);
		overflow: hidden;
		width: 100vw;
		height:100vh;
	}

	h1 {
		position: absolute;
		font-family: 'Open Sans';
		font-weight: 600;
		font-size: 12px;
		text-transform: uppercase;
		left: 50%;
		top: 58%;
		margin-left: -20px;
	}

	.body {
		position: absolute;
		top: 50%;
		margin-left: -50px;
		left: 50%;
		animation: speeder .4s linear infinite;
	}

	.body > span {
		height: 5px;
		width: 35px;
		background: #000;
		position: absolute;
		top: -19px;
		left: 60px;
		border-radius: 2px 10px 1px 0;
	}

	.base span {
		position: absolute;
		width: 0;
		height: 0;
		border-top: 6px solid transparent;
		border-right: 100px solid #000;
		border-bottom: 6px solid transparent;
	}

	.base span:before {
		content: "";
		height: 22px;
		width: 22px;
		border-radius: 50%;
		background: #000;
		position: absolute;
		right: -110px;
		top: -16px;
	}

	.base span:after {
		content: "";
		position: absolute;
		width: 0;
		height: 0;
		border-top: 0 solid transparent;
		border-right: 55px solid #000;
		border-bottom: 16px solid transparent;
		top: -16px;
		right: -98px;
	}

	.face {
		position: absolute;
		height: 12px;
		width: 20px;
		background: #000;
		border-radius: 20px 20px 0 0;
		transform: rotate(-40deg);
		right: -125px;
		top: -15px;
	}

	.face:after {
		content: "";
		height: 12px;
		width: 12px;
		background: #000;
		right: 4px;
		top: 7px;
		position: absolute;
		transform: rotate(40deg);
		transform-origin: 50% 50%;
		border-radius: 0 0 0 2px;
	}

	.body > span > span:nth-child(1),
	.body > span > span:nth-child(2),
	.body > span > span:nth-child(3),
	.body > span > span:nth-child(4) {
		width: 30px;
		height: 1px;
		background: #000;
		position: absolute;
		animation: fazer1 .2s linear infinite;
	}

	.body > span > span:nth-child(2) {
		top: 3px;
		animation: fazer2 .4s linear infinite;
	}

	.body > span > span:nth-child(3) {
		top: 1px;
		animation: fazer3 .4s linear infinite;
		animation-delay: -1s;
	}

	.body > span > span:nth-child(4) {
		top: 4px;
		animation: fazer4 1s linear infinite;
		animation-delay: -1s;
	}

	@keyframes fazer1 {
		0% {
			left: 0;
		}

		100% {
			left: -80px;
			opacity: 0;
		}
	}

	@keyframes fazer2 {
		0% {
			left: 0;
		}

		100% {
			left: -100px;
			opacity: 0;
		}
	}

	@keyframes fazer3 {
		0% {
			left: 0;
		}

		100% {
			left: -50px;
			opacity: 0;
		}
	}

	@keyframes fazer4 {
		0% {
			left: 0;
		}

		100% {
			left: -150px;
			opacity: 0;
		}
	}

	@keyframes speeder {
		0% {
			transform: translate(2px, 1px) rotate(0deg);
		}

		10% {
			transform: translate(-1px, -3px) rotate(-1deg);
		}

		20% {
			transform: translate(-2px, 0px) rotate(1deg);
		}

		30% {
			transform: translate(1px, 2px) rotate(0deg);
		}

		40% {
			transform: translate(1px, -1px) rotate(1deg);
		}

		50% {
			transform: translate(-1px, 3px) rotate(-1deg);
		}

		60% {
			transform: translate(-1px, 1px) rotate(0deg);
		}

		70% {
			transform: translate(3px, 1px) rotate(-1deg);
		}

		80% {
			transform: translate(-2px, -1px) rotate(1deg);
		}

		90% {
			transform: translate(2px, 1px) rotate(0deg);
		}

		100% {
			transform: translate(1px, -2px) rotate(-1deg);
		}
	}

	.longfazers {
		position: absolute;
		width: 100%;
		height: 100%;
	}

	.longfazers span {
		position: absolute;
		height: 2px;
		width: 20%;
		background: #000;
	}

	.longfazers span:nth-child(1) {
		top: 20%;
		animation: lf .6s linear infinite;
		animation-delay: -5s;
	}

	.longfazers span:nth-child(2) {
		top: 40%;
		animation: lf2 .8s linear infinite;
		animation-delay: -1s;
	}

	.longfazers span:nth-child(3) {
		top: 60%;
		animation: lf3 .6s linear infinite;
	}

	.longfazers span:nth-child(4) {
		top: 80%;
		animation: lf4 .5s linear infinite;
		animation-delay: -3s;
	}

	@keyframes lf {
		0% {
			left: 200%;
		}

		100% {
			left: -200%;
			opacity: 0;
		}
	}

	@keyframes lf2 {
		0% {
			left: 200%;
		}

		100% {
			left: -200%;
			opacity: 0;
		}
	}

	@keyframes lf3 {
		0% {
			left: 200%;
		}

		100% {
			left: -100%;
			opacity: 0;
		}
	}

	@keyframes lf4 {
		0% {
			left: 200%;
		}

		100% {
			left: -100%;
			opacity: 0;
		}
	}
	body{
		padding-top: 80px;
		padding-bottom: 80px;
		overflow: hidden;
		padding-left: 10px;
		padding-right: 10px;
	}
	.logo{
		animation: logo-anim 4s infinite alternate ease;
		font-family:'caveat',cursive;
	}
	@keyframes logo-anim{
		0%{}
		50%{
			text-shadow: 0px 0px 30px white;
		}
		100%{
			text-shadow: 0px 0px 10px black;
		}
	}
	.content{
		width: auto;
		overflow-y: auto;
		max-height: 80vh;
	}
	.content::-webkit-scrollbar{
		background-color: rgba(0,0,0,0.4);
		width:6px;
	}
	.content::-webkit-scrollbar-thumb{
		background-color: black;
	}
	.content::-webkit-scrollbar-button{
		background-color: rgba(0,0,0,0.7);
	}
	.content::-ms-scrollbar{
		background-color: rgba(0,0,0,0.4);
		width:6px;
	}
	.content::-ms-scrollbar-thumb{
		background-color: black;
	}
	.content::-ms-scrollbar-button{
		background-color: rgba(0,0,0,0.7);
		}0
		.bg-black{
			background-color: black;
		}

		.navbar { background-color: #484848; }
		.navbar .navbar-nav .nav-link { color: #fff; }
		.navbar .navbar-nav .nav-link:hover { text-shadow: yellow 0px 0px 5px; }
		.navbar .navbar-nav .active > .nav-link { color: #fbc531; }

		footer a.text-light:hover { color: #fed136!important; text-decoration: none; }
		footer .cizgi { border-right: 1px solid #535e67; }
		@media (max-width: 992px) { footer .cizgi { border-right: none; } }

		.wrapper-animate{
			animation: wa 2s ease-in;
			animation-fill-mode: forwards;
		}
		@keyframes wa{
			0%{
				opacity:100%;
			}
			100%{
				opacity:0;
				display:none;
			}
		}
	</style>

	<body>
		<!-- <div class="wrapper">
			<div class='body'>
				<span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</span>
				<div class='base'>
					<span></span>
					<div class='face'></div>
				</div>
			</div>
			<div class='longfazers'>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<h1>Loading</h1>

		</div> -->
		<script type="text/javascript">
			// $(document).ready(function(){
			// 	// $('.wrapper').css('display:none');
			// });
			function redirect_base(){
				window.location='<?=base_url()?>';
			}
		</script>
		<script type="text/javascript">
			function dL(aId){	
			// console.log('wait');
			obj = 'G_'+aId;
			ico = 'I_'+aId;
			$.ajax({
				url:'<?=base_url('/Articles/Like/')?>'+aId,
				success:function(response){
					let like_count = parseInt($("#"+obj).text());
					if(response == 'true'){
						//window.location='<?=base_url('/Articles/view_articles')?>';
						like_count = like_count + 1;
						document.getElementById(obj).innerHTML = like_count;
						$('#'+ico).removeClass('fa-heart-o');
						$('#'+ico).addClass('fa-heart');
					}
					else if (response == 'false'){
						like_count = like_count - 1;
						document.getElementById(obj).innerHTML = like_count;
						$('#'+ico).removeClass('fa-heart');
						$('#'+ico).addClass('fa-heart-o');
					}
					else if (response == 'notdone'){
						// console.log('fail');
						//fails goes here
					}
				}
			});
			// alert(aId);
		}
	</script>

	<nav class="navbar navbar-dark fixed-top bg-primary navbar-expand-lg">
		<div class="container-fluid">
			<div class="navbar-brand"><h2 onclick="javascript:redirect_base()" class="logo">DreamBlog</h2></div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="nvbCollapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item pl-1">
						<a href="<?=base_url().'Articles'?>" class="nav-link">Articles</a>
					</li>
					<li class="nav-item pl-1">
						<a href="<?=base_url().'About'?>" class="nav-link">About</a>
					</li>
					<li class="nav-item pl-1">
						<a href="<?=base_url().'Contact'?>" class="nav-link">Contact Us</a>
					</li>
					<li class="nav-item pl-1">
						<?php echo isset($_SESSION['userid'])?'<a class="nav-link" href="'.base_url().'Logout">Logout</a>':'<a class="nav-link" href="'.base_url().'Login">Login</a>'; ?>
					</li>
					<!-- <li class="nav-item pl-1">
						<a class="nav-link" href="#"></a>
					</li> -->
					

					<?php
					if (isset($_SESSION['userid'])):
						?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								My Actions
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?=base_url('/Profile')?>">Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=base_url('/Articles/my_articles')?>">My Articles</a>

								<a class="dropdown-item" href="<?=base_url('/Articles/add_article')?>">Add Article</a>
							</div>
						</li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>


	<?php 

	if(isset($curr_msg)){
		if($curr_msg !== NULL || $curr_msg !== ""){
			$e = $curr_msg;
			echo '<script>alert("'.$e.'");</script>';
			$e = "";
		}

	}

	?>
	<div class="content">
		<div class="container-fluid"> 