<?php include 'inc/header.php' ?>

<?php
	if(!isset($_GET['brandID']) || $_GET['brandID']==NULL){
       echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['brandID']; 
    }
?>

<style>
    .section-content {
        margin-top: -50px;
        /* khoảng cách giữa header và section */

    }

    .fixed-top {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1030;
    }
</style>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white justify-content-center">
            <?php
                $get_brand = $brand->getbrandbyID($id);
                if ($get_brand) {
                    while ($result = $get_brand->fetch_assoc()){
?>
<h1 class="text-center justify-content-center display-4 fw-bolder"><?php echo $result['brandName']?></h1>
<?php
                    }
                }
            ?>
            
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<section class="py-5 mt-5 section-content">
    <div class="container px-4 px-lg-5">
        <div class="gx-4 gx-lg-5">
            <ul class="nav nav-tabs justify-content-center ">
                <li class="nav-item">
                <a class="nav-link text-dark" aria-current="page" href="product.php">ALL PRODUCTS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mt-auto text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">CATEGORIES</a>
                    
                            <ul class="dropdown-menu">
                            <?php
                    $get_cat = $cat->show_category_fontend();
                    if ($get_cat) {
                        while ($result = $get_cat->fetch_assoc()) {
                    ?>
                                <li><a class="dropdown-item" href="probycat.php?catID=<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></a></li>
                        <?php
                        }
                    }
                        ?>
                            </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mt-auto text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">BRANDS</a>
                    <ul class="dropdown-menu">
                    <?php
                    $get_brand = $brand->show_brand_fontend();
                    if ($get_brand) {
                        while ($result = $get_brand->fetch_assoc()) {
                    ?>
                                <li><a class="dropdown-item" href="probybrand.php?brandID=<?php echo $result['brandID'] ?>"><?php echo $result['brandName'] ?></a></li>
                        <?php
                        }
                    }
                        ?>
                    </ul>
                </li>
                
                <li class="nav-item">
                <form action="searchresult.php" method="POST" class="d-flex mb-1 ms-2" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" name="tukhoa" aria-label="Search">
                        <button class="btn btn-success" nane="search_product" type="submit">Search</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="row gx-4 gx-lg-5 mt-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            $get_pro = $brand->get_product_by_brand($id);
            if ($get_pro) {
                while ($result = $get_pro->fetch_assoc()) {
            ?>
                    <div class="col mb-5">
                        <div class="card h-100" style="width: 18rem;">
                            <img src="./admin/uploads/<?php echo $result['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body p-4">
                                <h5 class="card-title text-center fw-bolder"><?php echo $result['proName'] ?></h5>
                                <p class="card-text text-center">Giá tiền: <?php echo $result['proPrice'] ?></p>
                                <p class="card-text text-center">Số lượng: <?php echo $result['proQuantity'] ?></p>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-evenly ">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="detail.php?proID=<?php echo $result['proID'] ?>">Add to cart</a></div>
                                    <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="detail.php?proID=<?php echo $result['proID'] ?>">Detail</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }else{
                echo 'Product Not Avaiable';
            }
            ?>

        </div>
    </div>
</section>

<?php include 'inc/footer.php' ?>