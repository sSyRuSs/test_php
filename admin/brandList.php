<?php
    include'../admin/inc/header.php'
?>
<?php
    include'../classes/brand.php'
?>
<?php
    $brand = new brand();
    if(isset($_GET['delID'])){
        $id = $_GET['delID'];
        $deletebrand = $brand->delete_brand($id);
    }
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white justify-content-center">
            <h1 class="display-4 fw-bolder">BRANDS</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<?php
            if(isset($delBrand)){
                echo $delBrand;
            }
        ?>
<table class="table">
    <tr>
        <th>Brand ID</th>
        <th>Brand Name</th>
        <th>Action</th>
    </tr>
    <?php
            $show_brand =$brand->show_brand();
            if($show_brand){
                $i = 0;
                while($result = $show_brand->fetch_assoc()){
                    $i++;
        ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $result['brandName'];  ?></td>
        <td><a href="editBrand.php?brandID=<?php echo $result['brandID'] ?>">Edit</a> | <a
                onclick="return confirm('Are you sure ?')" href="?delID=<?php echo $result['brandID'] ?>">Delete</a></td>
    </tr>
    <?php
    }
}
    ?>
</table>
<?php
    include'../admin/inc/footer.php'
?>