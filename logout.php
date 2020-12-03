<!--THIS PAGE WILL SIGN USERS OUT
    REMOVES VALUES CACHED IN SESSION
----------->


<?php 
session_start();

session_unset();
session_destroy();

header("Location: index.php");