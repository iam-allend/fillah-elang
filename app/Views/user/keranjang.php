<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php elseif (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Keranjang</title>
    
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('frontend/images/logo-circle-bgwhite.png') ?>">
    <!-- Custom CSS -->
    <link href="<?= base_url('user/html/css/style.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('user/html/css/style-custom.css') ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<style>
    a{
        text-decoration: none !important;
    }
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand ms-4" href="home">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url('img/logo-white.png')?>" alt="homepage" width="20" class="dark-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            FALLAH
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto mt-md-0 ">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <li class="nav-item search-box">
                            <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search" style="display: none;">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            
                        <?php if (session()->get('logged_in')): ?>
							<!-- Cart Icon -->
							<li><a class="nav-link" href="<?= base_url('keranjang') ?>"><img src="<?= base_url() ?>frontend/images/cart.svg"></a></li>
							<li><a class="nav-link" href="<?= base_url('profile') ?>"><img style="width: 35px; height: 35px; object-fit: cover; border-radius: 50%; border: 2px solid white;" src="<?= base_url(session()->get('img_user')) ?>"></a></li>

						<?php else: ?>
							<!-- Login Button -->
							<a href="/login" class="login-btn btn border-0 text-dark bg-white py-1">Login</a>
						<?php endif; ?>
                        </li>
                    </ul>

                    
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->  
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <!-- User Profile-->
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="home" aria-expanded="false"><i class="mdi me-2 mdi-gauge"></i><span
                                    class="hide-menu">Dashboard</span></a></li> -->
                                    
                        <li class="sidebar-item "> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('profile')?>" aria-expanded="false">
                                <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('transaksi')?>" aria-expanded="false"><i class="mdi me-2 mdi-cash-multiple"></i><span
                                    class="hide-menu">Transaksi</span></a></li>

                        <li class="sidebar-item "> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('keranjang')?>" aria-expanded="false">
                                <i class="mdi me-2 mdi-cart"></i><span class="hide-menu">Keranjang</span></a>
                        </li>
                            
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="sidebar-footer">
                <div class="row">
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="<?= base_url()?>" class="link" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bantuan">
                            <i class="fa-regular fa-comment-dots"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="<?= base_url()?>home" class="link" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Home">
                            <i class="fa-solid fa-house"></i></a>
                    </div>
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <script type="text/javascript">
                            function confirm_logout() {
                            return confirm('Yakin ingin logout?');
                            }
                        </script>
                        <a onclick="return confirm_logout()" href="<?= base_url()?>logout" class="link" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Logout">
                        <i class="fa-solid fa-power-off"></i></a>
                    </div>
                </div>
            </div>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Keranjang</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">
                            <!-- <a href=""
                                class="btn btn-danger d-none d-md-inline-block text-white" target="_blank">TEXT HERE</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <style>
                    .card-body.card-body-custom, .card-custom {
                        position: relative;
                        display: -webkit-box;
                        display: -ms-flexbox;
                        display: flex;
                        -webkit-box-orient: vertical;
                        -webkit-box-direction: normal;
                        -ms-flex-direction: column;
                        flex-direction: column;
                        min-width: 0;
                        word-wrap: break-word;
                        background-color: transparent !important;
                        background-clip: border-box;
                        border: 0px solid transparent;
                        border-radius: 0px;
                        box-shadow: 0 !important;
                        -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.00);
                    }

                    .table.user-table thead tr{
                        background-color: white;
                        border-radius: 2rem;
                        -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
                    }
                    tbody tr{
                        background-color: white;
                        border-radius: 2rem;
                        -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
                        margin: 20px 0;
                    }
                </style>
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card card-custom">
                            <div class="card-body card-body-custom">

                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Pilih</th>
                                                <th class="border-top-0">Image</th>
                                                <th class="border-top-0">Nama Produk</th>
                                                <th class="border-top-0">Harga Satuan</th>
                                                <th class="border-top-0">Kuantitas</th>
                                                <th class="border-top-0">Total Harga</th>
                                                <th class="border-top-0">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Spacer row to add space between thead and tbody -->
                                            <tr class="bg-transparent"><td colspan="7"></td></tr> 

                                            <!-- Loop melalui produk -->
                                            <?php foreach ($cartItems as $product): ?>
                                                <tr>
                                                    <td><input type="checkbox" name="choose" data-product-id="<?= $product['product_id'] ?>"></td>
                                                    
                                                    <td>
                                                        <img src="<?= base_url('' . $product['image_url']) ?>" alt="<?= $product['product_name'] ?>" width="50"></td>

                                                    <td><?= $product['product_name'] ?></td>

                                                    <td><?= number_format($product['product_price'], 0, ',', '.') ?></td>
                                                    <td>
                                                        <input type="number" class="form-control w-50 quantity" name="F_quantity" data-product-price="<?= $product['product_price'] ?>" value="<?= $product['quantity'] ?>"></td>
                                                    
                                                    <td class="total-price">
                                                        <?= number_format($product['product_price'] * $product['quantity'], 0, ',', '.'); ?>
                                                    </td>
                                                    <td class="d-flex border-0 gap-1">
                                                        <button class="btn btn-danger text-white delete-cart-item" data-cart-id="<?= $product['cart_id'] ?>">Hapus</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            
                                        </tbody>
                                    </table>
                                    <button class="btn btn-info text-white px-5"  data-bs-toggle="offcanvas" data-bs-target="#cartSidebar" >Pesan</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>


    <!-- Offcanvas Checkout -->
<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="cartSidebar" aria-labelledby="cartSidebarLabel">
    <div class="offcanvas-header">
        <h5 id="cartSidebarLabel">Pesanan Anda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body w-100">
        <ul id="cartItemsList" class="list-unstyled"></ul>
        <hr>
        
        <div class="mt-3">
            <h6>Nomor Rekening</h6>
            <p>123456789 - Bank ABC</p>
            
            <form id="cartForm" enctype="multipart/form-data">
                <!-- Bukti Transfer -->
                <div class="mb-3">
                    <label for="buktiTf" class="form-label">Upload Bukti Transfer</label>
                    <input type="file" name="buktiTf" id="buktiTf" class="form-control" required>
                </div>

                <!-- Alamat Pengiriman -->
                <div class="mb-3">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <select id="provinsi" name="provinsi" class="form-control" required>
                        <option value="">Pilih Provinsi</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kota" class="form-label">Kota/Kabupaten</label>
                    <select id="kota" name="kota" class="form-control" required disabled>
                        <option value="">Pilih Kota/Kabupaten</option>
                    </select>
                </div>

                <!-- Kurir -->
                <div class="mb-3">
                    <label for="courier" class="form-label">Jasa Pengiriman</label>
                    <select id="courier" name="courier" class="form-control" required disabled>
                        <option value="">Pilih Kurir</option>
                        <option value="jne">JNE Reguler</option>
                        <option value="pos">POS Indonesia</option>
                        <option value="tiki">TIKI Reguler</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamatDetail" class="form-label">Alamat Lengkap</label>
                    <textarea name="alamatDetail" id="alamatDetail" class="form-control" required></textarea>
                </div>

                <!-- Ringkasan Biaya -->
                <div class="card mt-4 mb-3">
                    <div class="card-body">
                        <h6 class="card-title">Ringkasan Biaya</h6>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Produk:</span>
                            <span id="totalProducts">Rp 0</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Ongkos Kirim:</span>
                            <span id="ongkir">Rp 0</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total Pembayaran:</span>
                            <span id="totalPayment">Rp 0</span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Konfirmasi Pesanan</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Function to load provinces
    function loadProvinces() {
        fetch('/rajaongkir/provinces')
            .then(response => response.json())
            .then(data => {
                const provinsiSelect = document.getElementById('provinsi');
                if (provinsiSelect && data.rajaongkir && data.rajaongkir.results) {
                    provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                    data.rajaongkir.results.forEach(province => {
                        const option = new Option(province.province, province.province); // Simpan nama provinsi
                        provinsiSelect.add(option);
                    });
                }
            })
            .catch(error => {
                console.error('Error loading provinces:', error);
            });
    }

    // City change handler
    document.getElementById('kota').addEventListener('change', function() {
        const cityId = this.value;
        const cityName = this.options[this.selectedIndex].text; // Ambil nama kota
        // Lakukan sesuatu dengan cityName jika perlu
    });
</script>
    
<script>
    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('input', function() {
            const price = parseFloat(this.getAttribute('data-product-price'));
            const quantity = parseInt(this.value);
            const totalPrice = price * quantity;
            this.closest('tr').querySelector('.total-price').textContent = new Intl.NumberFormat('id-ID').format(totalPrice);
        });
    });

    function showCartSidebar() {
        const cartSidebar = new bootstrap.Offcanvas(document.getElementById('cartSidebar'));
        cartSidebar.show();

        // Reset list produk
        document.getElementById('cartItemsList').innerHTML = '';

        // Loop untuk menambah item yang dipilih
        document.querySelectorAll('input[name="choose"]:checked').forEach((checkbox) => {
            const row = checkbox.closest('tr');
            const productName = row.querySelector('td:nth-child(3)').textContent;
            const quantity = row.querySelector('input[name="F_quantity"]').value;
            const price = row.querySelector('td:nth-child(4)').textContent;

            const li = document.createElement('li');
            li.textContent = `${productName} - ${quantity} x ${price}`;
            document.getElementById('cartItemsList').appendChild(li);
        });
    }

    function getProductData(row) {
        return {
            productId: row.querySelector('input[name="choose"]').getAttribute('data-product-id'),
            name: row.querySelector('td:nth-child(3)').textContent.trim(),
            price: row.querySelector('td:nth-child(4)').textContent.trim(),
            quantity: row.querySelector('.quantity').value.trim(),
            totalPrice: row.querySelector('.total-price').textContent.trim(),
        };
    }


    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('input', function() {
            const price = parseFloat(this.getAttribute('data-product-price'));
            const quantity = parseInt(this.value);
            const totalPrice = price * quantity;
            this.closest('tr').querySelector('.total-price').textContent = 
                new Intl.NumberFormat('id-ID').format(totalPrice);
        });
    });
</script>


<script>

    document.addEventListener('DOMContentLoaded', function() {
    let selectedProducts = [];
    let shippingCost = 0;
    let totalProductPrice = 0;

    // Load Provinces when page loads
    loadProvinces();

    // Function to load provinces
    function loadProvinces() {
        fetch('/rajaongkir/provinces')
            .then(response => response.json())
            .then(data => {
                const provinsiSelect = document.getElementById('provinsi');
                if (provinsiSelect && data.rajaongkir && data.rajaongkir.results) {
                    provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                    data.rajaongkir.results.forEach(province => {
                        const option = new Option(province.province, province.province_id);
                        provinsiSelect.add(option);
                    });
                }
            })
            .catch(error => {
                console.error('Error loading provinces:', error);
            });
    }

    // Province change handler
    document.getElementById('provinsi').addEventListener('change', function() {
        const provinceId = this.value;
        const kotaSelect = document.getElementById('kota');
        const courierSelect = document.getElementById('courier');
        
        kotaSelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
        kotaSelect.disabled = true;
        courierSelect.disabled = true;

        if (provinceId) {
            fetch(`/rajaongkir/cities/${provinceId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.rajaongkir && data.rajaongkir.results) {
                        data.rajaongkir.results.forEach(city => {
                            const option = new Option(`${city.type} ${city.city_name}`, city.city_id);
                            kotaSelect.add(option);
                        });
                        kotaSelect.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error loading cities:', error);
                });
        }
    });


    function calculateShippingCost(cityId, weight) {
        const courier = document.getElementById('courier').value;

        if (!cityId || !courier) {
            console.error('City ID or courier not selected');
            return;
        }

        fetch(`/rajaongkir/ongkir/${cityId}/${weight}/${courier}`, {
            method: 'POST', // Pastikan ini adalah POST
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log('Shipping response:', data); // Debug log
            if (data.rajaongkir && data.rajaongkir.results && 
                data.rajaongkir.results[0] && 
                data.rajaongkir.results[0].costs && 
                data.rajaongkir.results[0].costs[0]) {
                
                shippingCost = data.rajaongkir.results[0].costs[0].cost[0].value;
                document.getElementById('ongkir').textContent = `Rp ${formatNumber(shippingCost)}`;
                updateTotalPrice();
            } else {
                console.error('Invalid shipping cost data structure:', data);
            }
        })
        .catch(error => {
            console.error('Error calculating shipping:', error);
        });
    }

    // City change handler
    document.getElementById('kota').addEventListener('change', function() {
        document.getElementById('courier').disabled = !this.value;

        // Ambil ID kota yang dipilih
        const cityId = this.value;

        // Set default weight jika tidak ada perhitungan berat
        const totalWeight = calculateTotalWeight() || 100; // minimal 1kg

        // Debug log
        console.log('Calculating shipping:', {
            cityId: cityId,
            weight: totalWeight,
            courier: document.getElementById('courier').value
        });

        // Panggil fungsi untuk menghitung ongkir
        calculateShippingCost(cityId, totalWeight);
    });

    // Courier change handler
    document.getElementById('courier').addEventListener('change', function() {
        if (!this.value) return;

        const cityId = document.getElementById('kota').value;
        // Set default weight jika tidak ada perhitungan berat
        const totalWeight = calculateTotalWeight() || 100; // minimal 1kg

        // Debug log
        console.log('Calculating shipping:', {
            cityId: cityId,
            weight: totalWeight,
            courier: this.value
        });

        fetch(`/rajaongkir/ongkir/${cityId}/${totalWeight}/${this.value}`)
            .then(response => response.json())
            .then(data => {
                console.log('Shipping response:', data); // Debug log
                if (data.rajaongkir && data.rajaongkir.results && 
                    data.rajaongkir.results[0] && 
                    data.rajaongkir.results[0].costs && 
                    data.rajaongkir.results[0].costs[0]) {
                    
                    shippingCost = data.rajaongkir.results[0].costs[0].cost[0].value;
                    document.getElementById('ongkir').textContent = `Rp ${formatNumber(shippingCost)}`;
                    updateTotalPrice();
                } else {
                    console.error('Invalid shipping cost data structure:', data);
                }
            })
            .catch(error => {
                console.error('Error calculating shipping:', error);
            });
    });

    // "Pesan" button click handler
    document.querySelector('[data-bs-toggle="offcanvas"]').addEventListener('click', function() {
        const checkedBoxes = document.querySelectorAll('input[name="choose"]:checked');
        
        if (checkedBoxes.length === 0) {
            alert('Silakan pilih produk terlebih dahulu');
            return;
        }

        selectedProducts = Array.from(checkedBoxes).map(checkbox => {
            const row = checkbox.closest('tr');
            const quantity = parseInt(row.querySelector('.quantity').value);
            const price = parseInt(row.querySelector('.quantity').getAttribute('data-product-price'));
            const productName = row.querySelector('td:nth-child(3)').textContent.trim();
            
            return {
                productId: checkbox.getAttribute('data-product-id'),
                name: productName,
                price: price,
                quantity: quantity,
                weight: 200, // Default weight in grams
                subtotal: price * quantity
            };
        });

        totalProductPrice = selectedProducts.reduce((total, product) => total + product.subtotal, 0);
        
        // Update cart items list
        updateCartItemsList();
        // Reset shipping cost when opening offcanvas
        shippingCost = 0;
        updateTotalPrice();
    });

    // Form submit handler
    document.getElementById('cartForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        formData.append('products', JSON.stringify(selectedProducts));
        formData.append('shipping_cost', shippingCost); // Pastikan ini ada
        formData.append('shipping_courier', document.getElementById('courier').value);

        // Ambil nama provinsi dan kota
        const provinceName = document.getElementById('provinsi').value; // Ambil nama provinsi
        const cityName = document.getElementById('kota').value; // Ambil nama kota

        // Tambahkan nama provinsi dan kota ke formData
        formData.append('provinsi', provinceName);
        formData.append('kota', cityName);

        // Debug log untuk memeriksa data yang akan dikirim
        console.log('Form data being sent:', {
            products: selectedProducts,
            shipping_cost: shippingCost,
            shipping_courier: document.getElementById('courier').value,
            province: provinceName,
            city: cityName
        });

        fetch('/transaction/save', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'  // Menandai sebagai AJAX request
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Pesanan berhasil dibuat!');
                window.location.reload();
            } else {
                alert('Error: ' + (data.error || 'Terjadi kesalahan'));
            }
        })
        .catch(error => {
            console.error('Error submitting form:', error);
            alert('Terjadi kesalahan saat memproses pesanan');
        });
    });

    // Helper Functions
    function calculateTotalWeight() {
        return selectedProducts.reduce((total, product) => {
            // Ubah weight menjadi 100 gram (1kg) per produk atau sesuaikan dengan kebutuhan
            const productWeight = 100;
            return total + (productWeight * product.quantity);
        }, 0);
    }

    function updateCartItemsList() {
        const cartItemsList = document.getElementById('cartItemsList');
        if (cartItemsList) {
            cartItemsList.innerHTML = selectedProducts.map(product => `
                <li class="mb-2">
                    <strong>${product.name}</strong><br>
                    ${product.quantity} x Rp ${formatNumber(product.price)} = Rp ${formatNumber(product.subtotal)}
                </li>
            `).join('');
        }
    }

    function updateTotalPrice() {
        const totalProductsElement = document.getElementById('totalProducts');
        const ongkirElement = document.getElementById('ongkir');
        const totalPaymentElement = document.getElementById('totalPayment');

        if (totalProductsElement && ongkirElement && totalPaymentElement) {
            totalProductsElement.textContent = `Rp ${formatNumber(totalProductPrice)}`;
            ongkirElement.textContent = `Rp ${formatNumber(shippingCost)}`;
            totalPaymentElement.textContent = `Rp ${formatNumber(totalProductPrice + shippingCost)}`;
        }
    }

    function formatNumber(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }

    // Quantity change handler
    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('change', function() {
            const price = parseFloat(this.getAttribute('data-product-price'));
            const quantity = parseInt(this.value) || 0;
            
            if (quantity < 1) {
                this.value = 1;
                return;
            }
            
            const totalPriceElement = this.closest('tr').querySelector('.total-price');
            const totalPrice = price * quantity;
            totalPriceElement.textContent = formatNumber(totalPrice);
        });
    });
});

</script>


    <script>
    // Add event listeners to all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-cart-item').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                if (!confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
                    return;
                }
                
                const cartId = this.getAttribute('data-cart-id');
                const row = this.closest('tr');
                
                fetch(`<?= base_url('keranjang/delete/') ?>/${cartId}`, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the row from the table
                        row.remove();
                        
                        // Show success message
                        alert('Item berhasil dihapus dari keranjang');
                        
                        // If cart is empty, you might want to reload or show a message
                        if (document.querySelectorAll('tbody tr').length <= 1) {
                            location.reload();
                        }
                    } else {
                        alert('Gagal menghapus item: ' + (data.error || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus item');
                });
            });
        });
    });
    </script>


    <!-- Script untuk update quantity dan delete item -->
    <script>
    // Script quantity update yang sudah ada
    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('input', function() {
            const price = parseFloat(this.getAttribute('data-product-price'));
            const quantity = parseInt(this.value);
            const totalPrice = price * quantity;
            this.closest('tr').querySelector('.total-price').textContent = 
                new Intl.NumberFormat('id-ID').format(totalPrice);
        });
    });

    // Script delete yang sudah ada
    document.querySelectorAll('.delete-cart-item').forEach(button => {
        button.addEventListener('click', function(e) {
            // Kode delete yang sudah ada
        });
    });
    </script>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript (jQuery-free) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



    <script src="<?= base_url()?>user/assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url()?>user/assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>user/html/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url()?>user/html/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url()?>user/html/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url()?>user/html/js/custom.js"></script>
</body>

</html>