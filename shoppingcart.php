<?php
//reference https://phppot.com/php/simple-php-shopping-cart/
include('include/header.php');
?>

<?php
//Grabs product ID and quantity from previous page
$productID = $_POST["product_id"];
$quantity = $_POST["quantity"];

//Searches database for item and places into temporary array
include "include/db_conn.php";
$sql = "SELECT * FROM inventory WHERE ProductID = '$productID'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)===1){
    $product =mysqli_fetch_assoc($result);
    
    
//Functions for shopping cart
if(!empty($_GET["action"])){
    switch($_GET["action"]){
        case "add":
            //stores value of most recent added item to temp array
            $itemArray = array('ProductName'=>$product["ProductName"],'quantity' =>$quantity, 'Cost'=>$product["Cost"], 'image'=>$product["ProductImage"]);
            
            $productID = $product["ProductID"];
            $_SESSION["cart_item"] = $itemArray;
            break;
        case "remove":
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;       
    }
}
?>
<?php
    
//Sets values of product into session
    $_SESSION["quantity"] = $_POST["quantity"];
    $_SESSION["cost"] = $product['Cost'] * $_SESSION["quantity"];
    $total_price = $_SESSION["cost"];
    
?> 

<!------ HTML FOR SHOPPING CART------------------->
<div id="shopping-cart">
    <h1>Shopping Cart</h1>

<a id="btnEmpty" href="shoppingcart.php?action=empty">Empty Cart</a>

	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left; padding: 10px;">Name</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:right;" width="5%">Remove</th>
</tr>	
				<tr>
				<td><img src="<?php echo $product['ProductImage']?>" class="cart-item-image" /><?php echo $product["ProductName"]; ?></td>
				<td style="text-align:right;"><?php echo $quantity; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$product["Cost"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($_SESSION["cost"],2); ?></td>
				<td style="text-align:center;"><a href="shoppingcart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>

<!-----TOTAL ROW ---------->
<tr>
<td colspan="3" align="right">Total:</td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
</tr>		

</tbody>
</table>

<?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}?>

<!------- BUTTONS ----------->
     
        <div class=".small-container">  
            <div class = "row row-2">
            <a></a>
            <a style = "margin-left:40px" href="payment.php" class="btn"> Checkout &#10148;</a>
            </div>
            
            <div class = "row row-2">
            <a></a>
            <a style = "margin-left:40px" href="store.php" class="btn"> Keep Shopping &#10148;</a>
            </div>
            </div>


<!------ FOOTER-------->  
<?php
        include('include/footer.php');
?>