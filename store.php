<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>All Products - Techcity</title>
    <link rel=" stylesheet" href=" style.css" /> <!--connect html file with css file--->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet"> 
</head>


    
<!--verything in body will be displayed in webpage-->
<body>
    
    
    
    <div class = "container">
        
        <div class= "Navbar">
            <div class="logo">
                <img src="images\logo.png" width="150px">
                </div>
        <nav>
            <ul id="MenuItems">
                <li><a href = "index.php">HOME</a></li>
                <li><a href = "store.php">STORE</a></li>
                <li><a href = "signin.php">MY ACCOUNT</a></li>
                <li><a href = "shoppingcart.php">SHOPPING CART</a></li>
            </ul>
            <hr>
        </nav>
        <img src="images\menuicon.png" class="menu-icon" 
             onclick = "menutoggle()">
    </div>

        
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

<!---------FOOTER----------->
        <div class = "footer">
            <div class="container">
                <hr>
                <a style ="margin-left:20px"> Fall 2020 ISDS 454 <br> Group3</a> 
                </div>
            </div>
        </div>
<!---js for toggle menu--->
    <script>
        var MenuItems = document.getElementByID("MenuItems");
        
        MenuItems.style.maxHeight = "0px";
        
        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
            else
                {
                    MenuItems.style.maxHeight = "0px";
                }
        }
    </script>
    
</body>
</html>