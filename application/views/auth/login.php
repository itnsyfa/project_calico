<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calico PetCare - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="margin-top: 120px;">

            <div class="col-xl-6 col-lg-6 col-md-9">

                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12" style="background-color: #FFFF82; border-radius: 70px;">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url('assets/img/logo.png'); ?>" style="width:150px; background-color: transparent; border: none;" class="img-thumbnail">
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth/cek_login'); ?>">
                                    <div class="form-group" style="border-radius: 20px; border: 4px solid #01A7A4;" >
                                        <input type="text" class="form-control" name="username" id="username"  style="border-radius: 20px;"  aria-describedby="username" placeholder="Username">
                                    </div>
                                    <div class="form-group" style="border-radius: 20px; border: 4px solid #01A7A4;">
                                        <input type="password" class="form-control" name="password" id="password" style="border-radius: 20px;" placeholder="Password">
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div> -->
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    <hr>
                                    <!-- <a href="<?= base_url('auth/cek_login'); ?>" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="<?= base_url('auth/cek_login'); ?>" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a> -->
                                </form>


                                <!-- <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>