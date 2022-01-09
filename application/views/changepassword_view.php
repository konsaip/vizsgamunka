<!DOCTYPE html>
<html lang="hu">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<base href="<?php print(base_url()); ?>">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	<script src="assets/js/script.js"></script>

	<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
					MENU
				</button>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					Oltás regisztráció
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
				<ul class="nav navbar-nav navbar-right">
					
					<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							Felhasználói fiók
							<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							
							<li><a href="index.php/ChangePassword/index">Jelszó módosítása</a></li>
							<li><a href="index.php/Home/logout">Kilépés</a></li>
							<li><a href="index.php/Reservation/delReg">Regisztráció törlése</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<div class="row">
				<!-- uncomment code for absolute positioning tweek see top comment in css -->
				<div class="absolute-wrapper"> </div>
				<!-- Menu -->
				<div class="side-menu">
					<nav class="navbar navbar-default" role="navigation">
						<!-- Main Menu -->
						<div class="side-menu-container">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php/PatientData/index">Adatok megadása</a></li>
								<li class="active"><a href="index.php/Reservation/index">Foglalás</a></li>
								
							</ul>
						</div><!-- /.navbar-collapse -->
					</nav>

				</div>
			</div>
		</div>
		<div class="col-md-10 content">
			<div class="panel panel-default">
				<div class="panel-heading">
					<p class="text-uppercase pull-center">Jelszó módosítása</p>
				</div>
				<div class="panel-body">
					
					<form role="form" method="post" action="index.php/ChangePassword/modifyPassword">
						<fieldset>
							<div class="form-group">
								<label for="ujjelszo">Új jelszó</label>
								<input type="password" name="ujjelszo1" id="ujjelszo1" class="form-control input-md" value="">
							</div>
							<div class="form-group">
								<label for="ujjelszo2">Új jelszó ismét</label>
								<input type="password" name="ujjelszo2" id="ujjelszo2" class="form-control input-md" value="">
							</div>
							<div>
								<input type="submit" name="submit" class="btn btn-lg btn-primary" value="Jelszó módosítása">
							</div>
							
							<?php echo @$modified; ?>
							
							<?php echo validation_errors() ?>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<footer class="pull-left footer">
			<p class="col-md-12">
				<hr class="divider">
				<!--Copyright &COPY; 2015 <a href="http://www.pingpong-labs.com">Gravitano</a>-->
			</p>
		</footer>
	</div>
</body>

</html>