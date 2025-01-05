<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="frontend/images/BROWN - VERTICAL NO-BG.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

    	<link rel="icon" type="image/x-icon" href="<?= base_url('frontend/images/logo-circle-bgwhite.png') ?>">
		<!-- Bootstrap CSS -->
		<link href="<?= base_url('frontend/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<link href="<?= base_url('frontend/css/tiny-slider.css') ?>" rel="stylesheet">
		<link href="<?= base_url('frontend/css/style.css') ?>" rel="stylesheet">
		<title>Fillah Elang</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Fillah Elang<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item ">
							<a class="nav-link" href="<?= base_url() ?>">Home</a>
						</li>
						<li ><a class="nav-link" href="<?= base_url('shop') ?>">Shop</a></li>
						<li ><a class="nav-link" href="<?= base_url('about') ?>">About us</a></li>
						<!-- <li><a class="nav-link" href="<?= base_url('services') ?>">Services</a></li>-->
						<li class="active"><a class="nav-link" href="<?= base_url('blog') ?>">Blog</a></li> 
						<li><a class="nav-link" href="<?= base_url('contact') ?>">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<?php if (session()->get('logged_in')): ?>
							<!-- Cart Icon -->
							<li><a class="nav-link" href="<?= base_url('keranjang') ?>"><img src="<?= base_url() ?>frontend/images/cart.svg"></a></li>
							<li><a class="nav-link" href="<?= base_url('profile') ?>"><img style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; border: 2px solid white;" src="<?= base_url(session()->get('img_user')) ?>"></a></li>

						<?php else: ?>
							<!-- Login Button -->
							<a href="/login" class="login-btn btn border-0 text-dark bg-white py-1">Login</a>
						<?php endif; ?>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Blog</h1>
								<p class="mb-4">Ini adalah tempat kami menjual produk kami secara Offline. Kami juga menyediakan informasi tentang produk kami, dan juga informasi tentang kami sendiri.</p>
								<p><a href="shop" class="btn btn-secondary me-2">Shop Now</a><a href="home" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="<?= base_url('frontend/images/piring.jpg')?>" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				
				<div class="row">

					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="<?= base_url('frontend/images/Mall Bsb.jpg')?>" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Toko Koprasi </a></h3>
								<div class="meta">
									<span>di <a href="#">RSWN Semarang</a></span> <span> mulai <a href="#">Dec 19, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="<?= base_url('frontend/images/tokokoperasi.jpg')?>" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Mall Up Town </a></h3>
								<div class="meta">
									<span>di <a href="#">BSB</a></span> <span> mulai <a href="#">Dec 19, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="<?= base_url('frontend/images/bazar.jpg')?>" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Toko Lazeko</a></h3>
								<div class="meta">
									<span>di <a href="#">Lawang Sewu Semarang</a></span> <span> mulai <a href="#">Dec 19, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					

				</div>
			</div>
		</div>
		<!-- End Blog Section -->	

		

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Testimonials</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Baru pertama kali coba onde-onde ketawa, dan langsung jatuh cinta! Teksturnya renyah di luar, lembut di dalam, dan rasanya gurih banget. Cocok banget buat jadi teman ngopi atau teh di sore hari. Pokoknya, wajib banget dicoba!.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="<?= base_url('frontend/images/person-1.png')?>" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Onde-onde ketawa ini unik banget! Rasanya bikin ketagihan. Tekstur renyahnya tahan lama, jadi bisa dinikmati kapan aja. Saya suka banget sama inovasi jajanan tradisional yang satu ini.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="<?= base_url('frontend/images/person-1.png')?>" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Sebagai penggemar onde-onde, saya sangat merekomendasikan onde-onde ketawa ini. Rasanya beda dari onde-onde biasa, lebih gurih dan renyah. Kemasannya juga praktis, jadi bisa dibawa kemana-mana.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="<?= base_url('frontend/images/person-1.png')?>" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

		 <!-- WhatsApp Icon -->
		 <div class="whatsapp-btn" id="whatsappIcon">
			<div class="whatsapp-icon">
				<i class="bi bi-whatsapp"></i>
			</div>
		</div>

		<!-- Chat Popup -->
		<div class="chat-popup" id="chatPopup">
			<div class="chat-header">
				<span>WhatsApp</span>
				<span class="close-btn" id="closeChat">&times;</span>
			</div>
			<div class="chat-body">
				<div class="chat-message">
					Halo, selamat datang di Fillah Elang. Ada yang bisa team kami bantu?
				</div>
				<a href="https://wa.me/62895425400001" class="chat-button">
					<i class="bi bi-whatsapp"></i>
					Open chat
				</a>
			</div>
			<div class="powered-by">
				Powered by WAme
			</div>
		</div>

		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="<?= base_url('frontend/images/BROWN - HORIZONTAL NO-BG.png')?>" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="<?= base_url('frontend/images/envelope-outline.svg ')?>" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Fillah Elang<span>.</span></a></div>
						<p class="mb-4">Fillah Elang adalah produsen camilan tradisional khas Semarang yang menghadirkan onde-onde ketawa dengan berbagai varian rasa. Mengedepankan kualitas dan cita rasa, Fillah Elang hanya menggunakan bahan-bahan pilihan dalam setiap produknya. Dengan komitmen pada produksi lokal, kami menghadirkan camilan renyah dan lezat yang cocok sebagai oleh-oleh atau teman santai. Fillah Elang, pilihan camilan penuh keceriaan dalam setiap gigitan.</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<!-- <li><a href="#">Services</a></li> -->
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="<?= base_url('frontend/js/bootstrap.bundle.min.js') ?>"></script>
		<script src="<?= base_url('frontend/js/tiny-slider.js') ?>"></script>
		<script src="<?= base_url('frontend/js/custom.js') ?>"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</body>

</html>
