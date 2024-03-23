<?php

session_start();
include "db_conn.php";

if(isset($_POST['f_name']) && isset($_POST['l_name']) &&
   isset($_POST['gender']) && 
   isset($_POST['birthday']) && isset($_POST['email']) && 
   isset($_POST['phone_numb']) && isset($_POST['address']) &&
   isset($_POST['city']) && isset($_POST['zip']) &&
   isset($_POST['nationality']) && 
   isset($_POST['password']) && isset($_POST['re_password'])){
   
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $f_name = validate($_POST['f_name']);
    $l_name = validate($_POST['l_name']);
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $email = validate($_POST['email']);
    $phone = $_POST['phone_numb'];
    $address = validate($_POST['address']);
    $city = validate($_POST['city']);
    $zip = $_POST['zip'];
    $nationality = validate($_POST['nationality']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $id_pic = $_FILES["id_pic"]["id_pic"];
    $picture = $_FILES["picture"]["picture"];
    
    if(empty($f_name)){
        header("Location: sign_up.php?error=First Name is required.");
        exit();
    } else if(empty($l_name)){
        header("Location: sign_up.php?error=Last Name is required.");
        exit();
    }else 
    if(empty($id_pic)){
        header("Location: sign_up.php?error=ID Picture is required.");
        exit();
    }else
     if(empty($gender)){
        header("Location: sign_up.php?error=Gender is required.");
        exit();
    } else if(empty($birthday)){
        header("Location: sign_up.php?error=Birthday is required.");
        exit();
    } else if(empty($email)){
        header("Location: sign_up.php?error=Email is required.");
        exit();
    } else if(empty($phone)){
        header("Location: sign_up.php?error=Phone Number is required.");
        exit();
    } else if(empty($address)){
        header("Location: sign_up.php?error=Address is required.");
        exit();
    } else if(empty($city)){
        header("Location: sign_up.php?error=City is required.");
        exit();
    } else if(empty($zip)){
        header("Location: sign_up.php?error=Zip is required.");
        exit();
    }else if(empty($nationality)){
        header("Location: sign_up.php?error=Nationality is required.");
        exit();
    }else 
    if(empty($picture)){
        header("Location: sign_up.php?error=Picture is required.");
        exit();
    }else
     if(empty($pass)){
        header("Location: sign_up.php?error=Password is required.");
        exit();
    }else if(empty($re_pass)){
        header("Location: sign_up.php?error=Re Password is required.");
        exit();
    } else if($pass !== $re_pass){
        header("Location: sign_up.php?error=The confirmation password does not match.");
        exit();
    } else {

        $pass = md5($pass);

        $sql = "SELECT * FROM person WHERE EmailAddress='$email' ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) >0){
            header("Location:sign_up.php?error=The username is taken try another.");
            exit();
        }else{
        $sql2 = "INSERT INTO person(FirstName, LastName, Gender, DateOfBirth, EmailAddress, Password, 
        PhoneNumber, Address, City, Zip, Nationality) VALUES ('$f_name', '$l_name', '$gender','$birthday'
        , '$email', '$pass', '$phone','$address', '$city', '$zip','$nationality')";

        $result2 = mysqli_query($conn, $sql2);

        if($result2){
            header("Location: sign_up.php?success=Your account has been created successfully.");
            exit();
        } else {
            header("Location: sign_up.php?error=Unknown error occurred.");
            exit();
        }        
    }
   
}

} else {
    header("Location: sign_up.php?error=hello");
    exit();
}

