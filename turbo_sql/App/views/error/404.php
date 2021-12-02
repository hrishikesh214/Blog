<!DOCTYPE html>
<html>
<head>
	<title>404 Not Found</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<div class="container border py-5">
		<div class="card">
			<div class="card-header h1">
				404 Not Found
			</div>
			<div class="card-body">
				Error:- No file with name 
				<span class="text-danger">
					<?=isset($_SESSION['SEFN'])?$_SESSION['SEFN']:'REQUESTED'?>
				</span> 
				in path :- 
				<span class="text-danger">
					<?=isset($_SESSION['SEPN'])?$_SESSION['SEPN']:APPPATH?>
				</span>	
			</div>
		</div>
	</div>
</body>
</html>
<?php 
if( isset($_SESSION['SEFN'])){
	unset($_SESSION['SEFN']);
}
if( isset($_SESSION['SEPN'])){
    unset($_SESSION['SEPN']);
}

 ?>