<!--THIS PAGE HANDLES UPDATING REVIEW TABLE----------->
<!---------HEADER----------->
<?php include('include/header.php');?>

<!---------Input REVIEW------->
<form action ="reviewsubmit.php">
<table>
    <tr>
        <th>Rating:</th>
        <th><input type="number" name="reviewstar" value="1" min="1" max="5" placeholder="Quantity" required></th>
        
    </tr>
    
        <tr>
        <th>Review</th>
        <th>
            <textarea name="myTextBox" cols="50" rows="5" maxlength="50">
            Please enter your review under 50 words.
            </textarea>

        </th>
    </tr>
    <tr>
        <th><input type="submit" class="page-btn" value="Submit"></th>
    </tr>
    
</table>
</form>
<!------ FOOTER-------->         
<?php
        include('include/footer.php');
?>