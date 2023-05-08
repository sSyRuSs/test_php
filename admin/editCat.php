<?php
    require"../admin/inc/header.php";
?>

<?php
    include"../classes/category.php"
?>

<?php 
    
    if(!isset($_GET['catID']) || $_GET['catID']==NULL ){
        echo "<script>window.location ='catList.php'</script>";
    }else{
        $id = $_GET['catID'];
    }
    $cat = new Category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $catName = $_POST['catName'];

        $editCat = $cat->edit_cat($catName,$id);
    }
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white justify-content-center">
            <h1 class="display-4 fw-bolder">EDIT CATEGORy</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
        <?php
            if(isset($editCat)){
                echo $editCat;
            }
        ?>
        <?php
            $get_cat_name = $cat->getcatbyID($id);
            if($get_cat_name){
                while($result = $get_cat_name->fetch_assoc()){    
        ?>
<form action="" method="post">
    <div class="row">
        <div class="col-md-6">
            <label for="catName">Name</label>
            <input class="form-control" value="<?php echo $result['catName'] ?>" type="text" name="catName"
                placeholder="Name" />
        </div>
    </div>

    <button type="submit" name="submit" value="update" class="btn btn-success" id="save-btn">Save</button>
    <a href="../admin/catList.php" class="btn btn-danger">Cancel</a>
</form>
<?php

}
}
?>

<script>
  document.getElementById("save-btn").addEventListener("click", function() {
    window.location.href = "catList.php";
  });
</script>



