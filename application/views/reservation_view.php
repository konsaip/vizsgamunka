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
					<p class="text-uppercase pull-center">Foglalás adatainak megadása</p>
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="index.php/Reservation/insertUpdateDeleteData">
						<fieldset>
							<div class="form-group">
								<label for="paciensid">Páciens azonosító</label>
								<input type="number" name="paciensid" id="paciensid" class="form-control input-md" value="<?php if (isset($userdata)) {
																																print($userdata['id']);
																															}  ?>" readonly>
							</div>

							<div class="form-group">
								<label for="idopontid">Időpont</label>

								<select id="idopontid" name="idopontid" class="form-control input-md">
									<?php
									for ($i = 0; $i < count($date); $i++) {


									?>
										<option value=<?php print($date[$i]['id']) ?>><?php print($date[$i]['id'] . " : " . $date[$i]['idopont']) ?></option>

									<?php
									}
									?>

								</select>

							</div>
							<div class="form-group">
								<label for="oltasid">Oltás neve</label>
								<select id="oltasid" name="oltasid" class="form-control input-md">
									<?php
									for ($i = 0; $i < count($vaccine); $i++) {


									?>
										<option value=<?php print($vaccine[$i]['id']) ?>><?php print($vaccine[$i]['id'] . " : " . $vaccine[$i]['oltas_neve']); ?></option>

									<?php
									}
									?>

								</select>
							</div>



							<div>
								<input type="submit" name="insert/delete" class="btn btn-lg btn-primary" value="Foglalás/Visszavonás">
								
							</div>

						</fieldset>

						<?php echo validation_errors(); ?>

					</form>


					<h4>Foglalás adatai</h4>
					<table class="table table-striped" style="width:50%">
						<thead>
							<tr>
								<th>Név</th>
								<th>Időpont</th>
								<th>Oltás</th>
								<th>Rendelkezésre álló készlet</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td><?php if (isset($data)) {
										echo $data['nev'];
									} ?></td>
								<td><?php if (isset($data)) {
										echo $data['idopont'];
									} ?></td>
								<td><?php if (isset($data)) {
										echo $data['oltas_neve'];
									} ?></td>
								<td><?php if (isset($data)) {
										echo $data['keszleten_darab'];
									} ?></td>
							</tr>

						</tbody>
					</table>
					<?php  echo @$errormessage ?>				
					
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