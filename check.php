<?php
    //https://stackoverflow.com/questions/11292468/how-to-check-if-value-exists-in-a-mysql-database
    //https://www.youtube.com/watch?v=JDn6OAMnJwQ&ab_channel=CodingwithElias
    session_start();
    include "include/db_conn.php";
    
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
            
            $sql = "SELECT * FROM customer WHERE user_name = '$uname'";
            
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result)===1){
                $row =mysqli_fetch_assoc($result);
                
//IF USER EXISTS OUTPUT ERROR MESSAGE
            if ($row['user_name'] === $uname) {
                //USERNAME EXISTS; loops back to create page
            	header("Location: create_account.php?error=Username Taken!");
                    exit();
            }else{
                //idk what this is
                    header("Location: create_account.php?error=Incorrect Username or Password");
                    exit();
                }
                
            }
            else{
             //USERNAME DOES NOT EXIST Account created
             header("Location: create_account.php?error=Account Created");
             $_SESSION['username'] = $uname;
             $_SESSION['username'] = $pass;
                
             //blahblah figure out how to point to end of table
             $sql = "INSERT INTO customer (user_name, password) VALUES ('$uname', '$pass')"; 
             if ($conn->query($sql) === TRUE) {
                  echo "New record created successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
             exit();
          }
            }
        }
    else
    {
        echo "incorrect";
        header("Location: create_account.php");
        exit();
    }