<?php
    $mytime = getdate(date("U"));
    $date = "$mytime[weekday], $mytime[month] $mytime[myday], $mytime[year]";

    require "db_conn.php";
        
        $sql = $conn->query("SELECT customer_ID FROM reviews");
        $numR = $sql->num_rows;

        $sql = $conn->query("SELECT SUM(ReviewID) AS total FROM reviews");
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
<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Product Reviews</title>
    <link rel="stylesheet" href="reviewstyle.css">
    <link rel="stylesheet" href="/your-path-to-fontawesome/css/fontawesome.css">
    <script src = "http://code.jquery.com/jquery-3.2.1.min.js" integrity= "sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin= "anonymous"></script>
    </head>
    
    <body>
    <div class="containter">
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
                    <p class="rars"><?php if($numR == 0){echo "NO";}else(echo $numR;) ?> Reviews</p>
                    </div>
                    </td>
                <td>
                    <div class="rpb">
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
                    </div>
                    </td>
                <td>
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
            <div class="bri">
            <div class="uscm">
                <?php 
                    $sqlp = "SELECT * FROM reviews";
                    $result = $conn->query($sqlp);
                    if(mysqli_num_rows($result) > 0){
                        while($row = $result->fetch_assoc()){
                            
                        }
                    }
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
                        <p><?= $row['ReviewContent']; ?></p>
                        </div>
                        <div class="us-nm">
                        <p><i>By <span class= "cmnm"><?= $row['ReviewID']; ?></span> on <span class="cmdt"><?= $row['ReviewDate']; ?></span></i></p>
                        </div>
                    </div>
                </div>
                <?php  }
                    }
                ?>
                </div>
            </div>
            </div>
        </div>
        </div>
        <script src="main.js"></script>
    </body>
    <html></html>