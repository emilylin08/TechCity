<!--THIS PAGE HANDLES UPDATING ORDER TABLE OR REVIEW TABLE----------->
<!---------HEADER----------->
<?php include('include/header.php');?>


<!---CODE TO CANCEL ORDER---->
<?php

    include "include/db_conn.php";
    $orderID =  $_GET["action"];
    $sql = "UPDATE orders SET OrderStatus = 'Cancelled' WHERE OrderID = '$orderID'";
    mysqli_query($conn, $sql);

?>

<a>Welcome, <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></a>
<br>
<a>Order #<?= $_GET["action"]?> has been cancelled. </a>

<!------ FOOTER-------->         
<?php
        include('include/footer.php');
?>