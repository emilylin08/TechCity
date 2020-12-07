<!--THIS PAGE WILL COME AFTER PAYMENT FORM
    CREATES a new entry in "ORDERS" table 
    with values dependant on current Session----------->
<!---------HEADER----------->
<?php include('include/header.php');?>

<!------STORES DATA INTO ORDER TABLE------------->
<?php

//If no one is signed in, tells user to sign in
if(!isset($_SESSION['id'])){
    echo "Please sign in to complete check out.";
    
}else{ //Someone is signed in, sets customerID into SessionID and asks for more info
    $customerID = $_SESSION['id'];
    ?>
    
<!------STORES DATA INTO ORDER TABLE-------------> 
<!--- Once Submit is hit, will bring information into payment confirmation to update database with values ---->
<label>Please enter your Billing Address and Card Information:</label>
<form action="payment_con.php" method="post">
    <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <u><label> Billing Address: </label></u>
    <tr>
        <td> First Name : </td>
        <td><input type ="text" name ="Bill_First_Name" placeholder="First Name"/></td>
    <tr>

    <tr>
        <td> Last Name : </td>
        <td><input type ="text" name ="Bill_Last_Name" placeholder="Last Name"/></td>
    <tr>
       <tr>
        <td> Address : </td>
        <td><input type ="text" name ="Bill_Address" placeholder="Billing Address"/></td>
    <tr>

    <tr>
        <td> City : </td>
        <td><input type ="text" name ="Bill_City" placeholder="City"/></td>
    <tr>

    <tr>
        <td> State : </td>
        <td><input type ="text" name ="Bill_State" placeholder="State"/></td>
    <tr>
    <tr>
        <td> Zip Code : </td>
        <td><input type ="text" name ="Bill_ZipCode" placeholder="Zip Code"/></td>
    <tr>
    <tr>
        <td> Country : </td>
        <td><input type ="text" name ="Bill_Country" placeholder="Country"/></td>
    <tr>
    </table>   

    <table class="tbl-cart" cellpadding="10" cellspacing="1">
    <u><label> Card Information: </label> </u>    
    <tr>
        <td> Card Number : </td>
        <td><input type ="text" name ="Card_Number" placeholder="Card Number"/></td>
    <tr>
    <tr>
        <td> Expiration Date Month : </td>
        <td><input type ="text" name ="Expiration_Date_Month" placeholder="Expiration Month"/></td>
    <tr>
    <tr>
        <td> Expiration Date Year : </td>
        <td><input type ="text" name ="Expiration_Date_Year" placeholder="Expiration Year"/></td>
    <tr>

    <tr>
        <td> CSV Code : </td>
        <td><input type ="text" name ="CSV_Code" placeholder="CSV"/></td>
    <tr>

    </table> 
    <input type="submit" class="page-btn" value="Submit">
</form>
   <?php
    //Connect button to payment confirmation page.
    //include ("payment.php");
}

?>

<!---------FOOTER----------->
<?php include('include/footer.php');?>
