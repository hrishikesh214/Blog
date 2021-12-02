<?php require 'header.php'; ?>
<div class=" sticky-top bg-white">
	<span class="display-4 mb-5">Database : <?=$dbname?></span>
	<br>
	<span class="h1 mb-5"><small>Add Table</small></span>
	<div class="h3 pt-3"><a class="badge badge-primary" href="<?=base_url()?>">Back</a></div>
	<hr class="bg-info">
</div>
<div class="row">
	<div class="col-lg-8 offset-lg-2 p-4 border rounded border-dark">
		<form action="<?=base_url('Database/add_table')?>" method="post">
			<div class="form-group row">
				<legend class="col-lg-2">Name</legend>
				<input type="text" name="table_name" class="form-control col-lg-10" placeholder="Table Name">
			</div>
			<div class="form-group row">
				<legend class="col-lg-2">Columns</legend>
				<input type="text" name="cols" class="form-control col-lg-10" placeholder="No of columns">
			</div>
			<div class="form-group row">
				<legend class="col-lg-2"></legend>
				<input type="submit" name="submit" class="form-control col-lg-1 font-weight-bold btn btn-success" value="Add">
			</div>
		</form>
	</div>
</div>

<?php require 'footer.php'; ?>