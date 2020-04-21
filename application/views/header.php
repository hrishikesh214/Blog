<!DOCTYPE html>
<html>
<head>
	<title>Dream Blog</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script
	src="https://code.jquery.com/jquery-3.4.1.js"
	integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0-next.1/esm/popper.js" ></script>

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
	}
	.bg-black{
		background-color: black;
	}

	.navbar { background-color: #484848; }
	.navbar .navbar-nav .nav-link { color: #fff; }
	.navbar .navbar-nav .nav-link:hover { color: #fbc531; }
	.navbar .navbar-nav .active > .nav-link { color: #fbc531; }

	footer a.text-light:hover { color: #fed136!important; text-decoration: none; }
	footer .cizgi { border-right: 1px solid #535e67; }
	@media (max-width: 992px) { footer .cizgi { border-right: none; } }

</style>

<body>
	<script type="text/javascript">
		function redirect_base(){
			window.location='<?=base_url()?>';
		}
		function refreshPage () {
			var page_y = $( document ).scrollTop();
			window.location.href = window.location.href + '?page_y=' + page_y;
		}
	</script>
	<script type="text/javascript">
		function dL(url){	
			$.ajax({
				url:url,
				success:function(response){
					if(response == 'done'){
						//window.location='<?=base_url('/Articles/view_articles')?>';
						let curr = this.value;
						curr = curr+1;
						this.value = curr;
					}
					else if (response == 'notdone'){

					}
				}
			});
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
						<a class="nav-link" href="#">Kayıt Ol</a>
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
		<div class="content border">
			<div class="container-fluid"> 