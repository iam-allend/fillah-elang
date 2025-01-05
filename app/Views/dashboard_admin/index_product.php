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
                            <a class="nav-link" href="<?= base_url()?>admin/cart-user">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                Keranjang user
                            </a>
                            <div class="sb-sidenav-menu-heading">MASTER DATA</div>
                            <a class="nav-link " href="<?= base_url()?>admin/users">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Users
                            </a>
                            <a class="nav-link active" href="<?= base_url()?>admin/products">
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
                        <h2 class="my-5">Kelola Data Produk</h2>
                        <div class="card my-4 w-100">
                            <div class="card-header w-100 position-relative d-flex justify-content-between">
                                <h6 class="d-flex align-items-center">
                                    <i class="fas fa-box me-1"></i>
                                    Daftar Produk
                                </h6>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                    <i class="fa-solid fa-plus me-2"></i>Tambah Produk
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Gambar</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Gambar</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($products as $product): ?>
                                        <tr>
                                            <td><?= $product['id'] ?></td>
                                            <td>
                                                <?php 
                                                $image = model('ProductImageModel')->where('product_id', $product['id'])->first();
                                                if ($image): 
                                                ?>
                                                <img src="<?= base_url($image['image_url']) ?>" alt="Product" width="50" height="50" class="img-thumbnail">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $product['name'] ?></td>
                                            <td>Rp <?= number_format($product['price'], 0, ',', '.') ?></td>
                                            <td><?= $product['stock'] ?></td>
                                            <td><?= $product['created_at'] ?></td>
                                            <td><?= $product['updated_at'] ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editProductModal" 
                                                        onclick="editProduct(<?= htmlspecialchars(json_encode($product)) ?>)">
                                                    <i class="fas fa-edit me-1"></i> Edit
                                                </button>
                                                <form action="<?= base_url('admin/products/delete/' . $product['id']) ?>" method="post" class="d-inline" 
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash me-1"></i> Hapus
                                                    </button>
                                                </form>
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



<!-- Add Product Modal -->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('products/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok</label>
                                <input type="number" class="form-control" id="stock" name="stock" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="images" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple required>
                        <div id="imagePreview" class="row mt-3"></div>
                    </div>

                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Tambah Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" id="editProductId">
                    
                    <div class="mb-3">
                        <label for="editName" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editPrice" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="editPrice" name="price" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editStock" class="form-label">Stok</label>
                                <input type="number" class="form-control" id="editStock" name="stock" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label>
                        <div id="currentImages" class="row"></div>
                    </div>

                    <div class="mb-3">
                        <label for="editImages" class="form-label">Tambah Gambar Baru</label>
                        <input type="file" class="form-control" id="editImages" name="images[]" multiple accept="image/*">
                        <div id="editImagePreview" class="row mt-3"></div>
                    </div>

                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
// Function untuk preview image sebelum upload
function previewImages(input, previewContainer) {
    previewContainer.innerHTML = '';
    
    if (input.files) {
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const col = document.createElement('div');
                col.className = 'col-md-3 mb-2';
                col.innerHTML = `
                    <img src="${e.target.result}" class="img-thumbnail" alt="Preview">
                `;
                previewContainer.appendChild(col);
            }
            reader.readAsDataURL(file);
        });
    }
}

// Preview untuk form tambah
document.getElementById('images').addEventListener('change', function() {
    previewImages(this, document.getElementById('imagePreview'));
});

// Preview untuk form edit
document.getElementById('editImages').addEventListener('change', function() {
    previewImages(this, document.getElementById('editImagePreview'));
});

// Function untuk mengisi form edit
function editProduct(product) {
    document.getElementById('editProductId').value = product.id;
    document.getElementById('editName').value = product.name;
    document.getElementById('editDescription').value = product.description;
    document.getElementById('editPrice').value = product.price;
    document.getElementById('editStock').value = product.stock;
    
    // Set action URL for form
    document.getElementById('editProductForm').action = `<?= base_url('admin/products/update/') ?>/${product.id}`;
    
    // Load current images
    const currentImagesContainer = document.getElementById('currentImages');
    currentImagesContainer.innerHTML = '';
    
    // Fetch and display current product images
    fetch(`<?= base_url('admin/products/get-images/') ?>/${product.id}`)
        .then(response => response.json())
        .then(images => {
            images.forEach(image => {
                const col = document.createElement('div');
                col.className = 'col-md-3 mb-2';
                col.innerHTML = `
                    <div class="position-relative">
                        <img src="<?= base_url() ?>/${image.image_url}" class="img-thumbnail" alt="Product Image">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0" 
                                onclick="deleteImage(${image.id}, this)">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                currentImagesContainer.appendChild(col);
            });
        });
}

// Function untuk menghapus gambar
function deleteImage(imageId, button) {
    if (confirm('Apakah Anda yakin ingin menghapus gambar ini?')) {
        fetch(`<?= base_url('admin/products/delete-image/') ?>/${imageId}`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                button.closest('.col-md-3').remove();
            } else {
                alert('Gagal menghapus gambar');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus gambar');
        });
    }
}
</script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('') ?>dashboard_admin/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('') ?>dashboard_admin/js/datatables-simple-demo.js"></script>
    </body>
</html>
