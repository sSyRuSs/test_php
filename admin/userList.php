
<?php include_once '../admin/inc/header.php'; ?>
<?php include_once '../classes/userlogin.php'; ?>
<?php include_once '../helper/format.php'; ?>

<?php
    $fm = new Format();
    $user = new Userlogin ();
    if(isset($_GET['userID'])){
        $id = $_GET['userID'];
        $delete_user = $user->delete_user($id);
    }
?>
<h2 class="mt-5 justify-content-center">User List</h2>
<?php
            if(isset($delete_user)){
                echo $delete_user;
            }
        ?>
<table class="table">
    <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Pass</th>
        <th>Action</th>

    </tr>
    <?php
            $userlist = $user->show_user();
            if($userlist){
                $i = 0;
                while($result = $userlist->fetch_assoc()){
                    $i++; 
        ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $result['userName'];  ?></td>
        <td><?php echo $fm->textShorten($result['address'],50);  ?></td>
        <td><?php echo $result['city'];  ?></td>
        <td><?php echo $result['country'];?></td>
        <td><?php echo $result['userPhone']  ?></td>
        <td><?php echo $result['userEmail'];?></td>
        <td><?php echo md5($result['userPass']) ?></td>
        <td><a href="editUser.php?userID=<?php echo $result['userID'] ?>">Edit</a> | <a
                onclick="return confirm('Are you sure ?')" href="?userID=<?php echo $result['userID'] ?>">Delete</a></td>
    </tr>
    <?php
    }
}
    ?>
</table>
<?php
    include_once '../admin/inc/footer.php'
?>