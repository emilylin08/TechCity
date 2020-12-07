<?php
    require "db_conn.php";
    
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $POSTI = filter_var_array($_POST, FILTER_SANITIZE_NUMBER_INT);
    
    if(isset($_POST["starRate"])){
        $starRate = mysqli_real_escape_string($conn, $POSTI["starRate"]);
        $rateMsg = mysqli_real_escape_string($conn, $POST["rateMsg"]);
        $date = mysqli_real_escape_string($conn, $POST["date"]);
        $name = mysqli_real_escape_string($conn, $POSTI["starRate"]);
        
        
        $sql = $conn->prepare("SELECT * FROM reviews WHERE ReviewID=?");
        $sql->bind_param("s", $name);
        $sql->execute();
        $res = $sql->get_result();
        $rst = $res->fetch_assoc();
        $val = $rst["ReviewID"];
        
        if(!$val){
            $stmt = $conn->prepare("INSERT INTO reviews (ReviewID, ReviewRating, ReviewContent, ReviewDate) values (?,?,?,?)");
            $stmt->bind_param("ssss", $name, $starRate, $rateMsg, $date);
            $stmt->execute();
            echo "Inserted Successfully";
        }
        else{
            $stmt = $conn->prepare("UPDATE reviews SET ReviewID=?, ReviewRating=?, ReviewContent=?, ReviewDate=? WHERE ReviewID=?");
            $stmt->bind_param("sssss", $name, $starRate, $rateMsg, $date, $name);
            $stmt->execute();
            echo "Inserted Successfully";
        }
        
    }
        
?>