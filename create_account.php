<!--THIS PAGE OCCURS WHEN "SIGN IN" IS SELECTED ON HEADER
    TAKES USER INPUTED VALUES AND PUSHES IT TO CHECK.PHP
    ----------->


<!---------HEADER----------->
<?php include('include/header.php');?>

<html>

<!---------CREATE A NEW ACCOUNT----------->
    <div class = "center">
       <div class = "logincontainer">
        <form action="check.php" method="post">
         <a>
        <h1>Create an account</h1>

           <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
           <?php } ?>

            <label>Username:</label>
              <input type="text" id="username" name="uname" placeholder = "User Name"><br>
              
            <label>Password: </label>
              <input type="text" id="password" name="password" placeholder="Password"><br>
              
              <label>Email Address: </label>
              <input type="text" id="email" name="email" placeholder="Email Address"><br>
              
              <label>First Name: </label>
              <input type="text" id="firstname" name="fname" placeholder="First Name"><br>
              
              <label>Last Name: </label>
              <input type="text" id="lastname" name="lname" placeholder="Last Name"><br><br>
              
            <input type="submit" class="page-btn" value="Register">
          </a>
        </form>
    </div>
</div>
</html>  

<!---------FOOTER----------->
<?php include('include/footer.php');?>
