<?php require 'header.php'; ?>

<div class="form">
	<div class="form-group">
		<legend>Username</legend>
		<span class="form-control"><?=$details['username']?></span>
	</div>
	<div class="form-group">
		<legend>Email</legend>
		<span class="form-control"><?=$details['email']?></span>
	</div>
	<div class="form-group">
		<legend>First Name</legend>
		<span class="form-control"><?=$details['firstname']?></span>
	</div>
	<div class="form-group">
		<legend>Last Name</legend>
		<span class="form-control"><?=$details['lastname']?></span>
	</div>
	<div class="form-group">
		<legend>Favorite Tags</legend>
		<span class="form-control"><?=$details['user_tags']?></span>
	</div>
	<div class="form-group">
		<a class="btn btn-primary" href="<?=base_url('/Profile/change_my_profile')?>">Edit</a>
	</div>
</div>

<?php require 'footer.php'; ?>