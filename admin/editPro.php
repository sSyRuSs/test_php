
<?php
    
    include "../admin/inc/header.php";
?>
<?php
    include_once "../classes/product.php";
?>
<?php 
    include_once "../classes/brand.php";
?>
<?php
    include_once "../classes/category.php";
?>
<?php 
    $pro = new Product();
    if(!isset($_GET['proID']) || $_GET['proID']==NULL){
        echo "<script>window.location='proList.php'</script>";
    }else{
        $id = $_GET['proID'];
    }if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $editPro = $pro->edit_pro($_POST,$_FILES,$id);
    }
?>

<?php
    
?>
<h2 class="mt-5 mx-auto">EDIT PRODUCT</h2>
<?php
        if(isset($editPro)){
            echo $editPro;
        }
    ?>
    <?php
        $get_pro_by_id = $pro->getprobyID($id);
        if($get_pro_by_id){
            while($result_pro = $get_pro_by_id->fetch_assoc()){
    ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <label for="proName">Product Name</label>
            <input class="form-control" type="text" name="proName" value="<?php echo$result_pro['proName'] ?>"/>
        </div>

        <div class="col-md-6">
            <label for="ProName">Product Price</label>
            <input class="form-control" type="number" name="proPrice" value="<?php echo $result_pro['proPrice']?>"/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="ProName">Product Image</label>
            <input class="form-control" type="file" name="image" value="<?php echo $result_pro['image']?>"/>

        </div>

        <div class="col-md-6">
            <label for="ProName">Product Quantity</label>
            <input class="form-control" type="number" name="proQuantity" value="<?php echo $result_pro['proQuantity']?>"/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="catName">Category</label>
            <select class="form-control" name="category" id="select">
                <?php
                    $cat = new Category;
                    $catlist = $cat->show_cat();
                    if($catlist){
                        while($result_pro = $catlist->fetch_assoc()){
                        ?>
                <option <?php 
                    if($result_pro['catID']==$result_pro['catID']){echo 'selected';}
                ?>value="<?php echo $result_pro['catID']?>"><?php echo $result_pro['catName']?></option>
                <?php
                    }
                    }
                ?>
            </select>
        </div>

        <div class="col-md-6">
            <label for="BrandName">Brand</label>
            <select class="form-control" name="brand" id="select">
            <?php
                    $brand = new Brand;
                    $brandlist = $brand->show_brand();
                    if($brandlist){
                        while($result_pro = $brandlist->fetch_assoc()){
                        ?>
                <option <?php 
                    if($result_pro['brandID']==$result_pro['brandID']){echo 'selected';}
                ?> value="<?php echo $result_pro['brandID']?>"><?php echo $result_pro['brandName']?></option>
                <?php
                    }
                    }
                ?>
            </select>
        </div>
    </div>

    <div class="row">
    <div class="col-md-6">
            <label for="ProDes">Description</label>
            <input class="form-control" type="text" name="proDes" value="<?php echo$result_pro['proDes'] ?>"/>
        </div>
        <div class="col-md-6">
            <button type="submit" name="submit" class="btn btn-success mx-auto mt-4">Save</button>
            <a href="../admin/index.php" class="btn btn-danger mt-4">Cancel</a>
        </div>
    </div>

</form>
<?php
            }
        }
?>



