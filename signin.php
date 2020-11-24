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

<html>

<!---------TEXT----------->

<form action="login.php" method="post">
 <a>
   <h1 href = "">Sign in</h1>
   
   <?php if (isset($_GET['error'])) { ?>
       <p class="error"><?php echo $_GET['error']; ?></p>
   <?php } ?>
    
    <label>Username:</label>
      <input type="text" id="username" name="uname" placeholder = "User Name"><br>
    <label>Password: </label>
      <input type="text" id="password" name="password" placeholder="Password">
      <br>
    <input type="submit" id="btn" value="Login">
  </a>
</form>
    

<p>If you click the "Submit" button, the form-data will be sent to a page called "/login.php".</p>

</html>  

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