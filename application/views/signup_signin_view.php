<!DOCTYPE html>
<html lang="hu">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<base href="<?php print(base_url()); ?>">
	<script src="jquery/jquery.min.js"></script>
	<!---- jquery link local dont forget to place this in first than other script or link or may not work ---->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!---- boostrap.min link local ----->

	<link rel="stylesheet" href="css/style.css">
	<!---- boostrap.min link local ----->

	<script src="js/bootstrap.min.js"></script>
	<!---- Boostrap js link local ----->

	<link rel="icon" href="images/icon.png" type="image/x-icon" />
	<!---- Icon link local ----->

	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<!---- Font awesom link local ----->
	<link rel="stylesheet" href="assets/css/style_si_su.css">
</head>

<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title">Kórházi regisztrációs felület oltásra</h2>

			<hr>
			<div class="row">
				<div class="col-md-5">
					<form role="form" method="post" action="index.php/Home/registration">
						<fieldset>
							<p class="text-uppercase pull-center"> Regisztráció</p>

							<div class="form-group">
								<input type="text" name="taj" id="taj" class="form-control input-lg" placeholder="TAJ szám(ilyen formátumban adja meg:123-456-789)">
							</div>

							
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Jelszó">
							</div>
							<div class="form-group">
								<input type="password" name="password2" id="password2" class="form-control input-lg" placeholder="Jelszó ismét">
							</div>

							<div>
								<input type="submit" name="submit" class="btn btn-lg btn-primary" value="Regisztrál">
							</div>
							<?php echo @$success ?>
							
							
						</fieldset>

					</form>
				</div>

				<div class="col-md-2">
				<?php echo validation_errors(); ?>
				</div>

				<div class="col-md-5">



					<form role="form" method="post" action="index.php/Home/login">
						<fieldset>
							<p class="text-uppercase"> Bejelentkezés </p>
							

							<div class="form-group">
								<input type="text" name="taj" id="taj" class="form-control input-lg" placeholder="TAJ szám(ilyen formátumban adja meg:123-456-789)">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Jelszó">
							</div>
							<div>
								<input type="submit" name="submit" class="btn btn-md" value="Bejelentkezés">
							</div>
						<?php echo @$error ?>	
						</fieldset>
					</form>
				</div>
			</div>
		</div>

	</div>


</body>

</html>