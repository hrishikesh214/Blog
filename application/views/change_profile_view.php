<?php require 'header.php'; ?>

<form method="post" action="<?=base_url('/Profile/update_my_profile')?>" class="form">
	<div class="form-group">
		<legend>Username</legend>
		<input type="text" name="username" class="form-control" value="<?=$details['username']?>">
	</div>
	<div class="form-group">
		<legend>Email</legend>
		<input type="email" name="email" class="form-control" value="<?=$details['email']?>">
	</div>
	<div class="form-group">
		<legend>First Name</legend>
		<input type="text" name="firstname" class="form-control" value="<?=$details['firstname']?>">
	</div>
	<div class="form-group">
		<legend>Last Name</legend>
		<input type="text" name="lastname" class="form-control" value="<?=$details['lastname']?>">
	</div>
	<div class="form-group">
		<legend>New Password</legend>
		<input type="password" name="password" class="form-control" >
	</div>
	<div class="form-group">
		<legend>Confirm Password</legend>
		<input type="password" name="c_password" class="form-control">
	</div>
	<div class="form-group">
		<legend>Favorite Tags</legend>
			<?php foreach ($details['user_tags'] as $tag) :?>			
				<div class="form-check form-check-inline">
					<input name="user_tags[]" type="checkbox" class="form-check-input" <?=$tag['checked']?'checked':''?> value="<?=$tag['value']?>">
					<label class="form-check-label"><?=$tag['value']?></label>
				</div>		
			<?php endforeach ?>
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit"  value="Update">
	</div>
</div>

<?php require 'footer.php'; ?>