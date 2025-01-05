

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

<style>
    tr td{
        max-width: 150px !important; 
        white-space: nowrap !important; 
        overflow: hidden !important; 
        text-overflow: ellipsis !important;
    }
    button.btn.text-white.m-auto{
        justify-content: center !important;
        align-content: center !important;
        align-items: center !important;
        align-self: center !important;
        display: flex !important;
        position: relative !important;
    }
</style>
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
                            <a class="nav-link active" href="<?= base_url()?>admin/users">
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
                    
                    <div class="container-fluid px-4">
                    <h2 class="my-5">Kelola Data user</h2>
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-primary">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    <div class="card my-4 ">
                            <div class="card-header w-100 position-relative d-flex justify-content-between">
                                <h6 class="d-flex align-items-center">
                                    <i class="fas fa-table me-1"></i>
                                    DataTable Example
                                </h6>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <i class="fa-solid fa-plus me-2"></i>Tambah User</button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th> 
                                            <th>Role</th>                                           
                                            <th>Created at</th>
                                            <th>Update at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['phone_number'] ?></td>
                                            <td><?= $user['address'] ?></td>
                                            <td>
                                                <?php 
                                                    if ($user['level_user_id'] == 1) {
                                                        $text = 'Admin ';
                                                        $btnClass = 'btn-success';
                                                    } elseif ($user['level_user_id'] == 2) {
                                                        $text = 'User';
                                                        $btnClass = 'btn-secondary';
                                                    } elseif ($user['level_user_id'] == 3) {
                                                        $text = 'Super';
                                                        $btnClass = 'btn-danger';
                                                    } else {
                                                        $text = 'Unknown'; // Jika level tidak dikenali
                                                        $btnClass = 'btn-secondary'; // Kelas default
                                                    }
                                                ?>
                                                <button class="btn text-white m-auto <?= $btnClass ?> btn-sm"><?= $text ?></button>
                                            </td>

                                            <td><?= $user['created_at'] ?></td>
                                            <td><?= $user['updated_at'] ?></td>
                                            <td>
                                                <?php if ($user['level_user_id'] != 3): // Jika bukan superadmin ?>
                                                    <button class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editUserModal" onclick="
                                                    editUser  (
                                                        <?= $user['id'] ?>, 
                                                        '<?= $user['first_name'] ?>',
                                                        '<?= $user['last_name'] ?>',    
                                                        '<?= $user['username'] ?>', 
                                                        '<?= $user['email'] ?>', 
                                                        '<?= $user['password'] ?>', 
                                                        '<?= $user['phone_number'] ?>', 
                                                        '<?= $user['address'] ?>',
                                                        '<?= $user['level_user_id'] ?>',
                                                        '<?= base_url($user['img_user']) ?>'
                                                        )"
                                                    >
                                                    <i class="fas fa-edit me-1"></i> Edit</button>

                                                    <a class="btn btn-danger btn-sm" href="<?= base_url('admin/users/delete/' . $user['id']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data ini??')">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>
                </main>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>



    <!-- ADD MODAL -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/users/add'); ?>" method="POST">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="firstname" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control" id="firstname" name="F_Firstname" required>
                                </div>
                                <div class="col">
                                    <label for="lastname" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control" id="lastname" name="F_Lastname" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="F_username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="F_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="F_password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="F_role" required>
                                <?php if (session()->get('level_user_id') == 3): // Jika superadmin ?>
                                    <?php foreach ($levels as $level): ?>
                                        <option value="<?= $level['levelid'] ?>"><?= $level['levelnama'] ?></option>
                                    <?php endforeach; ?>
                                <?php else: // Jika admin ?>
                                    <option value="2">User </option> <!-- Hanya bisa menambah user -->
                                <?php endif; ?>
                            </select>
                        </div>
                        

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="F_phone_number" placeholder="628 xxx xxxx xxx" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="textarea" class="form-control" id="address" name="F_address" placeholder="City, sub-district, sub-district/village, rt/rw, street name">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- EDIT MODAL -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"  id="editUserModal" tabindex="-1">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <form method="post" action="<?= base_url('admin/users/update') ?>" enctype="multipart/form-data">
                    <div class="modal-header"><h5>Edit Data User</h5></div>
                    <input type="hidden" name="id" id="editUserId">
                    <div class="modal-body">
                        <!-- Pratinjau Gambar -->
                        <div class="mb-3">
                            <label for="previewImage" class="form-label d-block">Foto Profil sebelumnya</label>
                            <img class="rounded-2 p-1 form-control" id="previewImage" src="<?= base_url($user['img_user'] ?? 'img/default.svg') ?>" alt="Profile Image" style="width: 100px;">
                        </div>
                        <!-- Input Upload Gambar -->
                        <div class="mb-3">
                            <label for="imgUser" class="form-label">Unggah Foto Profile</label>
                            <input type="file" class="form-control" id="imgUser" name="img_user" onchange="previewImage(this);">
                        </div>
                        <!-- Field Lainnya -->
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="editFirstName" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control" id="editFirstName" name="F_firstname">
                                </div>
                                <div class="col">
                                    <label for="editLastName" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control" id="editLastName" name="F_lastname">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="editUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="editUsername" name="F_username">
                                </div>
                                <div class="col">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editEmail" name="F_email">
                                </div>
                            </div>
                            
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="editPassword" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="editPassword" name="F_Password" >
                                </div>
                                <div class="col">
                                    <label for="editPhone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="editPhone" name="F_phone_number" >
                                </div>
                            </div>
                            
                        </div>
                        <div class="mb-3">
                            <label for="editAddress" class="form-label">Alamat</label>
                            <textarea type="textarea" class="form-control" id="editAddress" name="F_address"></textarea>
                        </div>

                        <?php if (session()->get('level_user_id') == 3): // Jika superadmin ?>
                        <div class="mb-3">
                            <label for="editRole" class="form-label">Role</label>
                            <select class="form-select" id="editRole" name="F_role">
                                <option value="<?= $level['levelid'] ?>">Pilih Role</option>
                                <?php foreach ($levels as $level): ?>
                                    <option value="<?= $level['levelid'] ?>"><?= $level['levelnama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php endif; ?>

                        <input type="datetime-local" class="" id="editupdate_at" name="F_update_at" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
    function previewImage(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
    </script>
    <script>
    // Modifikasi fungsi editUser agar juga mengatur src dari imgPreview
    function editUser(id, first_name, last_name, username, email, password, phone_number, address, level_user_id, img_user) {
        document.getElementById('editUserId').value = id;
        document.getElementById('editFirstName').value = first_name;
        document.getElementById('editLastName').value = last_name;
        document.getElementById('editUsername').value = username;
        document.getElementById('editEmail').value = email;
        document.getElementById('editPassword').value = password;
        document.getElementById('editPhone').value = phone_number;
        document.getElementById('editAddress').value = address;
        document.getElementById('editRole').value = level_user_id;
        document.getElementById('previewImage').src = img_user;
    }
    </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('') ?>dashboard_admin/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('') ?>dashboard_admin/js/datatables-simple-demo.js"></script>
    </body>
</html>
