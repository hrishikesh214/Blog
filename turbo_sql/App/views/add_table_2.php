<?php require 'header.php'; ?>
<div class=" sticky-top bg-white">
	<span class="h1 mb-5">Database : <?=$dbname?></span>
	<br>
	<span class="h1 mb-5"><small>Add Table</small></span>
	<div class="h3 pt-3"><a class="badge badge-primary" href="<?=base_url()?>">Back</a></div>
	<hr class="bg-info">
</div>
<div class="row mt-4">
	<div class="col-lg-6 offset-lg-3">
		<form action="<?=base_url('Database/new_table/')?>" method="post">
			<?php for($x=1;$x<=$cols;$x++): ?>
				<input type="hidden" name="cols" value="<?=$cols?>">
				<input type="hidden" name="table_name" value="<?=$table_name?>">
				<div class="border p-5 border-dark mb-3">
					<span class="h1 text-primary"><small>Field <?=$x?></small></span>
					<hr class="bg-dark">
					<div class="form-group row">
						<legend class="col-lg-3">Name</legend>
						<input type="text" name="field_name_<?=$x?>" class="form-control col-lg-9" placeholder="Field Name">
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Type</legend>
						<input type="text" name="field_type_<?=$x?>" class="form-control col-lg-9" placeholder="e.g. int, varchar ...">
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Length/Values</legend>
						<input type="text" name="field_length_<?=$x?>" class="form-control col-lg-9" placeholder="Max_length">
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Default</legend>
						<input type="text" name="field_default_<?=$x?>" class="form-control col-lg-9" placeholder="Default value or null">
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Not Null</legend>
						<div class="custom-control custom-switch">
							<input type="checkbox" name="field_nn_<?=$x?>" class="custom-control-input" id="customSwitch1_<?=$x?>">
							<label class="custom-control-label" for="customSwitch1_<?=$x?>"></label>
						</div>
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Primary</legend>
						<div class="custom-control custom-switch">
							<input type="checkbox" name="field_pri_<?=$x?>" class="custom-control-input" id="customSwitch3_<?=$x?>">
							<label class="custom-control-label" for="customSwitch3_<?=$x?>"></label>
						</div>
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Auto Increment</legend>
						<div class="custom-control custom-switch">
							<input type="checkbox" name="field_ai_<?=$x?>" class="custom-control-input" id="customSwitch2_<?=$x?>">
							<label class="custom-control-label" for="customSwitch2_<?=$x?>"></label>
						</div>
					</div>
					<div class="form-group row">
						<legend class="col-lg-3">Extra</legend>
						<input type="text" name="field_extra_<?=$x?>" class="form-control col-lg-9" placeholder="Any extra condition...">
					</div>
				</div>
				
			<?php endfor ?>
			<div class="form-group">
				<legend class=""></legend>
				<input type="submit" name="submit" class="btn btn-info">
			</div>
		</form>
	</div>
</div>

<?php require 'footer.php'; ?>