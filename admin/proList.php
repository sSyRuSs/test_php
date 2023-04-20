<?php include_once '../admin/inc/header.php'; ?>
<?php include_once '../classes/brand.php'; ?>
<?php include_once '../classes/category.php'; ?>
<?php include_once '../classes/product.php'; ?>
<?php include_once '../helper/format.php'; ?>
?>
<?php
    $fm = new Format();
    $pro = new Product();
    if(isset($_GET['proID'])){
        $id = $_GET['proID'];
        $delete_pro = $pro->delete_pro($id);
    }
?>
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white justify-content-center">
            <h1 class="display-4 fw-bolder">PRODUCTS</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<?php
            if(isset($delete_pro)){
                echo $delete_pro;
            }
        ?>
<table class="table">
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Image</th>
        <th>Qunatity</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Description</th>
        <th>Action</th>

    </tr>
    <?php
            $prolist = $pro->show_pro();
            if($prolist){
                $i = 0;
                while($result = $prolist->fetch_assoc()){
                    $i++; 
        ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $result['proName'];  ?></td>
        <td><?php echo $result['proPrice'];  ?></td>
        <td class="w-25"><img src="uploads/<?php echo $result['image']?>" class="img-thumbnail img-fluid" /></td>
        <td><?php echo $result['proQuantity'];  ?></td>
        <td><?php echo $result['catName'];?></td>
        <td><?php echo $result['brandName'];?></td>
        <td><?php echo $fm->textShorten($result['proDes'],50); ?></td>
        <td><a href="editPro.php?proID=<?php echo $result['proID'] ?>">Edit</a> | <a
                onclick="return confirm('Are you sure ?')" href="?proID=<?php echo $result['proID'] ?>">Delete</a></td>
    </tr>
    <?php
    }
}
    ?>
</table>
<?php
    include_once '../admin/inc/footer.php'
?>