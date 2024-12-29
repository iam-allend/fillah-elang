    <?= $this->extend('login/templates/index'); ?>

    <?= $this->section('content'); ?>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-12 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">

                                    <div class="logo">
                                        <span><img src="<?= base_url('frontend/images/logo-main.png'); ?>" alt=""></span>
                                    </div>

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Masuk</h1>
                                    </div>

                                    <?php if (session()->getFlashdata('error')) : ?>
                                        <div class="alert alert-danger">
                                            <?= session()->getFlashdata('error') ?>
                                        </div>
                                    <?php endif; ?>

                                    <form class="user" action="<?= base_url('login') ?>" method="post">
                                        <?= csrf_field() ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" 
                                                name="username_or_email" placeholder="Username atau Email" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" 
                                                name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-user py-2">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p>Tidak punya akun?
                                            <a class="" href="<?= base_url('register'); ?>">Daftar disini</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>