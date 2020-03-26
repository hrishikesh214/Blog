<?php require 'header.php'; ?>

<style type="text/css">
	.ext-icon{
		font-size: 350px;
		color:yellow;
	}
</style>
<center>
<span area-hidden="true" class="ext-icon text-yellow fa fa-exclamation-circle fa-6"></span>
<h3>Are you sure you want to delete this article?</h3>
<br><br>
<div class="row">
	<div class="col-lg-6">
		<a href="<?=base_url('/Articles/delete_article/'.$cdm)?>" class="float-sm-right text-white btn btn-danger">Yes Delete it!</a>
	</div>
	<div class="col-lg-6">
		<a href="<?=base_url()?>" class="btn float-sm-left btn-primary text-white">Cancel</a>
	</div>
</div>
</center>
<?php require 'footer.php'; ?>