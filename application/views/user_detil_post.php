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
							<li><a href="<?php echo base_url('index.php/user/search/'.$user->username) ?>">Find Your Friends</a></li>
							<li><a href="<?php echo base_url('index.php/user/logout/'.$user->username) ?>">Logout</a></li>
						</ul>
						<ul class="icons">
							<li><button type="button" class="button btn-secondary icon solid solo fas fa-plus" data-toggle="modal" data-target="#add_post">Add Post</button></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Featured Post -->
							<article class="post featured">
								<header class="major">
									<span class="date"><?php echo $post->datetime ?></span>
									<h2><a href="<?php echo base_url('index.php/user/profile')?>"><?php echo $post->username ?></a></h2>
									<p><?php echo $post->caption ?></p>
								</header>
								<a href="#" class="image main"><img src="<?php echo base_url('assets/images/post/photos/'.$post->file) ?>" alt="" style="margin:auto; width:600px; height:600px; object-fit:cover;" /></a>
								<?php
									$cek_like = $this->db->get_where('like_post', ['username' => $user->username, 'id_file' => $post->id_file])->num_rows();
									$jml_like = $this->db->get_where('like_post', ['id_file' => $feeds->id_file])->num_rows();
									if ($cek_like > 0) {
								?>
									<a href="<?php echo base_url('index.php/user/post_unlike/'.$user->username.'/'.$post->id_file) ?>" class="button btn-danger">
										<span style="font-size:150%;"><?php echo $jml_like ?>&nbsp;<i class="icon solo fas fa-heart"></i></span>
									</a>
								<?php
									} else {
								?>
									<a href="<?php echo base_url('index.php/user/post_like/'.$user->username.'/'.$post->id_file) ?>" class="button">
										<span style="font-size:150%;"><?php echo $jml_like ?>&nbsp;<i class="icon solo fas fa-heart"></i></span>
									</a>
								<?php
									}
								?>
							</article>
							
					</div>
				
				<!-- comment -->
					<footer id="footer">
						<section class="split contact">
							<?php
								if ($check > 0) {
									foreach($comment as $com) {
							?>
									<section>
										<h3><a href="<?php echo base_url('index.php/user/profile/'.$com->username)?>"><?php echo $com->username ?></a></h3>
										<p>
											<span class="date" style="font-size:120%;"><?php echo $com->comment ?> </span>
											<br>
											<span class="date" style="font-size:80%;"><?php echo $com->datetime ?></span>
										</p>
										
									</section>
									
							<?php
									}
								} else {
							?>
									<section>
										<h3>Belum ada Komentar!</h3>
									</section>
							<?php
								} 
							?>
							
						</section>
						<section>
							<form action="<?php echo base_url('index.php/user/add_comment/'.$user->username) ?>" method="post">
								<input type="hidden" name="username" value="<?php echo $user->username ?>">
								<input type="hidden" name="id_file" value="<?php echo $post->id_file ?>">
								<div class="fields">
									<div class="field">
										<label for="comment">Comment</label>
										<textarea name="comment" id="comment" rows="3"></textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send Comment" /></li>
								</ul>
							</form>
						</section> 
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
