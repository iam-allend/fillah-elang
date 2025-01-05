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
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>

                                    <?php if (session()->has('errors')) : ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php foreach (session('errors') as $error) : ?>
                                                    <li><?= esc($error) ?></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>

                                    <form class="user" action="<?= base_url('register') ?>" method="post">
                                        <?= csrf_field() ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" 
                                                name="username" placeholder="Username" 
                                                value="<?= old('username') ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" 
                                                name="email" placeholder="Email" 
                                                value="<?= old('email') ?>">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" name="password" 
                                                    class="form-control form-control-user" 
                                                    placeholder="Password">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="pass_confirm" 
                                                    class="form-control form-control-user" 
                                                    placeholder="Ulangi password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" 
                                                name="phone_number" placeholder="Nomor telpon">
                                        </div>
                                        <button type="submit" class="btn btn-user py-2">Register</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                            Sudah punya akun?
                                            <a class="" href="<?= base_url('login'); ?>">Login disini</a>
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