<!--MY ACCOUNT PAGE
    THIS PAGE will only show up if user is signed in
    This Page will output users information
    Order history
    Allow users to cancel order
----------->


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
