<!--MY ACCOUNT PAGE
    THIS PAGE will only show up if user is signed in
    This Page will output users order history
    Allow users to cancel order
----------->

<!---------HEADER----------->
<?php include('include/header.php');?>

<!---Connects to database, checks orders history with ID stored in session->

<?php
include "include/db_conn.php";
$id = $_SESSION['id'];
?>

<!------ MAIN CONTENT-------->  
    <a>Welcome, <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></a>
    <br>
    <br>
    <a><u>Order History</u></a>
    
<?php

$sql = "SELECT * FROM orders WHERE CustomerID = $id";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck >0)
{ ?>

    <table class="tbl-cart" cellpadding="10" cellspacing="1">
    <tbody>
            <?php
        while($row = mysqli_fetch_assoc($result)){
            $productID = $row["ProductID"];
            $findinfo = mysqli_query($conn, "SELECT * FROM Inventory WHERE ProductID = $productID");
                $resultrow = mysqli_fetch_assoc($findinfo);
                $productname = $resultrow['ProductName'];
            ?>

            <tr>
            <th style="text-align:left;" width="50%">Order Placed <br>
                <?=$row["OrderDate"];?></th>
            <th style="text-align:left;" width="10%">Total <br>
                $<?=$row["Cost"];?></th>
            <th style="text-align:left;" width="13%">Order No. <br>
                <?=$row["OrderID"];?></th>
            <th style="text-align:left;" width="15%">Status</th>
            </tr>	

            <tr>
            <td colspan="3" style="text-align:left; padding: 10px;"><?=$productname;?></td>
            <td  style="text-align:left; padding: 10px;">
            
<!---Various options depending on the status of the order---->
               <?php
                if($row["OrderStatus"] == "In Progress"){
                    ?><a href="cancelorder.php?action=<?=$row["OrderID"];?>" id="btnEmpty" >Cancel Order</a> <?php
                }
                else if($row["OrderStatus"] == "Delivered"){
                    echo "Delivered";
                    ?><br><a href="writereview.php" method = "post" class="btn" value="review">Write Review</a> <?php
                } else{
                    echo $row["OrderStatus"];
                }
            ?>
            </td>
            </tr>

            <?php
        } ?>
           </tbody>
    </table>
       <?php
        
    } else
    { ?>
        <div class = "Orderbox">
            <u><p>You have no Orders. </p></u>
            Please check out our store <a href = "store.php" >Here!</a>           
        </div>
       <?php
    }

?>

<!------ FOOTER-------->         
<?php
        include('include/footer.php');
?>
