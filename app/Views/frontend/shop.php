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
				<a class="navbar-brand" href="<?= base_url() ?>">Fillah Elang<span></span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
						<li class="active"><a class="nav-link" href="<?= base_url('shop') ?>">Shop</a></li>
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
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
			<div class="container">
				<div class="row">
				

				<?php foreach ($products as $product): ?>
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#" data-product-id="<?= $product['id'] ?>" data-image-url="<?= base_url(model('ProductImageModel')->where('product_id', $product['id'])->first()['image_url']) ?>">
						<?php 
							$image = model('ProductImageModel')->where('product_id', $product['id'])->first();
							if ($image): 
						?>
							<img src="<?= base_url($image['image_url']) ?>" class="img-fluid product-thumbnail">
						<?php endif; ?>
						
						<h3 class="product-title"><?= $product['name'] ?></h3>
						<strong class="product-price">Rp <?= number_format($product['price'], 0, ',', '.') ?></strong>

						<button class="border-0 outline-0 add-to-cart" data-product-id="<?= $product['id'] ?>">
							<span class="icon-cross">
							<img src="<?= base_url() ?>frontend/images/cross.svg" class="img-fluid">
							</span>
						</button>
						</a>
					</div> 
				<?php endforeach; ?>

				</div>
			</div>
		</div>


		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="<?= base_url('frontend/') ?>images/BROWN - HORIZONTAL NO-BG.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="<?= base_url('frontend/') ?>images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

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
									<!-- <li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li> -->
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
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
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
	<!-- Tambahkan di bagian <head> atau sebelum penutup tag </body> -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		
	</body>

</html>
