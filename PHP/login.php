<?php

session_start();
include "db_conn.php";

if(isset ($_POST['email']) && isset ($_POST['pass'])){
    
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$email = validate($_POST['email']);
$pass = validate($_POST['pass']);

if(empty($email)){
    header("Location:index.php?error=Email is required.");
    exit();
}else if(empty($pass)){
    header("Location:index.php?error=Password is required.");
    exit();
}else{

    $pass = md5($pass);
    
    $sql="SELECT* FROM person WHERE EmailAddress = '$email' AND Password='$pass'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['EmailAddress'] === $email && $row['Password'] === $pass){
            $_SESSION['first_name'] = $row['FirstName'];
            $_SESSION['last_name'] = $row['LastName'];
            $_SESSION['gender'] = $row['Gender'];
            $_SESSION['birth'] = $row['DateOfBirth'];
            $_SESSION['email'] = $row['EmailAddress'];
            $_SESSION['phone'] = $row['PhoneNumber'];
            $_SESSION['address'] = $row['Address'];
            $_SESSION['city'] = $row['City'];
            $_SESSION['zip'] = $row['Zip'];
            $_SESSION['nationality'] = $row['Nationality'];
        header("Location:profile.php");
        exit();  
        }else {
            header("Location:index.php?error=Incorrect User Name or Password.");
            exit();
        }  
          
        
    }else {
        header("Location:index.php?error=Incorrect User Name or Password.");
        exit();
    }

}

}else{
    header("Location:index.php");
    exit();
}