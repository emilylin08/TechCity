<!--THIS PAGE WILL COME AFTER PAYMENT FORM
    CREATES a new entry in "ORDERS" table 
    with values dependant on current Session----------->
<!---------HEADER----------->
<?php include('include/header.php');?>

<!------STORES DATA INTO ORDER TABLE------------->
<?php
include "include/db_conn.php";

//Stores values into temp placeholders
$item = $_SESSION["cart_item"];
$date = date("Y/m/d");
$productID = $item["ProductID"];
$cost = $_SESSION["total"];
$trackingNumber;

//If no one is signed in, customerID is initialized into 000
if(!isset($_SESSION['id'])){
    $customerID = 0;
}else{ //Someone is signed in, sets customerID into SessionID
    $customerID = $_SESSION['id'];
}

//Inserts values into Database
$sql = "INSERT INTO ORDERS (CustomerID, ProductID, Cost, OrderDate, OrderStatus) VALUES ('$customerID','$productID', '$cost','$date','In Progress')"; 
             if ($conn->query($sql) === TRUE) {
                 ?>
                 <div class="placeorder content-wrapper">
                    <h1>Your Order Has Been Placed</h1>
                    <p>Thank you for ordering with us! <br> Please check My Account for more details</p>
                 </div>           
<?php
                 //GENERATE TRACKING NUMBER AND OUTPUT IT
                 
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
//since order is added to database, removes values from session
unset($_SESSION["cart_item"]);
?>

<!---------FOOTER----------->
<?php include('include/footer.php');?>
