<?php
include 'inc/header.php';
?>
<?php
$login_check = Session::get('user_login');
if ($login_check) {
    header('Location:index.php');
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $login_User = $ul->login_user($_POST);
}
?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign In</p>
                                <div class="d-flex flex-row align-items-center mb-4">

                                </div>
                                <?php
                                if (isset($login_User)) {
                                    echo $login_User;
                                }
                                ?>
                                <form action="" class="" method="post">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" name="userEmail" class="form-control" />
                                            <label class="form-label" for="form3Example1c">Email</label>

                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" name="userPass" class="form-control" />
                                            <label class="form-label" for="form3Example4c">Password</label>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" name=submit class="btn btn-primary btn-lg">Login</button>
                                        <a href="register.php" class="btn btn-light btn-lg ms-5">Register</a>
                                        <a href="index.php" class="btn btn-danger btn-lg ms-5">Return</a>
                                    </div>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="./assest/image1.png" class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php'; ?>