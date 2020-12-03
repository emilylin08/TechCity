<!--THIS PAGE GETS USER INPUTTED VALUES FOR SIGN IN PAGE----------->
    
<?php //possible idea to make it more interesting: https://www.youtube.com/watch?v=HV7DtH3J2PU&ab_channel=DarkCode ?>
<!---------HEADER----------->
<?php include('include/header.php');?>

<html>

<div class = "center">
<div class = "logincontainer">
<!---------SIGN IN WITH EXISTING ACCOUNT----------->

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
            <input type="submit" class="page-btn" value="Login">
          </a>
        </form>
</div>
</div>
</html>  

<!---------FOOTER----------->
<?php include('include/footer.php');?>
