<!--THIS PAGE WILL COME AFTER clicking on respective image in STORE.PHP
    Allows user to select quantity and add to shopping cart
    Redirects to Shoppingcart.php
    
    BUG: Will not display properly if accessing it directly from live-preview
    Must click on product image in "STORE.PHP" to display properly
    ----------->
<?php
include('include/header.php');
?>


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


<!-------------- PRODUCT DETAILS ------------------->
<div align ='left'> <img src="<?php echo $product['ProductImage']?>" width="350" height="200"/></div>

<h1><?php echo $product['ProductName']?></h1>
<p><?php echo $product['Cost']?></p>

<form action="shoppingcart.php?action=add" method="post">
            <label>Quantity</label>
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['ProductID']?>">
            <input type="submit" value="Add to Cart" class="btnAddAction" />
        </form>
        <div class="product-description"><?=$product['ProductDescription']?></div>



<!-------------- REVIEWS INFORMATION ------------------->
<?php
    $mytime = getdate(date("U"));
    $date = "$mytime[month] $mytime[mday], $mytime[year]";

    require "include/db_conn.php";
        
//calculates number of reviews
        $sql = $conn->query("SELECT customer_ID FROM reviews WHERE ProductID = $productID");
        $numR = $sql->num_rows;

//calculates total sum of all reviews to calculate average review
        $sql = $conn->query("SELECT SUM(ReviewRating) AS total FROM reviews WHERE ProductID = $productID");
        $data = $sql->fetch_array();
        $total = $data["total"];
        $avg = "";
        if($numR !=0){
            if(is_nan(round(($total / $numR), 1))){
                $avg = 0;
            }
            else{
                $avg = round( ($total / $numR),1);
            }
        }
            else{
                $avg = 0;
            }
//calculates number of reviews per rating
        $sql = $conn->query("SELECT Count(*) AS number FROM reviews WHERE ReviewRating = 5");
        $data = $sql->fetch_array();
        $value = $data["number"];
?>

<!------REVIEW STARS------------->
    <div class="container">
        <div class= "rating-review">
        <div class = "tri table-flex">
            <table>
            <tbody>
                <tr>
                <td>
                    <div class="rnb rv1">
                    <h3><?php echo $avg; ?></h3>
                    </div>
                    <div class="pdt-rate">
                    <div class="pro-rating">
                        <div class="clearfix rating marts">
                            <div class="rating-stars">
                            <div class="grey-stars"></div>
                            <div class="filled-stars" style="width:<?php echo $avg * 20; ?>%"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="rnrn">
                    <p class="rars"><?php if($numR == 0){echo "NO";}else{echo $numR;} ?> Reviews</p>
                    </div>
                    </td>
<!------REVIEW BREAKDOWN------------->
                <td>
        <div class="rpb">
        <?php
        //calculates TOTAL NUMBER of review for this product
        $sql = $conn->query("SELECT Count(*) AS totalreview FROM reviews WHERE ProductID = $productID");
        $data = $sql->fetch_array();
        $totalnum = $data["totalreview"];
        
        if($totalnum>0)
        {
          foreach(array_reverse(range(1,5), TRUE) as $key => $value)
                {
                //calculates number of reviews per SPECIFIC RATING
                $sql = $conn->query("SELECT Count(*) AS number FROM reviews WHERE ReviewRating = $value AND ProductID = $productID");
                $data = $sql->fetch_array();
                $numReview = $data["number"];

                //Calculates width of rating bar
                $width = 100 * $numReview / $totalnum;
                    ?>
                    <div class="rnpb">
                 <label><?=$value?><i class="fa fa-star"></i></label> 
                    <div class="ropb">
                        <div class="ripb" style="width: <?=$width;?>%"></div>
                    </div>
                    <div class="label">(<?=$numReview;?>)</$value?></div>
                    </div>
                        <?php
                }  
        } else {
            echo "No reviews";
        }
        
            ?>
        </div>
        </td>
    <td>
<!------BUTTON TO SUBMIT REVIEW------------->
                    <div class="rrb">
                    <p>Please Review Our Product</p>
                        <button class="rbtn opmd"> Add Review</button>
                    </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="review.modal" style="display:none">
            <div class="review-bg"></div>
            <div class="rnp">
                <div class= "rpc">
                <span><i class="far fa-times"></i></span>
                </div>
                <div class="rps" align="center">
                    <i class="fa fa-star" data-index="0" style="display:none"></i>
                    <i class="fa fa-star" data-index="1"></i>
                    <i class="fa fa-star" data-index="2"></i>
                    <i class="fa fa-star" data-index="3"></i>
                    <i class="fa fa-star" data-index="4"></i>
                    <i class="fa fa-star" data-index="5"></i>
                </div>
                <input type="hidden" value="" class="starRateV">
                <input type="hidden" value="<?php echo $date;   ?>" class="rateDate">
                <div class="rptf" align="center">
                <input type="text" class="raterName" placeholder="Enter Your Name...">
                </div>
                <div class="rptf" align="center">
                <textarea class="rateMsg" placeholder="Describe Shopping Experience"></textarea>
                </div>
                <div class="rate-error" align="center"></div>
                <div class="rpsb" align="center">
                <button class="rpbtn">Post Review</button>
                </div>
                </div>
            </div>
            
<!------DISPLAY EXISTING REVIEWS------------->
        <?php
            $sqlreview = "SELECT * from reviews WHERE productID = $productID";
            $result = mysqli_query($conn, $sqlreview);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck >0)
            {
            while($row = mysqli_fetch_assoc($result)){
                //links customerID in REVIEWS table to CUSTOMER table and pulls first and last name
                $custID = $row['Customer_ID'];
                
                $findinfo = mysqli_query($conn, "SELECT * FROM Customer WHERE customer_ID = $custID");
                $resultrow = mysqli_fetch_assoc($findinfo);
                $fname = $resultrow['first_name'];
                $lname = $resultrow['last_name'];

                ?>
                <div class="uscm-secs">
        <div class="us-ing">
            <p><?= substr($row['ReviewID'],0,1) ;?></p>
            </div>
            <div class="uscms">
            <div class="us-rate">
                <div class="pdt-rate">
            <div class="pro-rating">
                <div class="clearfix rating marts">
                    <div class="rating-stars">
                    <div class= "grey-stars"></div>
                    <div class="filled-stars" style="width:<?= $row['ReviewRating']*20; ?>%"></div>
                    </div></div>
                </div>
            </div>
                    </div>
                    <div class="us-cmt">
                    <br>
                    <p><?= $row['ReviewContent']; ?></p>
                    </div>
                    <div class="reviewinfo">
                    <p>By <?= $fname, " " , $lname, " " ?><?= $row['ReviewDate']; ?></p>
                    </div>
                    </div>
                </div>
                            <?php 
                        }
                        }
                    ?>

            </div>
        </div>
        </div>
        
<button class="back-button-productpage" onclick="history.go(-1);" >Previous Page </button>

<!------ FOOTER-------->  
<?php
        include('include/footer.php');

?>
