<?php include '../admin/inc/header.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php ob_start();?>

<?php
    $pro = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $insertPro = $pro->insert_pro($_POST,$_FILES);
        
    }
?>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white justify-content-center">
            <h1 class="display-4 fw-bolder">ADD PRODUCT</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<?php
        if(isset($insertPro)){
            echo $insertPro;
        }
    ?>
<form action="addPro.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <label>Product Name</label>
            <input class="form-control" type="text" name="proName" placeholder="Name" />
        </div>

        <div class="col-md-6">
            <label>Product Price</label>
            <input class="form-control" type="number" name="proPrice" placeholder="Price" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label>Product Image</label>
            <input class="form-control" type="file" name="image" placeholder="Put file in here" />
        </div>

        <div class="col-md-6">
            <label>Product Quantity</label>
            <input class="form-control" type="number" name="proQuantity" placeholder="Name" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label>Category</label>
            <select class="form-control" name="Category" id="select">
                <?php
                    $cat = new Category;
                    $catlist = $cat->show_cat();
                    if($catlist){
                        while($result = $catlist->fetch_assoc()){
                        ?>
                <option value="<?php echo $result['catID']?>"><?php echo $result['catName']?></option>
                <?php
                    }
                    }
                ?>
            </select>
        </div>

        <div class="col-md-6">
            <label>Brand</label>
            <select class="form-control" name="Brand" id="select">
            <?php
                    $brand = new Brand;
                    $brandlist = $brand->show_brand();
                    if($brandlist){
                        while($result = $brandlist->fetch_assoc()){
                        ?>
                <option value="<?php echo $result['brandID']?>"><?php echo $result['brandName']?></option>
                <?php
                    }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Description</label>
            <textarea class="form-control" type="text" name="proDes" placeholder="Name"></textarea>
        </div>

        <div class="col-md-6">
            <button type="submit" name ="submit" class="btn btn-success mx-auto mt-4">Save</button>
            <a href="../admin/index.php" class="btn btn-danger mt-4">Cancel</a>
        </div>
    </div>

</form>



