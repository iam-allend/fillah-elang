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
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
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
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?= site_url('logout') ?>">Logout</a></li>
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
                            <span class=""><?= session()->get('username'); ?></span>
                            <span class="small">Admin</span>
                        </div>
                    </div>

                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <div class="sb-sidenav-menu-heading">ACTIVITY</div>
                            <a class="nav-link active" href="<?= base_url()?>admin/transactions">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-transfer"></i></div>
                                Transaction
                            </a>
                            <div class="sb-sidenav-menu-heading">MASTER DATA</div>
                            <a class="nav-link " href="<?= base_url()?>admin/users">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="<?= base_url()?>admin/products">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                                Product
                            </a>
                            
                        </div>
                    </div>
                    
                </nav>
            </div>

            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4">
                        <!-- Flash Messages -->
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <?= session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <h1 class="mt-4">Transactions Manage</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Transaction Data
                                <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addTransactionModal">Add Transaction</button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Order Date</th>
                                            <th>Alamat</th>
                                            <th>Admin Review</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Order Date</th>
                                            <th>Alamat</th>
                                            <th>Admin Review</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($transactions as $transaction): ?>
                                        <tr>
                                            <td><?= $transaction['id']; ?></td>
                                            <td><?= $transaction['username']; ?></td>
                                            <td><?= $transaction['email']; ?></td>
                                            <td><?= $transaction['name']; ?></td>
                                            <td><?= $transaction['quantity']; ?></td>
                                            <td><?= $transaction['total_price']; ?></td>
                                            <td><?= $transaction['status']; ?></td>
                                            <td><?= $transaction['order_date']; ?></td>
                                            <td><?= $transaction['province']; ?>, <?= $transaction['city']; ?>, <?= $transaction['alamat_kirim']; ?></td>
                                            <td><?= $transaction['admin_review'] ? 'Reviewed' : 'Pending'; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTransactionModal" 
                                                    data-id="<?= $transaction['id'] ?>" 
                                                    data-user-id="<?= $transaction['user_id'] ?>" 
                                                    data-product-id="<?= $transaction['product_id'] ?>" 
                                                    data-quantity="<?= $transaction['quantity'] ?>" 
                                                    data-total-price="<?= $transaction['total_price'] ?>" 
                                                    data-status="<?= $transaction['status'] ?>" 
                                                    data-order-date="<?= $transaction['order_date'] ?>" 
                                                    data-province="<?= $transaction['province'] ?>" 
                                                    data-city="<?= $transaction['city'] ?>" 
                                                    data-alamat-kirim="<?= $transaction['alamat_kirim'] ?>" 
                                                    data-whatsapp-link="<?= $transaction['whatsapp_link'] ?>">
                                                    Edit
                                                </button>
                                                <a href="transactions/delete/<?= $transaction['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Delete</a>
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



<!-- Add Transaction Modal -->
<div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin/transactions/store') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTransactionLabel">Add Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select class="form-select" id="user_id" name="F_user_id" required>
                            <option value="">Select User</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="addProductId" class="form-label">Product</label>
                        <select class="form-select" id="addProductId" name="F_product_id" required>
                            <?php foreach ($products as $product): ?>
                                <option value="<?= $product['id'] ?>" data-price="<?= $product['price'] ?>"><?= $product['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="addQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="addQuantity" name="F_quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="addTotalPrice" class="form-label">Total Price</label>
                        <input type="text" class="form-control" id="addTotalPrice" name="F_total_price" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select class="form-select" id="editStatus" name="F_status">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="order_date" class="form-label">Order Date</label>
                        <input type="datetime-local" class="form-control" id="order_date" name="F_order_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp_link" class="form-label">WhatsApp Link</label>
                        <input type="text" class="form-control" id="whatsapp_link" name="F_whatsapp_link" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Transaction</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Transaction Modal -->
<div class="modal fade" id="editTransactionModal" tabindex="-1" aria-labelledby="editTransactionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin/transactions/update/0') ?>" method="POST" id="editTransactionForm">
                <input type="hidden" name="id" id="editTransactionId">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Transaction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editUserId" class="form-label">User</label>
                        <select class="form-select" id="editUserId" name="F_user_id" >
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editProductId" class="form-label">Product</label>
                        <select class="form-select" id="editProductId" name="F_product_id" >
                            <?php foreach ($products as $product): ?>
                                <option value="<?= $product['id'] ?>" data-price="<?= $product['price'] ?>"><?= $product['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="editQuantity" name="F_quantity" >
                    </div>
                    <div class="mb-3">
                        <label for="editTotalPrice" class="form-label">Total Price</label>
                        <input type="text" class="form-control" id="editTotalPrice" name="F_total_price"  readonly>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="editStatus" class="form-label">Status</label>
                                <input type="text" class="form-control" id="currentStatus" disabled>
                            </div>
                            <div class="col">
                                <label for="editStatus" class="form-label">Update Status</label>
                                <select class="form-select" id="editStatus" name="F_status" >
                                    <option >Pending</option>
                                    <option >Shipping</option>
                                    <option >Completed</option>
                                    <option >Cancelled</option>
                                </select>
                            </div>
                        </div>

                        <div class="my-3">

                            <div class="row">

                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <label for="editProvince" class="form-label">Provinsi</label>
                                            <input type="text" class="form-control" name="F_provinsi" id="editProvince" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="editCity" class="form-label">Kota</label>
                                            <input type="text" class="form-control" name="F_kota" id="editCity" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="col">
                                        <label for="editAlamatKirim" class="form-label">Alamat</label>
                                        <textarea type="text" class="form-control" style="height: 110px;" name="F_alamat_kirim" id="editAlamatKirim" ></textarea>
                                    </div>
                                </div>
                            </div>
                        
                        
                    </div>


                    <div class="mb-3">
                        <label for="editOrderDate" class="form-label">Order Date</label>
                        <input type="datetime" class="form-control" id="editOrderDate" name="F_order_date" >
                    </div>
                    <div class="mb-3">
                        <label for="editWhatsappLink" class="form-label">WhatsApp Link</label>
                        <input type="text" class="form-control" id="editWhatsappLink" name="F_whatsapp_link" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const editTransactionModal = document.getElementById('editTransactionModal');
    editTransactionModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget; // Tombol yang memicu modal
        const status = button.getAttribute('data-status'); // Ambil status dari data attribute
        
        // Set status ke dropdown
        const editStatusSelect = document.getElementById('editStatus');
        editStatusSelect.value = status; // Set nilai dropdown sesuai dengan status dari database
    });

    // Fungsi untuk menghitung total harga
    function calculateTotalPrice(productSelect, quantityInput, totalPriceInput) {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const pricePerUnit = parseFloat(selectedOption.getAttribute('data-price')) || 0;
        const quantity = parseInt(quantityInput.value) || 0;

        const totalPrice = pricePerUnit * quantity;
        totalPriceInput.value = totalPrice.toFixed(2); // Format dua desimal
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Event listener untuk modal tambah
        const addProductSelect = document.getElementById('addProductId');
        const addQuantityInput = document.getElementById('addQuantity');
        const addTotalPriceInput = document.getElementById('addTotalPrice');

        addProductSelect.addEventListener('change', function() {
            calculateTotalPrice(addProductSelect, addQuantityInput, addTotalPriceInput);
        });

        addQuantityInput.addEventListener('input', function() {
            calculateTotalPrice(addProductSelect, addQuantityInput, addTotalPriceInput);
        });

        // Event listener untuk modal edit
        const editProductSelect = document.getElementById('editProductId');
        const editQuantityInput = document.getElementById('editQuantity');
        const editTotalPriceInput = document.getElementById('editTotalPrice');

        editProductSelect.addEventListener('change', function() {
            calculateTotalPrice(editProductSelect, editQuantityInput, editTotalPriceInput);
        });

        editQuantityInput.addEventListener('input', function() {
            calculateTotalPrice(editProductSelect, editQuantityInput, editTotalPriceInput);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editTransactionModal = document.getElementById('editTransactionModal');
        editTransactionModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget; // tombol yang memicu modal
            const transactionId = button.getAttribute('data-id');
            const userId = button.getAttribute('data-user-id');
            const productId = button.getAttribute('data-product-id');
            const quantity = button.getAttribute('data-quantity');
            const totalPrice = button.getAttribute('data-total-price');
            const status = button.getAttribute('data-status');
            const orderDate = button.getAttribute('data-order-date');
            const province = button.getAttribute('data-province');
            const city = button.getAttribute('data-city');
            const alamatKirim = button.getAttribute('data-alamat-kirim');
            const whatsappLink = button.getAttribute('data-whatsapp-link');

            // Mengisi input modal
            editTransactionModal.querySelector('#editTransactionId').value = transactionId;
            editTransactionModal.querySelector('#editUserId').value = userId;
            editTransactionModal.querySelector('#editProductId').value = productId;
            editTransactionModal.querySelector('#editQuantity').value = quantity;
            editTransactionModal.querySelector('#editTotalPrice').value = totalPrice;
            editTransactionModal.querySelector('#currentStatus').value = status; // Set current status
            editTransactionModal.querySelector('#editStatus').value = status; // Set default value for new status
            editTransactionModal.querySelector('#editOrderDate').value = orderDate;
            editTransactionModal.querySelector('#editProvince').value = province;
            editTransactionModal.querySelector('#editCity').value = city;
            editTransactionModal.querySelector('#editAlamatKirim').value = alamatKirim;
            editTransactionModal.querySelector('#editWhatsappLink').value = whatsappLink;

            // Mengupdate action form dengan ID transaksi
            const form = editTransactionModal.querySelector('#editTransactionForm');
            form.action = `<?= base_url('admin/transactions/update') ?>/${transactionId}`;
        });
    });
</script>


<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize DataTable
            let table = new simpleDatatables.DataTable("#datatablesSimple");

            // Refresh table after modal operations
            ['addTransactionModal', 'editTransactionModal'].forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.addEventListener('hidden.bs.modal', function () {
                        // Reload the page after modal is hidden
                        window.location.reload();
                    });
                }
            });

            // Auto dismiss alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/dashboard_admin/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="/dashboard_admin/js/datatables-simple-demo.js"></script>
    </body>
</html>
