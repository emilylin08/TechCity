<?php
//https://www.youtube.com/watch?v=0e02dl66PYo&ab_channel=DaniKrossing
include('include/header.php');
?>
  
   <?php
    $mytime = getdate(date("U"));
    $date = "$mytime[month] $mytime[mday], $mytime[year]";

    require "include/db_conn.php";
        
//calculates number of reviews
        $sql = $conn->query("SELECT customer_ID FROM reviews");
        $numR = $sql->num_rows;

//calculates total sum of all reviews to calculate average review
        $sql = $conn->query("SELECT SUM(ReviewRating) AS total FROM reviews");
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
?>

<!DOCTYPE html>
<html lang="en">

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
                <td>
<!------REVIEW BREAKDOWN------------->
                    <div class="rpb">
                    <?php
                    foreach(array_reverse(range(1,5), TRUE) as $key => $value)
                    {
                    //calculates number of reviews per rating
                    $sql = $conn->query("SELECT Count(*) AS number FROM reviews WHERE ReviewRating = $value");
                    $data = $sql->fetch_array();
                    $numReview = $data["number"];
                        ?>
                        <div class="rnpb">
                     <label><?=$value?><i class="fa fa-star"></i></label> 
                        <div class="ropb">
                            <div class="ripb" style="width: 20%"></div>
                        </div>
                        <div class="label">(<?=$numReview;?>)</$value?></div>
                        </div>
                            <?php
                    }
                        ?>
                        <!-----
                        <div class="rnpb">
                     <label>5<i class="fa fa-star"></i></label> 
                        <div class="ropb">
                            <div class="ripb" style="width: 20%"></div>
                        </div>
                        <div class="label">(1)</div>
                        </div>
                         <div class="rnpb">
                     <label>4<i class="fa fa-star"></i></label> 
                        <div class="ropb">
                            <div class="ripb" style="width: 50%"></div>
                        </div>
                        <div class="label">(1)</div>
                        </div>
                         <div class="rnpb">
                     <label>3<i class="fa fa-star"></i></label> 
                        <div class="ropb">
                            <div class="ripb" style="width: 80%"></div>
                        </div>
                        <div class="label">(15)</div>
                        </div>
                         <div class="rnpb">
                     <label>2<i class="fa fa-star"></i></label> 
                        <div class="ropb">
                            <div class="ripb" style="width: 30%"></div>
                        </div>
                        <div class="label">(11)</div>
                        </div>
                         <div class="rnpb">
                     <label>1<i class="fa fa-star"></i></label> 
                        <div class="ropb">
                            <div class="ripb" style="width: 40%"></div>
                        </div>
                        <div class="label">(13)</div>
                        </div>
                        
                        --->
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
            $sqlreview = "SELECT * from reviews";
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
        <script src="main.js"></script>
    </body>
    <html></html>
    
   <!------ FOOTER-------->  
<?php
        include('include/footer.php');
?>