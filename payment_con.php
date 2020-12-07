<!--THIS PAGE WILL COME AFTER PAYMENT FORM
    CREATES a new entry in "ORDERS" table 
    with values dependant on current Session----------->
<!---------HEADER----------->
<?php include('include/header.php');?>

<!--------UPDATES BILLING TABLE IN DATABASE----------->
<?php
include "include/db_conn.php";
function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $billcustomerID = $_SESSION['id'];
        $billfname = validate($_POST['Bill_First_Name']);
        $billlname = validate($_POST['Bill_Last_Name']);
        $billaddress = validate($_POST['Bill_Address']);
        $billcity = validate($_POST['Bill_City']);
        $billstate = validate($_POST['Bill_State']);
        $billzip = validate($_POST['Bill_ZipCode']);
        $billcountry = validate($_POST['Bill_Country']);

        $billnumber = validate($_POST['Card_Number']);
        $billmonth = validate($_POST['Expiration_Date_Month']);
        $billyear = validate($_POST['Expiration_Date_Year']);
        $billcsv = validate($_POST['CSV_Code']);


        $sqlpay = "INSERT INTO billing (CustomerID, Bill_Fname, Bill_Lname, Bill_Address, Bill_City, Bill_State, Bill_Zip, Bill_Country, Bill_cardNumber, Bill_Month, Bill_Year, Bill_CSV) VALUES ('$billcustomerID','$billfname', '$billlname','$billaddress','$billcity','$billstate','$billzip','$billcountry','$billnumber','$billmonth','$billyear','$billcsv')";
        if ($conn->query($sqlpay) === TRUE) {
                  echo "New record created successfully";
                } else {
                  echo "Error: ";
                }
?>

<!---------UPDATES ORDER TABLE IN DATABASE----------->
<?php
    $customerID = $_SESSION['id'];

    //Stores values into temp placeholders
    $item = $_SESSION["cart_item"];
    $date = date("Y/m/d");
    $productID = $item["ProductID"];
    $cost = $_SESSION["total"];
    $trackingNumber;
    
    
    //Inserts values into Database
    $sql = "INSERT INTO ORDERS (CustomerID, ProductID, Cost, OrderDate, OrderStatus) VALUES ('$customerID','$productID', '$cost','$date','In Progress')"; 
                 if ($conn->query($sql) === TRUE) {
    ?>
                     <div class="placeorder content-wrapper">
                        <h1>Your Order Has Been Placed</h1>
                        <p>Thank you for ordering with us! <br> Please check My Account for more details</p>
                     </div>           
    <?php
    //GENERATE TRACKING NUMBER AND OUTPUT IT

                    } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                    }
    //since order is added to database, removes values from session
    unset($_SESSION["cart_item"]);

?>

<!------ FOOTER-------->  
<?php
        include('include/footer.php');

?>