<!--THIS PAGE WILL COME AFTER CREATE_ACCOUNT.PHP
    Checks if username is taken in database
    If it is not, creates a new entry and updates database
    ----------->
   

   <?php
    //https://stackoverflow.com/questions/11292468/how-to-check-if-value-exists-in-a-mysql-database
    //https://www.youtube.com/watch?v=JDn6OAMnJwQ&ab_channel=CodingwithElias
    session_start();
    include "include/db_conn.php";

    if(isset($_POST['uname']) && isset($_POST['password'])){
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        //Stores data into temp variables
        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);
        $fname = validate($_POST['fname']);
        $lname = validate($_POST['lname']);
        $email = validate($_POST['email']);
        
        if(empty($uname)){
            header("Location: create_account.php?error=User Name is required");
            exit();
        }else if(empty($pass)){
            header("Location: create_account.php?error=Password is required");
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
                //idk what this is for
                    header("Location: create_account.php?error=Incorrect Username or Password");
                    exit();
                }
                
            }
            else{
             //USERNAME DOES NOT EXIST Account created
             header("Location: create_account.php?error=Account Created");
                
             //inserts data into SQL database
             $sql = "INSERT INTO customer (user_name, password,first_name, last_name, EmailAddress) VALUES ('$uname', '$pass', '$fname','$lname','$email')"; 
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