<?php require 'header.php'; ?>


	<div class="row">
		<div class="col-lg-6">
			<span class="text-danger">
				<?php echo validation_errors(); ?>
			</span>
			<span class="text-danger">
				<?php echo isset($error)? $error :"" ; ?>
			</span>
		</div>
		<div class="col-lg-6">
			<div class="card border border">
				<div class="card-header bg-primary text-white h2">Login</div>
					<div class="card-body">
							<form method="post" action="<?=base_url().'Login/verify'?>" class="form">
						<div class="form-group">
							<legend for="username">Username</legend>
							<input class="form-control" 
							value="<?php if(isset($username)){echo $username;}?>" 
							type="text" name="username">
						</div>
						<div class="form-group">
							<legend for="password">Password</legend>
							<input class="form-control" type="password" name="password">
						</div>
						<center>
						<div class="form-group">
							<a class="link" href="<?=base_url('/Signup')?>">Dont Have Account?</a>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-primary" value="Login">
						</div>
						</center>
						</form>
					</div>
					<div class="card-footer bg-primary text-white"></div>
			</div>
		</div>
		
	</div>


<?php require 'footer.php'; ?>

