<?php require 'header.php'; ?>
<div class=" sticky-top bg-white">
	<span class="display-4 mb-5">Update Table Structure: <?=$table_name?></span>
	<div class="h3 pt-3"><a class="badge badge-primary" href="<?=base_url()?>">Back</a></div>
	<hr class="bg-info">
</div>

<div class="row py-5">
	<div class="col-lg-6 offset-lg-3 rounded p-4">
		<form action="<?=base_url('Database/update_col/'.$table_name.'/'.$field_name)?>" method="post">
			
			<div class="card border border-dark">
				<div class="card-header h5 bg-dark text-white">Field Name : <?=$field_name?></div>

				<div class="card-body">
					<div class="form-group row">
						<legend class="col-lg-3">Field Name</legend>
						<input type="text" name="Field" class="form-control col-lg-9" value="<?=$field_info['Field']?>">
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Type</legend>
						<input type="text" name="Type" class="form-control col-lg-9" value="<?=$field_info['Type']?>">
					</div>
					<div class="form-group row">
						<legend class=" col-lg-3">Not Null</legend>
						<div class="custom-control custom-switch">
							<input type="checkbox" name="NotNull" class="custom-control-input" id="customSwitch1" <?=($field_info['Null'] == 'NO')?'checked':''?>>
							<label class="custom-control-label" for="customSwitch1"></label>
						</div>
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Default</legend>
						<input type="text" name="Default" class="form-control col-lg-9" value="<?=$field_info['Default']?>">
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Extra</legend>
						<input type="text" name="Extra" class="form-control col-lg-9" value="<?=$field_info['Extra']?>">
					</div>

				</div>

				<div class="card-footer bg-dark text-white">
					<div class="form-group">
						<input type="submit" name="submit" value="Update" class="btn btn-primary">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php require 'footer.php'; ?>