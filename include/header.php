<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>TechCity</title>
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