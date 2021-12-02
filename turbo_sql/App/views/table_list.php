<?php require 'header.php';$i=1; ?>
 <div class=" sticky-top bg-white">
 	<span class="display-4 mb-5">Database: <?=$curr_dbname?></span>
 	<div class="h3 pt-3"><a class="badge badge-primary" href="<?=base_url('Database/add')?>">Add Table</a></div>
 	 <hr class="bg-info">
 </div>
 
 <table class="table table-bordered table-dark table-hover table-sm table-striped">

 	<tr>
 		<th>SrNo</th>
 		<th>Table Name</th>
 		<th></th>
 		<th></th>
 		<th></th>
 		<th></th>
 	</tr>
 	
 	<?php foreach($tables as $table):?>
 		<tr>
			<td><?=$i?></td>
			<td><?=$table['table_name']?></td>
			<td><a href="<?=base_url('Table/show_table/'.$table['table_name'])?>" class="btn btn-sm btn-primary">Show</a></td>
			<td><a href="<?=base_url('Database/struc_table/'.$table['table_name'])?>" class="btn btn-sm btn-warning">Structure</a></td>
			<td><a href="<?=base_url('Database/truncate/'.$table['table_name'])?>" style="background-color: #FF6600;color:white;" class="btn btn-sm">Truncate</a></td>
			<td><a href="<?=base_url('Database/delete_table/'.$table['table_name'])?>" class="btn btn-sm btn-danger">Delete</a></td>

		</tr>
	<?php $i++; ?>
	<?php endforeach ?>
 </table>


<?php require 'footer.php'; ?>