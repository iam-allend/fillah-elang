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
  <link rel="shortcut icon" href="images/BROWN - VERTICAL NO-BG.png">

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
				<a class="navbar-brand" href="<?= base_url() ?>">Fillah Elang</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="active"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
						<li><a class="nav-link" href="<?= base_url('shop') ?>">Shop</a></li>
						<li><a class="nav-link" href="<?= base_url('about') ?>">About us</a></li>
						<!-- <li><a class="nav-link" href="<?= base_url('services') ?>">Services</a></li>-->
						<li><a class="nav-link" href="<?= base_url('blog') ?>">Blog</a></li> 
						<li><a class="nav-link" href="<?= base_url('contact') ?>">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<?php if (session()->get('logged_in')): ?>
							<!-- Cart Icon -->
							<li><a class="nav-link" href="<?= base_url('keranjang') ?>"><img src="<?= base_url() ?>frontend/images/cart.svg"></a></li>
							<li><a class="nav-link" href="<?= base_url('profile') ?>"><img style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; border: 2px solid white;" src="<?= base_url(session()->get('img_user')) ?>"></a></li>

						<?php else: ?>
							<!-- Login Button -->
							<a href="<?= base_url('login') ?>" class="login-btn btn border-0 text-dark bg-white py-1">Login</a>
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
								<h1>Oleh Oleh <span clsas="d-block">Kota Semarang</span></h1>
								<p class="mb-4 text-white">Kalau kata nenekku "Tiada Ketawa yang serenyah satu ini"</p>
								<p><a href="shop" class="btn btn-shop-now me-2">Shop Now</a><a href="home" class="btn bg-transparent border-1 border-white">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="<?= base_url() ?>frontend/images/piring.jpg" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->
							
		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row position-relative overflow-hidden">

					<!-- Start Column 1 -->
					<div class=" col-12 col-md-5 col-lg-4 my-5">
						<h2 class="mb-4 section-title">Dibuat dari bahan-bahan berkualitas.</h2>
						<p class="mb-4">Produk ini adalah onde-onde ketawa dari merek Fillah, yang merupakan camilan khas Semarang dengan tekstur renyah dan tampilan yang menggugah selera. Dibuat dengan bahan berkualitas dan proses yang higienis, produk ini dijamin kehalalannya oleh Halal Indonesia , sehingga aman dan nyaman dikonsumsi. </p>
						<p><a href="shop.html" class="btn">Explore</a></p>
					</div> 
					<!-- End Column 1 -->

					<div class="col-12 col-md-7 col-lg-8" >
						
						<div class="container" style="display: flex; overflow-y:no; overflow-x: scroll; white-space: nowrap; width: max-content;">
							<?php foreach ($products as $product): ?>
							
								<div class="product-item d-inline-block my-5 mx-2"  data-product-id="<?= $product['id'] ?>" data-image-url="<?= base_url(model('ProductImageModel')->where('product_id', $product['id'])->first()['image_url']) ?>" style="width: 300px;">
									<?php 
										$image = model('ProductImageModel')->where('product_id', $product['id'])->first();
										if ($image): 
									?>
									<img src="<?= base_url($image['image_url']) ?>" class="img-fluid product-thumbnail">
									<?php endif; ?>
									
									<h3 class="product-title p-2"><?= $product['name'] ?></h3>
									<strong class="product-price">Rp <?= number_format($product['price'], 0, ',', '.') ?></strong>

								</div>
						<?php endforeach; ?>
						</div>
						
					</div>

				</div>
			</div>
		</div>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Kenapa Belanja di Toko Oleh-Oleh Semarang Kami?</h2>
						<p>Nikmati cita rasa khas Semarang dengan onde-onde ketawa kami yang gurih dan renyah. Setiap gigitan menghadirkan kualitas terbaik dari resep tradisional yang diwariskan turun-temurun.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="<?= base_url() ?>frontend/images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Pengiriman Cepat&amp; dan Aman</h3>
									<p>Kami pastikan oleh-oleh khas Anda sampai dengan cepat dan aman, tetap renyah dan segar saat tiba di tangan Anda.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="<?= base_url() ?>frontend/images/hand.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Rasa Otentik dan Kekinian</h3>
									<p>Dibuat dengan bahan-bahan berkualitas dan resep tradisional, produk kami menghadirkan kelezatan autentik khas Semarang serta dibuat dengan kekinian anak muda</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="<?= base_url() ?>frontend/images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p>Tim kami siap membantu Anda kapan saja, memastikan pengalaman belanja oleh-oleh yang menyenangkan dan bebas repot.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="<?= base_url() ?>frontend/images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Kemasan Menarik</h3>
									<p>Kemasan yang dibuat oleh kami, dan kami akan menjaga kemasan Anda dengan baik.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="<?= base_url() ?>frontend/images/onde.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<!-- <div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="<?= base_url() ?>frontend/images/img-grid-1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="<?= base_url() ?>frontend/images/img-grid-2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="<?= base_url() ?>frontend/images/img-grid-3.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
						<p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
							<li>Donec vitae odio quis nisl dapibus malesuada</li>
						</ul>
						<p><a herf="#" class="btn">Explore</a></p>
					</div>
				</div>
			</div>
		</div> -->
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="<?= base_url() ?>frontend/images/onde-original.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Onde-Onde Ketawa Original</h3>
								<p>Onde onde dengan rasa Original yang dicari oleh semua orang.</p>
								<p><a href="#">Read More</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="<?= base_url() ?>frontend/images/onde-stawberi.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Onde-Onde Ketawa Stawberi</h3>
								<p>Onde onde rasa Stawberi yang dibuat untuk mengikuti Zaman.</p>
								<p><a href="#">Read More</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="<?= base_url() ?>frontend/images/onde-coklat.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Onde-Onde Ketawa Coklat</h3>
								<p>Dengan rasa Coklat yang lezat dan renyah,membuat menjadi rasa yang berbeda</p>
								<p><a href="#">Read More</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Popular Product -->

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
														<img src="<?= base_url() ?>frontend/images/person-1.png" alt="Maria Jones" class="img-fluid">
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
														<img src="<?= base_url() ?>frontend/images/person-1.png" alt="Maria Jones" class="img-fluid">
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
														<img src="<?= base_url() ?>frontend/images/person-1.png" alt="Maria Jones" class="img-fluid">
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

		<!-- Start Blog Section
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Recent Blog</h2>
					</div>
					<div class="col-md-6 text-start text-md-end">
						<a href="#" class="more">View All Posts</a>
					</div>
				</div>

				<div class="row">

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="<?= base_url() ?>frontend/images/post-1.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">First Time Home Owner Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="<?= base_url() ?>frontend/images/post-2.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">How To Keep Your Furniture Clean</a></h3>
								<div class="meta">
									<span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="<?= base_url() ?>frontend/images/post-3.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Small Space Furniture Apartment Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div> -->
		<!-- End Blog Section -->	
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
				<a href="https://wa.me/62895425400001" class="chat-button" target="_blank">
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

				

				<div class="row">
					<div class="col-lg-8">

						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="<?= base_url() ?>frontend/images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

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

						<div class="sofa-img">
							<img src="<?= base_url() ?>frontend/images/BROWN - HORIZONTAL NO-BG.png" alt="Image" class="img-fluid">
						</div>

					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Fillah Elang<span>.</span></a></div>
						<p class="mb-4">
							Fillah Elang adalah produsen camilan tradisional khas Semarang yang menghadirkan onde-onde ketawa dengan berbagai varian rasa. Mengedepankan kualitas dan cita rasa, Fillah Elang hanya menggunakan bahan-bahan pilihan dalam setiap produknya. Dengan komitmen pada produksi lokal, kami menghadirkan camilan renyah dan lezat yang cocok sebagai oleh-oleh atau teman santai. Fillah Elang, pilihan camilan penuh keceriaan dalam setiap gigitan.</p>

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
									<!-- <li><a href="#">Services</a></li>-->
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

		<script>
		document.querySelectorAll('.add-to-cart').forEach(button => {
			button.addEventListener('click', function () {
				const productId = this.getAttribute('data-product-id');
				const productItem = this.closest('.product-item');
				const productImageUrl = productItem.getAttribute('data-image-url'); // Ambil URL gambar dari data-image-url

				// Tampilkan popup konfirmasi
				Swal.fire({    
				title: 'Tambahkan ke Keranjang?',
				text: "Apakah Anda yakin ingin menambahkan produk ini ke keranjang?",
				imageUrl: productImageUrl,  // Gunakan URL gambar produk yang sesuai
				imageWidth: 100,
				imageHeight: 100,
				imageAlt: 'Gambar Produk',
				// icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, tambahkan!',
				cancelButtonText: 'Batal'
				}).then((result) => {
				if (result.isConfirmed) {
					// Kirim request untuk menambahkan produk ke keranjang
					fetch('<?= base_url('add-to-cart') ?>', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					},
					body: 'product_id=' + productId
					})
					.then(response => response.json())
					.then(data => {
					if (data.success) {
						Swal.fire(
						'Berhasil!',
						'Produk telah ditambahkan ke keranjang.',
						'success'
						);
					} else {
						Swal.fire(
						'Gagal!',
						data.message,
						'error'
						);
					}
					})
					.catch(error => {
					console.error('Error:', error);
					Swal.fire(
						'Error!',
						'Terjadi kesalahan saat menambahkan produk ke keranjang.',
						'error'
					);
					});
				}
				});
			});
			});

	</script>

		


		<script src="<?= base_url('frontend/js/bootstrap.bundle.min.js') ?>"></script>
		<script src="<?= base_url('frontend/js/tiny-slider.js') ?>"></script>
		<script src="<?= base_url('frontend/js/custom.js') ?>"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	</body>

</html>
