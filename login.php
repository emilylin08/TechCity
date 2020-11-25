<?php
    //https://stackoverflow.com/questions/11292468/how-to-check-if-value-exists-in-a-mysql-database
    //https://www.youtube.com/watch?v=JDn6OAMnJwQ&ab_channel=CodingwithElias
    session_start();
    include "db_conn.php";
    
    echo $_POST['uname'];
    echo $_POST['password'];

    if(isset($_POST['uname']) && isset($_POST['password'])){
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);
        if(empty($uname)){
            header("Location: signin.php?error=User Name is required");
            exit();
        }else if(empty($pass)){
            header("Location: signin.php?error=Password is required");
            exit();
        }else{
            $sql = "SELECT * FROM customer WHERE user_name = '$uname' AND Password = '$pass'";
            
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result)===1){
                $row =mysqli_fetch_assoc($result);
                
            //IF USER EXISTS IN DATABASE SAVE DATA INTO SESSION VARIABLES
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['user_name'];
            	$_SESSION['fname'] = $row['first_name'];
                $_SESSION['lname'] = $row['last_name'];
            	$_SESSION['id'] = $row['customer_ID'];
            	header("Location: myaccount.php");
                    exit();
                
            }else{
                echo "inncorect data";
                    header("Location: signin.php?error=Incorrect Username <br>or Password");
                    exit();
                }
                
            }
            else{
             header("Location: signin.php?error=Incorrect Username <br>or Password");
             exit();
          }
            }
        }
    else
    {
        echo "incorrect";
        header("Location: signin.php");
        exit();
    }