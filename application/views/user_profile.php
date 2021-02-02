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
				<!-- Intro -->
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
						<p style="margin-top:1%;">
							<?php echo $user->tentang ?>
						</p>
						<ul class="actions">
							<!-- <li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li> -->
							<li><button type="button" class="button icon solid solo fas fa-user-edit" data-toggle="modal" data-target="#edit_profile">Edit Profile</button></li>
						</ul>
					</div>

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
							<!--
							<li><a href="#" class="icon solid solo fas fa-plus mt-10 mb-10"><span class="label">Tambah Post</span></a></li>
							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
							-->
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
						<?php
						if ($cek > 0) {
						?>
						<!-- Posts -->
						<section class="posts">
							<?php
								foreach($post as $feeds) :	
							?>
									<article>
										<header>
											<span class="date"><?php echo $feeds->datetime ?></span>
											<h2><a href="<?php echo base_url('index.php/user/profile/'.$feeds->username) ?>"><?php echo $feeds->username ?></a></h2>
										</header>
										<a href="#" class="image fit"><img src="<?php echo base_url('assets/images/post/photos/'.$feeds->file) ?>" alt="" /></a>
										<p></p>
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
								endforeach;
							?>
							</section>
						<?php
						} else {
						?>
							<article class="post featured">
								<header>
									<h2><a href="#">Belum ada Postingan</a></h2>
								</header>
							</article>
						<?php
						}
						?>
							<!--
							<section class="posts">
								<article>
									<header>
										<span class="date">April 24, 2017</span>
										<h2><a href="#">Sed magna<br />
										ipsum faucibus</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
									<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
									<ul class="actions special">
										<li><a href="#" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">April 22, 2017</span>
										<h2><a href="#">Primis eget<br />
										imperdiet lorem</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
									<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
									<ul class="actions special">
										<li><a href="#" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">April 18, 2017</span>
										<h2><a href="#">Ante mattis<br />
										interdum dolor</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic04.jpg" alt="" /></a>
									<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
									<ul class="actions special">
										<li><a href="#" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">April 14, 2017</span>
										<h2><a href="#">Tempus sed<br />
										nulla imperdiet</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a>
									<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
									<ul class="actions special">
										<li><a href="#" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">April 11, 2017</span>
										<h2><a href="#">Odio magna<br />
										sed consectetur</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic06.jpg" alt="" /></a>
									<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
									<ul class="actions special">
										<li><a href="#" class="button">Full Story</a></li>
									</ul>
								</article>
								<article>
									<header>
										<span class="date">April 7, 2017</span>
										<h2><a href="#">Augue lorem<br />
										primis vestibulum</a></h2>
									</header>
									<a href="#" class="image fit"><img src="images/pic07.jpg" alt="" /></a>
									<p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p>
									<ul class="actions special">
										<li><a href="#" class="button">Full Story</a></li>
									</ul>
								</article>
							</section>
							-->

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

				<!-- Footer -->
					<footer id="footer">
						<!--
						<section>
							<form method="post" action="#">
								<div class="fields">
									<div class="field">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" />
									</div>
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
						-->	
					</footer>

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
