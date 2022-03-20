
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">

	<!-- Title -->
	<title><?=$title?></title>

	<!-- Favicon -->
	<link href="<?=base_url()?>/assets/img/brand/favicon.png" rel="icon" type="image/png">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href="<?=base_url()?>/assets/css/icons.css" rel="stylesheet">

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="<?=base_url()?>/assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Ansta CSS -->
	<link href="<?=base_url()?>/assets/css/dashboard.css" rel="stylesheet" type="text/css">
	<!-- Ansta CSS -->
	<link href="<?=base_url()?>/assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-gradient-primary">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-5">
				<form class="login100-form validate-form" action="<?=base_url('register/save')?>" method="post">
					<span class="login100-form-title">
                    <?=$title?>
					</span>
                    <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                    <?php endif;?>
                    <div class="wrap-input100 validate-input" data-validate = "Full Name is required"">
						<input class="input100" type="text" name="fullname" placeholder="Full Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-users" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Phone is required">
						<input class="input100" type="text" name="phone" placeholder="Phone Number">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-phone" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="confpassword" placeholder="Re Enetr Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn btn-primary">
							Save
                        </button>
					</div>
					<div class="text-center pt-2">
						<span class="txt1">
							Already Registration
						</span>
						<a class="txt2" href="<?=base_url('auth')?>">
							Click me Back
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Ansta Scripts -->
	<!-- Core -->
	<script src="<?=base_url()?>/assets/plugins/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url()?>/assets/js/popper.js"></script>
	<script src="<?=base_url()?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>