<?php require 'header.php'; ?>
<div class=" sticky-top bg-white">
	<span class="h1 mb-5"><small>Table Structure: <?=$table_name?></small></span>
	<div class="h3 pt-3">
		<a class="badge badge-primary" href="<?=base_url('Database/add_column_1/'.$table_name)?>">Back</a>
	</div>
	<hr class="bg-info">
</div>
<div class="row mt-4">
	<div class="col-lg-6 offset-lg-3">
		<form action="<?=base_url('Database/add_column_handle/')?>" method="post">
				<input type="hidden" name="table_name" value="<?=$table_name?>">
				<input type="hidden" name="name" value="<?=$details['new_col_name']?>">
				<input type="hidden" name="after_col_name" value="<?=$details['after_col_name']?>">
				<div class="border p-5 border-dark mb-3">
					<span class="h1 text-primary"><small><?=$details['new_col_name']?></small></span>
					<hr class="bg-dark">
					<div class="form-group row">
						<legend class="col-lg-3">Type</legend>
						<input type="text" name="field_type" class="form-control col-lg-9" placeholder="e.g. int, varchar ...">
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Length/Values</legend>
						<input type="text" name="field_length" class="form-control col-lg-9" placeholder="Max_length">
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Default</legend>
						<input type="text" name="field_default" class="form-control col-lg-9" placeholder="Default value or null">
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Not Null</legend>
						<div class="custom-control custom-switch">
							<input type="checkbox" name="field_nn" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1"></label>
						</div>
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Primary</legend>
						<div class="custom-control custom-switch">
							<input type="checkbox" name="field_pri" class="custom-control-input" id="customSwitch3">
							<label class="custom-control-label" for="customSwitch3"></label>
						</div>
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Auto Increment</legend>
						<div class="custom-control custom-switch">
							<input type="checkbox" name="field_ai" class="custom-control-input" id="customSwitch2">
							<label class="custom-control-label" for="customSwitch2"></label>
						</div>
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Extra</legend>
						<input type="text" name="field_extra" class="form-control col-lg-9" placeholder="Any extra condition...">
					</div>
				</div>
			<div class="form-group">
				<legend class=""></legend>
				<input type="submit" name="submit" class="btn btn-info">
			</div>
		</form>
	</div>
</div>
<?php require 'footer.php'; ?>