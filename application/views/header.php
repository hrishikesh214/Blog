<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style type="text/css">
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
	.sidebar{
		height:80vh;
	}
	.content{
		width: 77vw;
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
	.bg-black{
		background-color: black;
	}
</style>

<body>
	<script type="text/javascript">
		function redirect_base(){
			window.location='<?=base_url()?>';
		}
	</script>
	<nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-primary">
		<div class="navbar-brand"><h2 onclick="javascript:redirect_base()" class="logo">DreamBlog</h2></div>
		<div>
			<ul class="navbar-nav right">
				<li class="items"><a href="<?=base_url().'Articles'?>" class="nav-link">Articles</a></li>
				<li class="items"><a href="<?=base_url().'About'?>" class="nav-link">About</a></li>
				<li class="items"><a href="<?=base_url().'Contact'?>" class="nav-link">Contact Us</a></li>
				<li class="items"><?php echo isset($_SESSION['userid'])?'<a class="nav-link" href="'.base_url().'Logout">Logout</a>':'<a class="nav-link" href="'.base_url().'Login">Login</a>'; ?></li>
			</ul>
		</div>
		
	</nav>


	<div class="row container">
		<?php 

		if (isset($_SESSION['userid'])) {
			echo '
				<div class="col-lg-2 fixed-left sidebar bg-primary">
					<ul class="navbar-nav">
						<li class="items"><a href="'.base_url('/Profile').'" class="nav-link text-white">Profile</a></li>
						<li class="items"><a href="'.base_url().'Articles/my_articles" class="nav-link text-white">My Articles</a></li>
						<li class="items"><a href="'.base_url().'Articles/add_article" class="nav-link text-white">Add</a></li>
					</ul>
					';
					if(isset($curr_msg)){
						echo '<span class="text-danger"><strong>'.$curr_msg.'</strong></span>';
					}
					echo '
				</div>
			';
		}

		 ?>
		 <div class="col-lg-1"></div>
			<div class="col-lg-9">
				<div class="content border">
					<div class="container-fluid">