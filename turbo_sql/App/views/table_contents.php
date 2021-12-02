<?php require 'header.php'; ?>
<?php 

$u_a = ($is_pri_aval)?'':'disabled';

 ?>
<div class="sticky-top bg-white">
 	<span class="display-4 mb-5">Table: <?=$table_name?></span>
 	<div class="h3 pt-3"><a class="badge badge-primary mr-3" href="<?=base_url('Database')?>">Back</a><a class="badge badge-primary" href="<?=base_url('Table/add/'.$table_name)?>">Add</a></div>
 	 <hr class="bg-info">
 </div>
  
<table class="table table-bordered table-dark table-hover table-sm table-striped">
	<tr>
		<th>Sr No.</th>
	<?php foreach($col_names as $col_name): ?>
		<th><?=$col_name[0]?></th>
	<?php endforeach ?>
		<th></th>
		<th></th>
	</tr>
	<?php $i=1; ?>
	<?php foreach ($contents as $row):?>
		<tr>
			<td class="font-weight-bold"><?=$i?></td>
			<?php for($x=0 ;$x<$cols;$x++): ?>
				<td><?=$row[$x]?></td>
			<?php endfor ?>
			<?php $i++; ?>
			<td>
			<?php if($is_pri_aval): ?>
				<a href="<?=base_url('Table/update_row/'.$table_name.'/'.$row[$primary_column[0][0]])?>" class="btn btn-info <?=$u_a?>">Update</a>
			<?php endif ?>
			</td>
			<td>
			<?php if($is_pri_aval): ?>
				<a href="<?=base_url('Table/delete_row/'.$table_name.'/'.$row[$primary_column[0][0]])?>" class="btn btn-danger">Delete</a></td>
			<?php endif ?>
		</tr>
	<?php endforeach ?>
</table>

<?php require 'footer.php'; ?>