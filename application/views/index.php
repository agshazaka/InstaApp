<!DOCTYPE HTML>
<html>
	<head>
		<title>Insta App - by Agsha</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo base_url('assets/massively/assets/css/fontawesome-all.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/massively/assets/css/main.css') ?>" />
		<noscript><link rel="stylesheet" href="<?php echo base_url('assets/massively/assets/css/noscript.css') ?>" /></noscript>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	<body class="is-preload">
		
		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">
				<?php
					if ($this->session->flashdata('danger'))
					{
				?>
					<div class="container">
						<div class="alert alert-dark fade show" role="alert" style="margin-top:5%; position:relative;">
							<?php echo $this->session->flashdata('danger') ?>
							<button type="button" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				<?php
					}
				?>

				<!-- Intro -->
				<div id="intro" class="mt-0">
					<img class="logo" src="<?php echo base_url('assets/images/instaapp.jpg') ?>" alt=""/>
					<h1 style="margin-top:2%;">InstaApp</h1>
					<p>The Next Level Social Media</p>
					<ul class="actions">
						<!-- <li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li> -->
						<li><button type="button" class="button icon solid solo fas fa-sign-in-alt" data-toggle="modal" data-target="#login">Login</button></li>
						<li><button type="button" class="button icon solid solo fas fa-user-plus" data-toggle="modal" data-target="#signup">Sign Up</a></li>
						<!-- <li><a href="<?php echo base_url('index.php/welcome/register') ?>" class="button icon solid solo fas fa-user-plus">Sign Up</a></li> -->
					</ul>
				</div>

			</div>
		<!-- Modal -->
			<?php $this->load->view('_partials/js.php') ?>
		<!-- Scripts -->
			<!-- Modal Login-->
			<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Login!</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="mt-20 mb-20" id="form_login" action="<?php echo base_url('index.php/welcome/login') ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="exampleInputEmail1">username</label>
									<input type="username" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
									<small id="emailHelp" class="form-text text-muted">Masukan Username Anda yang telah terdaftar.</small>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" name="password" class="form-control" id="exampleInputPassword1">
								</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="button" data-dismiss="modal">Cancel</button>
							<button type="submit" class="button">Login</button>
							<!-- <button type="button" onclick="document.getElementById('form_login').submit();" class="button">Login</button> -->
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Sign Up-->
			<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Sign Up!</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="mt-20 mb-20 needs-validation" id="form_signup" action="<?php echo base_url('index.php/welcome/signup') ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="foto_profile" value="default.jpg">
								<div class="form-group">
									<label for="exampleInputEmail1">Email</label>
									<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
								</div>
								<div class="form-group">
									<label for="fullname">Nama Lengkap</label>
									<input type="text" name="fullname" class="form-control" id="fullname" aria-describedby="fullname" required>
								</div>
								<br>
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" class="form-control" id="username" aria-describedby="username" required>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
								</div>
						</div>
						<div class="modal-footer">
								<button type="button" class="button" data-dismiss="modal">Cancel</button>
								<button type="submit" class="button">Sign Up</button>
							<!-- <button type="button" onclick="document.getElementById('form_signup').submit();" class="button">Sign Up</button> -->
							</form>
						</div>
					</div>
				</div>
			</div>
	</body>
</html>
