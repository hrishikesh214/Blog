<?php require 'header.php'; ?>
<div class=" sticky-top bg-white">
	<span class="h1 mb-5"><small>Table Structure: <?=$table_name?></small></span>
	<div class="h3 pt-3">
		<a class="badge badge-primary" href="<?=base_url('Database/struc_table/'.$table_name)?>">Back</a>
	</div>
	<hr class="bg-info">
</div>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<form class="form" action="<?=base_url('Database/add_column_2/'.$table_name)?>" method="post">
			<div class="form-group row">
				<legend class="col-lg-2">Name</legend>
				<input type="text" name="new_col_name" class="form-control col-lg-4" placeholder="Column Name">
			</div>
			<div class=" form-group row">
				<select name="after_col_name" class=" col-lg-4 offset-lg-2 custom-select">
					<?php $i=0;  foreach($cols as $x): ?>
						<option value="<?=$x[0]?>" <?=($last_col == $i)?'selected':''?>>After <?=$x[0]?></option>
						<?php echo $i; $i++; ?>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group row">
				<input type="submit" name="submit" value="Add" class="btn btn-outline-dark offset-lg-2">
			</div>
		</form>
	</div>
</div>

<?php require 'footer.php'; ?>