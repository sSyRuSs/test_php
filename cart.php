<?php include 'inc/header.php' ?>
<?php
ob_start();
?>
<?php
if (isset($_GET['cartID'])) {
    $cartid = $_GET['cartID'];
    $delete_cart = $ct->del_product_cart($cartid);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $cartId = $_POST['cartID'];
    $quantity = $_POST['proQuantity'];
    $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
    if ($quantity <= 0) {
        $delcart = $ct->del_product_cart($cartId);
    }
}
?>
<?php
if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white justify-content-center">
            <h1 class="display-4 fw-bolder">CART</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>

<?php
if (isset($update_quantity_cart)) {
    echo $update_quantity_cart;
}
if (isset($delete_cart)) {
    echo $delete_cart;
}
?>
<table class="table">
    <tr>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th>

    </tr>
    <?php
    $cartlist = $ct->get_product_cart();
    if ($cartlist) {
        $subtotal = 0;
        $qty = 0;
        while ($result = $cartlist->fetch_assoc()) {
    ?>
            <tr>
                <td><?php echo $result['proName'];  ?></td>
                <td><?php echo $result['proPrice'];  ?></td>
                <td class="w-25"><img src="./admin/uploads/<?php echo $result['image'] ?>" class="img-thumbnail img-fluid" /></td>
                <td><?php echo $result['proQuantity']; ?></td>
                <td><?php $total = $result['proPrice'] * $result['proQuantity'];
                    echo $fm->format_currency($total) . " " . "VNĐ"; ?></td>
                <td><a onclick="return confirm('Are you sure ?')" href="?cartID=<?php echo $result['cartID'] ?>">Delete</a></td>
            </tr>
    <?php
            $subtotal += $total;
            $qty = $qty + $result['proQuantity'];
        }
    }
    ?>
</table>



<div class="card w-100 mb-5">
    <div class="card-body">
        <h5 class="card-title">Total Bill</h5>
        <p class="card-text">Sub total:<?php
        if(isset($subtotal)){
            echo $fm->format_currency($subtotal) . " " . "VNĐ";
        }
                                            
        ?> </p>
        <a href="" onclick="return confirm('Are you sure ?')" class="btn btn-primary">Thanh toán</a>
    </div>
</div>

<?php include 'inc/footer.php' ?>