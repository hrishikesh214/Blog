<?php require 'header.php'; ?>

 <div class=" sticky-top bg-white">
 	<span class="display-4 mb-5">Update Table: <?=$table_name?></span>
 	<div class="h3 pt-3"><a class="badge badge-primary" href="<?=base_url('Table/show_table/'.$table_name)?>">Back</a></div>
 	 <hr class="bg-info">
 </div>

<div class="row py-5">
	<div class="col-lg-6 offset-lg-3 border border-dark rounded p-4">
		<form action="<?=base_url('Table/save_changes/'.$table_name.'/'.$pri_val)?>" method="post">
			<?php for($x=0; $x<$cols; $x++): ?>
				<div class="form-group">
					<legend><?=$col_names[$x][0]?></legend>
					<input class="form-control" type="text" name="<?=$col_names[$x][0]?>" value="<?=$row_data[$x]?>">
				</div>
			<?php endfor ?>
			<div class="form-group">
				<input type="submit" name="submit" value="Update" class="btn btn-outline-info">
			</div>
		</form>
	</div>
</div>

<?php require 'footer.php'; ?>