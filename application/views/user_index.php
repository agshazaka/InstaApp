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
							<li class="active"><a href="<?php echo base_url('index.php/user/index/'.$user->username) ?>">Home</a></li>
							<li ><a href="<?php echo base_url('index.php/user/myprofile/'.$user->username) ?>">My Profile</a></li>
							<li><a href="<?php echo base_url('index.php/user/search/'.$user->username) ?>">Find Your Friends</a></li>
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
						<!-- Posts -->
							<section class="posts">
								<?php
									foreach($relation as $user_feed) :
										$feeds = $this->db->get_where('galery', ['username' => $user_feed->username_followed])->result();
										foreach($feeds as $feeds) {
								?>
										<article>
											<header>
												<span class="date"><?php echo $feeds->datetime ?></span>
												<h2><a href="<?php echo base_url('index.php/user/profile')?>"><?php echo $feeds->username ?></a></h2>
											</header>
											<a href="<?php echo base_url('index.php/user/detil_post/'.$user->username.'/'.$feeds->id_file) ?>" class="image fit"><img src="<?php echo base_url('assets/images/post/photos/'.$feeds->file) ?>" style="margin:auto; width:400px; height:400px; object-fit:cover;" alt="" /></a>
											<p><?php echo $feeds->caption ?></p>
											<ul class="actions special">
												<li>
													<?php
														$cek_like = $this->db->get_where('like_post', ['username' => $user->username, 'id_file' => $feeds->id_file])->num_rows();
														$jml_like = $this->db->get_where('like_post', ['id_file' => $feeds->id_file])->num_rows();
														if ($cek_like > 0) {
													?>
														<a href="<?php echo base_url('index.php/user/post_unlike/'.$user->username.'/'.$feeds->id_file) ?>" class="button btn-danger">
															<span style="font-size:150%;"><?php echo $jml_like ?>&nbsp;<i class="icon solo fas fa-heart"></i></span>
														</a>
													<?php
														} else {
													?>
														<a href="<?php echo base_url('index.php/user/post_like/'.$user->username.'/'.$feeds->id_file) ?>" class="button">
															<span style="font-size:150%;"><?php echo $jml_like ?>&nbsp;<i class="icon solo fas fa-heart"></i></span>
														</a>
													<?php
														}
													?>
												</li>
												<li><a href="<?php echo base_url('index.php/user/detil_post/'.$user->username.'/'.$feeds->id_file) ?>" class="button">See post</a></li>
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

				<!-- Footer 
					<footer id="footer">
						<section class="split contact">
							<section class="alt">
								<h3>Address</h3>
								<p>1234 Somewhere Road #87257<br />
								Nashville, TN 00000-0000</p>
							</section>
							<section>
								<h3>Phone</h3>
								<p><a href="#">(000) 000-0000</a></p>
							</section>
							<section>
								<h3>Email</h3>
								<p><a href="#">info@untitled.tld</a></p>
							</section>
							<section>
								<h3>Social</h3>
								<ul class="icons alt">
									<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
						</section>
						<section>
							<form method="post" action="#">
								<div class="fields">
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="3"></textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send Message" /></li>
								</ul>
							</form>
						</section> 
					</footer>
				-->
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
