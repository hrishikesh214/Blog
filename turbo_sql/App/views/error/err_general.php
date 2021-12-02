<?php include 'e_header.php'; ?>
<?php 

switch($error_data[0]){
	case 8:
	case 1024:
		$error_type = "Notice";
		break;
	case 2:
	case 512:
		$error_type = "Warning";
		break;
	case 1:
	case 256:
		$error_type = "Error";
	default:
		$error_type = "Error";
}

 ?>
<div class="container border py-5">
	<div class="card border border-danger">
		<div class="card-header">
			<span class="display-3">Error</span>
		</div>
		<div class="card-body h5">
			<span class="text-danger">Error Code : </span>
			<span class=""><?=$error_data[0]?></span><br><br>
			<span class="text-danger"><?=$error_type?> : </span>
			<span class=""><?=$error_data[1]?></span><br><br>
			<span class="text-danger">File : </span>
			<span class=""><?=$error_data[2]?></span><br><br>
			<span class="text-danger">Line : </span>
			<span class=""><?=$error_data[3]?></span><br>
		</div>
	</div>
</div>

<?php include 'e_footer.php';?>