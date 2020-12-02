<?php
//https://www.youtube.com/watch?v=JDn6OAMnJwQ&ab_channel=CodingwithElias
    $sname = "localhost";
    $uname = "root";
    $password = "";

    $db_name = "techcity";

    $conn = mysqli_connect($sname,$uname,$password,$db_name);

 if(!$conn){
     echo "Connection Failed!";
 }
