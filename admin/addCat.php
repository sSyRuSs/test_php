<?php include '../admin/inc/header.php';?>

<?php include '../classes/category.php';?>

<?php 
    $cat = new Category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $catName = $_POST['catName'];

        $insertCat = $cat->insert_cat($catName);
    }
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white justify-content-center">
            <h1 class="display-4 fw-bolder">ADD CATEGORY</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<form action="addCat.php" method="post">
    <div class="row">
        <?php
            if(isset($insertCat)){
                echo $insertCat;
            }
        ?>
        <div class="col-md-6">
            <label for="ProName">Name</label>
            <input class="form-control"
                   type="text"
                   name="catName"
                   placeholder="Name" />
        </div>
    </div>
    
    <button type="submit" class="btn btn-success">Create</button>
    <a href="../admin/index.php" class="btn btn-danger">Cancel</a>
</form>



