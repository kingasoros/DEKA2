<?php

session_start();
include "db_conn.php";

if(isset($_POST['email']) && isset($_POST['password'])){

    function validate($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $email=validate($_POST['email']);
    $password=validate($_POST['password']);
    
    if(empty($email)){
        header("Location:login.php?error=Email is required.");
        exit();
    }else if(empty($password)){
        header("Location:login.php?error=Password is required.");
        exit();
    }else {
 
        $pass=md5($password);

        $sql="SELECT * FROM person WHERE EmailAddress='$email' AND Password='$pass'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if ($row['Email'] === $email && $row['Password'] === $pass){
                $_SESSION['Email'] = $row['Email'];
                $_SESSION['Password'] = $row['Password'];
                header("Location:profile.php");
                exit();

            }else{
                header("Location:login.php?error=Incorrect User Name or Password.");
                exit();
            }
     
        }else{
            header("Location:login.php?error=Incorrect User Name or Password.");
            exit();
        }
        
    }
}else{
    header("Location:login.php");
    exit();
}
