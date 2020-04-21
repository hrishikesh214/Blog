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
				<div class="card-header bg-primary text-white h2">Signup</div>
					<div class="card-body">
							<form method="post" action="<?=base_url('/Signup/insert')?>" class="form">
						<div class="form-group">
							<legend for="username">Username</legend>
							<input class="form-control" 
							value="<?php if(isset($username)){echo $username;}?>" 
							type="text" name="username" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<legend for="email">Email</legend>
							<input class="form-control" 
							value="<?php if(isset($email)){echo $email;}?>" 
							type="email" name="email" placeholder="Enter Email">
						</div>
						<div class="form-group">
							<legend for="username">First Name</legend>
							<input class="form-control" 
							value="<?php if(isset($firstname)){echo $firstname;}?>" 
							type="text" name="firstname" placeholder="Enter First Name">
						</div>
						<div class="form-group">
							<legend for="username">Last Name</legend>
							<input class="form-control" 
							value="<?php if(isset($lastname)){echo $lastname;}?>" 
							type="text" name="lastname" placeholder="Enter Last Name"> 
						</div>
						<div class="form-group">
							<legend for="username">Your Tags</legend>
							<span class="text-info">(Use ',' to separate two tags)</span>
							<input class="form-control" 
							value="<?php if(isset($user_tags)){echo $user_tags;}?>" 
							type="text" name="user_tags" placeholder="Enter Tags">
						</div>
						<div class="form-group">
							<legend for="password">Password</legend>
							<input class="form-control" type="password" name="password">
						</div>
						<div class="form-group">
							<legend for="cPassword">Confirm Password</legend>
							<input class="form-control" type="password" name="cPassword">
						</div>
						<center>
						<div class="form-group">
							<a class="link" href="<?=base_url('/Login')?>">Already  Have Account?</a>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-primary" value="Sign Up">
						</div>
						</center>
						</form>
					</div>
					<div class="card-footer bg-primary text-white"></div>
			</div>
		</div>
		
	</div>


<?php require 'footer.php'; ?>

