<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<title>MyLilProject <?php echo isset($title)? " - ".$title : ""  ?></title>
	<link rel="stylesheet" href="">
</head>
<body>
<div class="container">
	<div class="row">	
		<nav>
			<ul>
				<li><?php echo anchor('site/', 'Home', 'class="btn"'); ?></li>
				<li><?php echo anchor('payments/', 'Pagos', 'class="btn"'); ?></li>
				<li><?php echo anchor('profile/', 'Perfil', 'class="btn"'); ?></li>
			</ul>
		</nav>
	</div>
</div>