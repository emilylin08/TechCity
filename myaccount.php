<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])){
?>
 
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>All Products - Techcity</title>
    <link rel=" stylesheet" href=" style.css" /> <!--connect html file with css file--->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet"> 
</head>


    
<!--HEADER-->
<body>
    <div class = "container">
        <div class= "Navbar">
            <div class="logo">
                <img src="images\logo.png" width="150px">
                </div>
        <nav>
            <ul id="MenuItems">
                <li><a href = "index.html">HOME</a></li>
                <li><a href = "store.html">STORE</a></li>
                <li><a href = "signin.php">MY ACCOUNT</a></li>
                <li><a href = "shoppingcart.html">SHOPPING CART</a></li>
            </ul>
            <hr>
        </nav>
        <img src="images\menuicon.png" class="menu-icon" 
             onclick = "menutoggle()">  
    </div>
    <h1>Welcome, <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></h1>
     <a href="logout.php">Logout</a>    
    
        
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
<?php
}

else{
    header("Location: index.html");
    exit();
}
?>