<?php
    include"../admin/inc/header.php";
?>

<?php
    include"../classes/brand.php"
?>

<?php 
    $brand = new Brand();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandName = $_POST['brandName'];

        $insertBrand = $brand->insert_brand($brandName);
    }
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white justify-content-center">
            <h1 class="display-4 fw-bolder">ADD BRAND</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<form action="addBrand.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <?php
            if(isset($insertBrand)){
                echo $insertBrand;
            }
        ?>
        <div class="col-md-6">
            <label for="BrandName">Name</label>
            <input class="form-control"
                   type="text"
                   name="brandName"
                   placeholder="Name" />
        </div>
    </div>
    
    <button type="submit" class="btn btn-success">Create</button>
    <a href="../admin/index.php" class="btn btn-danger">Cancel</a>
</form>



