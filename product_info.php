<?php
include('include/header.php');
?>

<!-----PRODUCT DETAILS----------->
<?php
include "include/db_conn.php";

//GET DATA FROM STORE.PHP URL and database values into an array
$productID = $_GET["productid"];
$sql = "SELECT * FROM inventory WHERE ProductID = '$productID'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)===1){
    $product =mysqli_fetch_assoc($result);
}
?>


<h1 class="name"><?=$product['ProductName']?></h1>
        &dollar;<?=$product['Cost']?>
<div><img src="<?php echo $product['ProductImage']?>" width="350" height="200"/></div><div>

</div>

<!------ FOOTER-------->  
<?php
        include('include/footer.php');
?>