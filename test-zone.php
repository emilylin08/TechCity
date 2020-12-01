<?php
include('include/header.php');
include "include/db_conn.php";
?>


<?php
//Grabs product ID and quantity from previous page
$productID = $_POST["product_id"];
$quantity = $_POST["quantity"];
echo "Product ID:" ,$productID, "<br>";
echo "Quantity:", $quantity;
?>

<div id="shopping-cart">
    <h1>Shopping Cart</h1>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>

	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	


</tbody>
</table>
</div>
<!------ FOOTER-------->  
<?php
        include('include/footer.php');
?>