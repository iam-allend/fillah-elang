<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Panel</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url('frontend/images/logo-circle-bgwhite.png') ?>">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?= base_url()?>dashboard_admin/css/styles.css" rel="stylesheet" />
        <link href="<?= base_url()?>dashboard_admin/css/custom-styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-white">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">DASHBOARD</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">

            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

                    <div class="sb-sidenav-footer d-flex align-content-center">
                        <img class="img-pp-dashboard m-1" src="<?= base_url('' . session()->get('img_user')); ?>" alt="">
                        <div class="name-admin m-1">
                            <span class="d-block "><?= session()->get('username'); ?></span>
                            <span class="d-block small">
                                    <?php 
                                        $levelUserId = session()->get('level_user_id');
                                        if ($levelUserId == 1) {
                                            echo 'Admin';
                                        } elseif ($levelUserId == 2) {
                                            echo 'User ';
                                        } elseif ($levelUserId == 3) {
                                            echo 'Superadmin';
                                        } else {
                                            echo 'Unknown'; // Jika level tidak dikenali
                                        }
                                    ?>
                                </span>
                        </div>
                    </div>

                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">ACTIVITY</div>
                            <a class="nav-link" href="<?= base_url()?>admin/transactions">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-transfer"></i></div>
                                Transaksi
                            </a>
                            <a class="nav-link active" href="<?= base_url()?>admin/cart-user">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                Keranjang user
                            </a>
                            <div class="sb-sidenav-menu-heading">MASTER DATA</div>
                            <a class="nav-link " href="<?= base_url()?>admin/users">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="<?= base_url()?>admin/products">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                                Produk
                            </a>
                            
                        </div>
                    </div>
                    
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 w-100">
                        <h2 class="my-5">Kelola Data Keranjang User</h2>
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-primary">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>
                        <div class="card my-4 w-100">
                            <div class="card-header w-100 position-relative d-flex justify-content-between">
                                <h6 class="d-flex align-items-center">
                                    <i class="fas fa-box me-1"></i>
                                    Data Produk Keranjang User
                                </h6>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addCartModal">
                                    <i class="fa-solid fa-plus"></i>    
                                    Tambah Produk
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID - User</th>
                                            <th>Gambar</th>
                                            <th>ID - Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID - User</th>
                                            <th>Gambar</th>
                                            <th>ID - Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($carts as $cart): ?>
                                        <tr>
                                            <td><?= $cart['id'] ?> - <?= $cart['username'] ?></td>
                                            <td><img src="<?= base_url($cart['image_url']) ?>" alt="Product Image" width="50"></td>
                                            <td><?= $cart['product_id'] ?> - <?= $cart['name'] ?></td>
                                            <td><?= $cart['quantity'] ?></td>
                                            <td><?= $cart['created_at'] ?></td>
                                            <td><?= $cart['updated_at'] ?></td>
                                            <td>
                                                <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#editCartModal"
                                                        onclick="setEditData(<?= $cart['id'] ?>, <?= $cart['user_id'] ?>, <?= $cart['product_id'] ?>, <?= $cart['quantity'] ?>)"><i class="fas fa-edit me-1"></i>Edit</button>
                                                
                                                <a class="btn btn-danger" href="<?= base_url('admin/carts/delete/' . $cart['id']) ?>" onclick="return confirm('Yakin ingin menghapus data cart ini?')"><i class="fas fa-trash me-1"></i>Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </main>
            </div>
        </div>



<!-- Modal Add Cart -->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  id="addCartModal" tabindex="-1" aria-labelledby="addCartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCartModalLabel">Tambah Keranjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/carts/add') ?>" method="POST">
                    <div class="mb-3">
                        <label for="userSelectAdd" class="form-label">Pilih User</label>
                        <select class="form-select" id="userSelectAdd" name="user_id" required>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['id'] ?>"><?= $user['id'] ?> - <?= $user['username'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productSelectAdd" class="form-label">Pilih Produk</label>
                        <select class="form-select" id="productSelectAdd" name="product_id" required>
                            <?php foreach ($products as $product): ?>
                                <option value="<?= $product['id'] ?>"><?= $product['id'] ?> - <?= $product['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantityAdd" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantityAdd" name="quantity" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Tambahkan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Cart -->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  id="editCartModal" tabindex="-1" aria-labelledby="editCartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCartModalLabel">Edit Data Keranjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/carts/update') ?>" method="POST">
                    <input type="hidden" id="cartId" name="cartId">
                    <div class="mb-3">
                        <label for="userSelect" class="form-label">ID - Username </label>
                        <select class="form-select" id="userSelect" name="user_id" required>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['id'] ?>"><?= $user['id'] ?> - <?= $user['username'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productSelect" class="form-label">ID - Produk</label>
                        <select class="form-select" id="productSelect" name="product_id" required>
                            <?php foreach ($products as $product): ?>
                                <option value="<?= $product['id'] ?>"><?= $product['id'] ?> - <?= $product['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function setEditData(cartId, userId, productId, quantity) {
        document.getElementById('cartId').value = cartId;
        document.getElementById('userSelect').value = userId;
        document.getElementById('productSelect').value = productId;
        document.getElementById('quantity').value = quantity;
    }
</script>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('') ?>dashboard_admin/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('') ?>dashboard_admin/js/datatables-simple-demo.js"></script>
    </body>
</html>
