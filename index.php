<?php include "./classes/product.php" ?>

<?php
include 'inc/header.php';
?>
<?php
// if (!isset($_GET['proID']) || $_GET['proID'] == NULL) {
//     echo "<script>window.location ='404.php'</script>";
// } else {
//     $id = $_GET['proID'];
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit1'])) {

    $quantity = $_POST['proQuantity'];
    $insertCart = $ct->add_to_cart_1($quantity, $id);
}
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white justify-content-center">
            <h1 class="display-4 fw-bolder">WELCOME TO MY SHOP</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>

<section class="py-5 mt-5 section-content">
    <div class="container px-4 px-lg-5">
        <div class="gx-4 gx-lg-5">
            <ul class="nav justify-content-center ">
                <h1 class="nav-link fw-bolder text-dark">NEW PRODUCTS</h1>
            </ul>
        </div>
        <div class="row gx-4 gx-lg-5 mt-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            $get_pro = $product->getproduct_new();
            if ($get_pro) {
                while ($result = $get_pro->fetch_assoc()) {
            ?>
                    <div class="col mb-5">
                        <div class="card h-100" style="width: 18rem;">
                            <img src="./admin/uploads/<?php echo $result['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body p-4">
                                <h5 class="card-title text-center fw-bolder"><?php echo $result['proName'] ?></h5>
                                <p class="card-text text-center">Giá tiền: <?php echo $result['proPrice'] ?>.VND</p>
                                <p class="card-text text-center">Số lượng: <?php echo $result['proQuantity']?></p>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-evenly ">                                     <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="detail.php?proID=<?php echo $result['proID'] ?>">Detail</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>


<?php
include '../BTL/inc/footer.php';
?>