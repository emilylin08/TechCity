<!--THIS PAGE takes userinputted values from product_info.php
    Stores values into SESSION array
    CHECKOUT button will redirect to PAYMENT FORMS and later "payment_con.php"
----------->


<?php
//reference https://phppot.com/php/simple-php-shopping-cart/
//https://codeshack.io/shopping-cart-system-php-mysql/#creatingtheproductpage
include('include/header.php');
?>

<?php

//Functions for shopping cart
if(!empty($_GET["action"])){
    switch($_GET["action"]){
        case "add":
            //Grabs product ID and quantity from previous page
            $productID = $_POST["product_id"];
            $quantity = $_POST["quantity"];

            //Searches database for item and places into temporary array
            include "include/db_conn.php";
            $sql = "SELECT * FROM inventory WHERE ProductID = '$productID'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)===1){
                $product =mysqli_fetch_assoc($result);
            }
            //stores value of most recent added item to temp array
            $itemArray = array('ProductName'=>$product["ProductName"],'quantity' =>$_POST["quantity"], 'Cost'=>$product["Cost"], 'image'=>$product["ProductImage"], 'ProductID' =>$product["ProductID"]);
            
            $_SESSION["cart_item"] = $itemArray;
            $_SESSION["total"] = $product['Cost'] * $quantity;
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;       
    }
}
?>

<!------ HTML FOR SHOPPING CART------------------->
<div id="shopping-cart">
    <h1>Shopping Cart</h1>

<a id="btnEmpty" href="shoppingcart.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
    $item = $_SESSION["cart_item"];
?>	
	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left; padding: 10px;">Name</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
</tr>	
        <tr>
        <td><img src="<?php echo $item["image"]?>" class="cart-item-image" /><?php echo $item["ProductName"]; ?></td>
        <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
        <td  style="text-align:right;"><?php echo "$ ". number_format($item["Cost"],2); ?></td>
        <td  style="text-align:right;"><?php echo "$ ". number_format($_SESSION["total"],2); ?></td>
        </tr>

<!-----TOTAL ROW ---------->
<tr>
<td colspan="3" align="right">Total:</td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($_SESSION["total"], 2); ?></strong></td>
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
           <?php if(isset($_SESSION["cart_item"]))
            {  //ONLY DISPLAY CHECKOUT BUTTON IF THERE ARE ITEMS IN SHOPPING CART
                ?>
            <div class = "row row-2">
            <a></a>
            <a style = "margin-left:40px" href="payment.php" class="btn"> Checkout &#10148;</a>
            </div>
            <?php } ?>
            <div class = "row row-2">
            <a></a>
            <a style = "margin-left:40px" href="store.php" class="btn"> Keep Shopping &#10148;</a>
            </div>
            </div>


<!------ FOOTER-------->  
<?php
        include('include/footer.php');
?>
