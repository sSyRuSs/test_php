<?php include '../admin/inc/header.php';?>

<?php include '../classes/category.php';?>

<?php 
    $cat = new Category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $catName = $_POST['catName'];

        $insertCat = $cat->insert_cat($catName);
    }
?>
<h2 class="mt-5 mx-auto">ADD CATEGORY</h2>
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



