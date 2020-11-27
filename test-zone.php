<?php
//https://www.youtube.com/watch?v=0e02dl66PYo&ab_channel=DaniKrossing
//https://www.youtube.com/watch?v=H6GI0IV_bEU&list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-&index=65&ab_channel=DaniKrossing

//<img src=" '.$row['ProductImage'].' ">
//<img src="'.$row['ProductImage'].'" width="350" height="200" />
include('include/header.php');
?>
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
                echo '<a href ="#">
                <div><img src="'.$row['ProductImage'].'" width="350" height="200" /></div>
            
                <h3>'.$row["ProductName"].'</h3>
                <p>$ '.$row["Cost"].'</p>
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