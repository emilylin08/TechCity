<?php
include('include/header.php');
?>

        
<!----- THIS SECTION CHANGES!!!!------------>
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
        include "db_conn.php";
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

<?php
        include('include/footer.php');
?>