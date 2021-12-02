<?php require 'header.php'; ?>
<div class=" sticky-top bg-white">
	<span class="h1 mb-5"><small>Table Structure: <?=$table_name?></small></span>
	<div class="h3 pt-3">
		<a class="badge badge-primary" href="<?=base_url()?>">Back</a>
		<a class="badge badge-warning" href="<?=base_url('Database/add_column_1/'.$table_name)?>">Add Column</a>
	</div>
	<hr class="bg-info">
</div>

<div class="row">
	<div class="col-lg-6 offset-3">
		<table class="table table-bordered table-dark table-hover table-sm table-striped">
			<tr>
				<th>SrNo</th>
				<th>Field Name</th>
				<th>Properties</th>
				<th></th>
				<th></th>
			</tr>
			<?php $i =0; ?>
			<?php foreach($table_struc as $x): ?>
				<tr>
					<th><?=($i+1)?></th>
					<td><?=$x['name']?></td>
					<td>
						<ul>
							<?php foreach($x['props'] as $y => $v): ?>
								<li><b><?=$y?> : </b> <?=$v?></li>
							<?php endforeach ?>
						</ul>
					</td>
					<td class=" text-center">
						<a href="<?=base_url('Database/edit_struc/'.$table_name.'/'.$x['name'])?>" class="btn btn-primary">Edit</a>
					</td>
					<td class=" text-center">
						<a href="<?=base_url('Database/delete_col/'.$table_name.'/'.$x['name'])?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php $i++; ?>
			<?php endforeach ?>
		</table>
	</div>
</div>

<?php require 'footer.php'; ?>