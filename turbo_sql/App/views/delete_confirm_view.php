<?php require 'header.php'; ?>

<div class="container-fluid">
	<center>
		<div class="">
			<i style="font-size: 250px" class="text-danger fa fa-exclamation-triangle"></i>
		</div>
		<div>
			<span class="display-4">Do you Really Want to <span class="text-danger">Delete </span>?</span>
			<br>
			<span class="display-4"><b class="text-primary"><?=$table_name?></b> with all its data will be deleted <span class="text-danger">Permenently!</span></span>
			<br>
			<br>
			<hr class="bg-warning">
			<a href="<?=base_url('Database/delete_handle/'.$table_name)?>" style="font-size: 30px" class="mr-3 btn btn-outline-danger"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a>
			<a href="<?=base_url()?>" style="font-size: 30px" class="ml-3 btn btn-outline-success"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Go Back</a>
		</div>
	</center>
</div>

<?php require 'footer.php'; ?>
