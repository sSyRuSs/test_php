<?php include 'inc/header.php' ?>

<?php

if (!isset($_GET['proID']) || $_GET['proID'] == NULL) {
    echo "<script>window.location ='404.php'</script>";
} else {
    $id = $_GET['proID'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $quantity = $_POST['proQuantity'];
    $insertCart = $ct->add_to_cart($quantity, $id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit1'])) {

    $quantity = $_POST['proQuantity'];
    $insertCart = $ct->add_to_cart_1($quantity, $id);
}
?>


<section class="py-5">
    <?php
    $get_product_details = $product->get_details($id);
    if ($get_product_details) {
        while ($result = $get_product_details->fetch_assoc()) {
    ?>
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="./admin/uploads/<?php echo $result['image'] ?>" /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $result['proName'] ?></h1>
                        <div class="fs-5">
                            <span>Price: <?php echo $fm->format_currency($result['proPrice']) . " " . "VNĐ" ?></span>
                        </div>
                        <p class="lead">Hãng: <?php echo $result['brandName'] ?></p>
                        <p class="lead">Loại: <?php echo $result['catName'] ?></p>
                        <p class="lead">Số lượng: <?php echo $result['proQuantity'] ?></p>
                        <p class="lead">Thông tin: <?php echo $result['proDes'] ?></p>
                        <?php
                            if (isset($insertCart)) {
                                echo $insertCart;
                            }
                            ?>
                        <div class="d-flex">
                            <form action="" method="POST">
                                <input class="btn btn-outline-success flex-shrink-0 me-3" id="inputQuantity" type="number" name="proQuantity" value="1" min="1" style="max-width: 4rem" />
                                <button class="btn btn-outline-dark flex-shrink-0 me-3" type="button">
                                    <input type="submit" value="Buy now" name="submit" class="btn btn-sm" />
                                </button>
                                <button class="btn btn-outline-primary flex-shrink-0" type="button">
                                <input type="submit" value="Add to cart" name="submit1" class="btn btn-sm" />
                                </button>
                            </form>
                            
                        </div>
                        <a href="./product.php">Trở về trang chủ</a>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>

</section>

<?php include 'inc/footer.php' ?>