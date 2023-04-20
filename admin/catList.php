<?php
    include'../admin/inc/header.php'
?>
<?php
    include'../classes/category.php'
?>
<?php
    $cat = new category();
    if(isset($_GET['delID'])){
        $id = $_GET['delID'];
        $deleteCat = $cat->delete_cat($id);
    }
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white justify-content-center">
            <h1 class="display-4 fw-bolder">CATEGORIES</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<?php
            if(isset($delCat)){
                echo $delCat;
            }
        ?>
<table class="table">
    <tr>
        <th>Category ID</th>
        <th>Catergory Name</th>
        <th>Action</th>
    </tr>
    <?php
            $show_cat =$cat->show_cat();
            if($show_cat){
                $i = 0;
                while($result = $show_cat->fetch_assoc()){
                    $i++;
        ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $result['catName'];  ?></td>
        <td><a href="editCat.php?catID=<?php echo $result['catID'] ?>">Edit</a> | <a
                onclick="return confirm('Are you sure ?')" href="?delID=<?php echo $result['catID'] ?>">Delete</a></td>
    </tr>
    <?php
    }
}
    ?>
</table>
<?php
    include'../admin/inc/footer.php'
?>