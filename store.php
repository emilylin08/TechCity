<?php
//https://www.youtube.com/watch?v=0e02dl66PYo&ab_channel=DaniKrossing
include('include/header.php');
?>

<!------ FEATURED CATEGORIES-------->
<!--- Display top 2 most sold products---->

    <div class="categories">
            <h1>Featured Products</h1>
            <div class="gallery-container">
                    <div class="col-3">
                        <img src="images/WacomMobilePro16.jpg">
                        </div>
                    <div class="col-3">
                        <img src="images/MacPro16.jpg">
                        </div>
                </div>
            </div>
    </div>
        
<!----- List specific order??------------>

<!----- Store!!!!------------>
<div class="categories">
    <h1>All Products</h1>
            
    <section class = "gallery-container">
       <?php
        include_once 'include/db_conn.php';
        $sql = "SELECT * from inventory";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
            if($resultCheck >0)
            {
            while($row = mysqli_fetch_assoc($result)){
                //EDIT ECHO STATEMENT TO CONCACTENATE PRODUCT ID
                echo '<a href ="product_info.php?productid= '.$row["ProductID"]. '">
                <div><img src="'.$row['ProductImage'].'" width="350" height="200" /></div>
            
                <h3>'.$row["ProductName"].'</h3>
                <p>$ '.$row["Cost"].'</p>
                <p>'.$row["ProductID"].'</p>
                </a>';
            }
            }
        ?>

    </section>       
            
</div>

<!------ FOOTER-------->  
<?php
        include('include/footer.php');
?>