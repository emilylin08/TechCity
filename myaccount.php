<!---------HEADER----------->
<?php include('include/header.php');?>

<!------ MAIN CONTENT-------->  
    <a>Welcome, <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></a>
    <br>
    <a><u>Account Information:</u></a>
    <br>
    <a><u>Order History</u></a>
  
<!------ FOOTER-------->         
<?php
        include('include/footer.php');
?>
