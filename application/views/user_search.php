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
						<div class="alert alert-dark fade show" role="alert" style="margin-top:5%; position:absoulute;">
							<?php echo $this->session->flashdata('danger') ?>
							<button type="button" data-dismiss="alert" aria-label="Close" style="right:1px;">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				<?php
					}
				?>
				<!-- Intro 
					<div id="intro" class="mt-0">
						<?php
							if($user->foto_profile == "default.jpg") {
						?>
							<span style="font-size:700%;"><i class="icon solid solo fas fa-user"></i></span>
						<?php
							} else {
						?>
							<img class="logo" src="<?php echo base_url('assets/images/profiles/'.$user->foto_profile) ?>" alt="" />
						<?php
							}
						?>
						
						<h1 style="margin-top:5%;"><?php echo $user->username ?></h1>
						<p><strong><?php echo $user->fullname ?></strong></p>
						<p style="margin-top:1%;"><?php echo $user->tentang ?></p>
						<ul class="actions">
							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
							<li><button type="button" class="button icon solid solo fas fa-user-edit" data-toggle="modal" data-target="#edit_profile">Edit Profile</button></li>
						</ul>
					</div>
				-->
				<!-- Header -->
					<header id="header">
						<img class="logo" src="<?php echo base_url('assets/images/instaapp.jpg') ?>" alt="" />
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="<?php echo base_url('index.php/user/index/'.$user->username) ?>">Home</a></li>
							<li><a href="<?php echo base_url('index.php/user/myprofile/'.$user->username) ?>">My Profile</a></li>
							<li class="active"><a href="<?php echo base_url('index.php/user/search/'.$user->username) ?>">Find Your Friends</a></li>
							<li><a href="<?php echo base_url('index.php/user/logout/'.$user->username) ?>">Logout</a></li>
						</ul>
						<ul class="icons">
							<li><button type="button" class="button btn-secondary icon solid solo fas fa-plus" data-toggle="modal" data-target="#add_post">Add Post</button></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Featured Post 
							<article class="post featured">
								<header class="major">
									<span class="date">April 25, 2017</span>
									<h2><a href="#">And this is a<br />
									massive headline</a></h2>
									<p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
									facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
									amet nullam sed etiam veroeros.</p>
								</header>
								<a href="#" class="image main"><img src="images/pic01.jpg" alt="" /></a>
								<ul class="actions special">
									<li><a href="#" class="button large">Full Story</a></li>
								</ul>
							</article>
						-->
						<!-- Footer -->
							<footer id="footer">
								<section>
									<form method="post" action="<?php base_url('index.php/user/search/'.$user->username) ?>">
										<div class="fields">
											<div class="field">
												<label for="search">Search Here!</label>
												<input type="text" name="search" id="search">
											</div>
										</div>
										<ul class="actions row">
											<li class="col-9"></li>
											<li class="col-3"><input type="submit" value="Search"/></li>
										</ul>
									</form>
								</section> 
							</footer>

						<!-- Posts -->
							<section class="posts">
								<?php
									foreach($people as $feeds) :
										if ($feeds->username == $user->username) {
											echo "";
										} else {
								?>
										<article>
											<header>
												<h2><a href="<?php echo base_url('index.php/user/profile')?>"><?php echo $feeds->username ?></a></h2>
												<span class="date">
													<?php
														$jml_follower	= $this->db->get_where('follow', ['username' => $feeds->username])->num_rows();
														$follower		= $jml_follower - 1;
														echo $follower." Follower";
													?>
												</span>
											</header>
											<a href="<?php echo base_url('index.php/user/detil_post/'.$feeds->username) ?>" class="image fit">
												<?php
													if($user->foto_profile == "default.jpg") {
												?>
													<span style="font-size:700%;"><i class="icon solid solo fas fa-user-circle"></i></span>
												<?php
													} else {
												?>
													<img style="margin:auto; width:200px; height:200px; object-fit:cover;" src="<?php echo base_url('assets/images/profiles/'.$feeds->foto_profile) ?>" alt="" />
												<?php
													}
												?>
											</a>
											<p></p>
											<ul class="actions special">
												<li><a href="<?php echo base_url('index.php/user/profile/'.$feeds->username) ?>" class="button">See Profile</a></li>
												<?php
													$cek_follow = $this->db->get_where('follow', ['username' => $user->username, 'username_followed' => $feeds->username])->num_rows();
													if ($cek_follow > 0) {
												?>
													<li><a href="<?php echo base_url('index.php/user/unfollow/'.$user->username.'/'.$feeds->username) ?>" class="button">Unfollow</a></li>
												<?php
													} else {
												?>
													<li><a href="<?php echo base_url('index.php/user/follow/'.$user->username.'/'.$feeds->username) ?>" class="button">Follow</a></li>
												<?php
													}
												?>
											</ul>
										</article>
								<?php
										}
									endforeach; 
								?>
								
							</section>

						<!-- Footer
							<footer>
								<div class="pagination">
									<a href="#" class="previous">Prev</a>
									<a href="#" class="page active">1</a>
									<a href="#" class="page">2</a>
									<a href="#" class="page">3</a>
									<span class="extra">&hellip;</span>
									<a href="#" class="page">8</a>
									<a href="#" class="page">9</a>
									<a href="#" class="page">10</a>
									<a href="#" class="next">Next</a>
								</div>
							</footer>
						 -->
					</div>

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>By : <a href="#">Agsha Zaka</a></li></ul>
					</div>

			</div>
		<!-- Modal -->
			<?php $this->load->view('_partials/modal.php') ?>
		<!-- Scripts -->
			<?php $this->load->view('_partials/js.php') ?>

	</body>
</html>
