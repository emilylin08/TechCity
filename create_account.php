<!---------HEADER----------->
<?php include('include/header.php');?>

<html>

<!---------CREATE A NEW ACCOUNT----------->
    <div class = "row">
        <form action="check.php" method="post">
         <a>
        <h1>Create an account</h1>

           <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
           <?php } ?>

            <label>Username:</label>
              <input type="text" id="username" name="uname" placeholder = "User Name"><br>
            <label>Password: </label>
              <input type="text" id="password" name="password" placeholder="Password">
              <br>
            <input type="submit" id="btn" value="Register">
          </a>
        </form>
    </div>

</html>  

<!---------FOOTER----------->
<?php include('include/footer.php');?>
