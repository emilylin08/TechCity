<?php
include('include/header.php');
?>

<!------ FEATURED CATEGORIES-------->
        <div class="categories">
            
            <div class=".small-container">
                <h1>Featured Products</h1>
                <div class = "row">
                    <div class="col-3">
                        <img src="images/WacomMobilePro16.jpg">
                        </div>
                    <div class="col-3">
                        <img src="images/MacPro16.jpg">
                        </div>
                </div>
            </div>
        </div>
        
        
<!----- Store!!!!------------>
Displaying all products in database...
<table>
    <tr>
        <th>Name </th>
        <th>Type </th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Cost</th>
        <br>
        <hr>
    </tr>
    <?php
        include "include/db_conn.php";
        $sql = "SELECT * from inventory";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck >0)
        {
        while($row = mysqli_fetch_assoc($result)){
            echo $row['ProductName']. "<br>";
        }
        }
        ?>
</table>


<!--BUTTONS---> 
        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div>
    </div>

<!------ FOOTER-------->  
<?php
        include('include/footer.php');
?>