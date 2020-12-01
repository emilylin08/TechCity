<?php
include('include/header.php');
?>


<!-----PRODUCT DETAILS----------->
<link href="style.css" type="text/css" rel="stylesheet" />

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


<div align ='left'> <img src="<?php echo $product['ProductImage']?>" width="350" height="200"/></div>


<div class="product-headings"><?=$product['ProductName']?>
        <br/> &dollar;<?=$product['Cost']?> </div>

<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>

<br/> <div class="product-description"><?=$product['ProductDescription']?></div>

<button class="back-button-productpage" onclick="history.go(-1);" >Previous Page </button>

<!------ FOOTER-------->  
<?php
        include('include/footer.php');

?>
