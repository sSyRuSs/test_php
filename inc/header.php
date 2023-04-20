<?php
ob_start();
?>
<?php
include_once 'lib/session.php';
Session::init();
?>

<?php
include_once 'lib/database.php';
include_once 'helper/format.php';

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});


$db = new Database();
$fm = new Format();
$ct = new Cart();
$brand = new Brand();
$cat = new Category();
$ul = new Userlogin();
$product = new Product();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assest/style/style.css">
    <script src="./assest/script/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="#">CỬA HÀNG ĐỒ CHƠI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header bg-dark">
                    <a class="navbar-brand " href="#">CỬA HÀNG ĐỒ CHƠI</a>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body bg-dark">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./product.php"><i class="fa-solid fa-box-archive"></i> Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-plus fa-spin fa-spin-reverse"></i>
                                More
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">About Us</a></li>
                                <li><a class="dropdown-item" href="#">Policy Licenses and Terms</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <?php
                        if (isset($_GET['user_id'])) {
                            $customer_id = $_GET['user_id'];
                            $delCart = $ct->del_all_data_cart();
                            Session::destroy();
                        }
                        ?>
                        <li class="nav-item d-flex text-center">
                            <?php
                            $login = Session::get('user_login');
                            if ($login == false) {
                                echo '<a class="nav-link active" aria-current="page" href="login.php"><i class="fa-solid fa-user"></i> Sign In</a> <span style="margin: 5px 10px;">/</span> <a class="nav-link active" aria-current="page" href="register.php">Sign Up</a>';
                            } else {
                                echo '<a class="nav-link active" aria-current="page" href="?user_id=' . Session::get('user_id') . '">Logout</a></div>';
                            }
                            ?>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin/index.php"><i class="fa-solid fa-users"></i> Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>