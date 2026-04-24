<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>System Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
                
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background:url('<?= base_url('assets/img/Admin.jpg') ?>'); background-size: cover;  background-position:center;"></div>
                            <div class="col-lg-6">
                                <div class="text-right mx-3">
                                    <a href="<?= base_url('/admin/login') ?>" class="btn btn-primary btn-user mt-3"><i class="bi bi-arrow-left"></i> Kembali</a>
                                </div>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url('/admin/saveRegister'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="name" name="name" aria-describedby="emailHelp"
                                                placeholder="Masukan Nama..." required>
                                            <?php if (isset(session('errors')['name'])) : ?>
                                                <small class="text-danger"><?= session('errors')['name'] ?></small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputUsername" name="username" aria-describedby="emailHelp"
                                                placeholder="Masukan Username..." required>
                                            <?php if (isset(session('errors')['username'])) : ?>
                                                <small class="text-danger"><?= session('errors')['username'] ?></small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password harus berupa Angka!" required>
                                            <?php if (isset(session('errors')['password'])) : ?>
                                                <small class="text-danger"><?= session('errors')['password'] ?></small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputTelephone" name="telephone" placeholder="Masukkan Nomor Telepon..." required>
                                            <?php if (isset(session('errors')['telephone'])) : ?>
                                                <small class="text-danger"><?= session('errors')['telephone'] ?></small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group d-flex justify-content-around">
                                            <button type="submit" class="btn btn-primary btn-user px-5">Register</button>
                                            <button type="reset" class="btn btn-primary btn-user px-5">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>