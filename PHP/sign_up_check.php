<?php

session_start();
include "db_conn.php";

if(isset($_POST['f_name'], $_POST['l_name'], $_POST['gender'], $_POST['birthday'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['password'], $_POST['re_password'])){

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
    $address = validate($_POST['address']);
    $city = validate($_POST['city']);
    $password = validate($_POST['password']);
    $re_password = validate($_POST['re_password']);

    $user_data = "f_name=" . $f_name . "&l_name=" . $l_name . "&gender=" . $gender . "&birthday=" . $birthday . "&email=" . $email . "&address=" . $address . "&city=" . $city;
    
    if(empty($f_name)){
        header("Location: sign_up.php?error=First Name is required.&$user_data");
        exit();
    } elseif(empty($l_name)){
        header("Location: sign_up.php?error=Last Name is required.&$user_data");
        exit();
    } elseif(empty($gender)){
        header("Location: sign_up.php?error=Gender is required.&$user_data");
        exit();
    } elseif(empty($birthday)){
        header("Location: sign_up.php?error=Birthday is required.&$user_data");
        exit();
    } elseif(empty($email)){
        header("Location: sign_up.php?error=Email is required.&$user_data");
        exit();
    } elseif(empty($address)){
        header("Location: sign_up.php?error=Address is required.&$user_data");
        exit();
    } elseif(empty($city)){
        header("Location: sign_up.php?error=City is required.&$user_data");
        exit();
    } elseif(empty($password)){
        header("Location: sign_up.php?error=Password is required.&$user_data");
        exit();
    } elseif(empty($re_password)){
        header("Location: sign_up.php?error=Re Password is required.&$user_data");
        exit();
    } elseif($password !== $re_password){
        header("Location: sign_up.php?error=The confirmation password does not match.&$user_data");
        exit();
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM person WHERE EmailAddress='$email' ";

        $result = mysqli_query($conn, $sql);

        $sql2 = "INSERT INTO person(EmailAddress, Password) VALUES ('$email', '$hashedPassword')";
        $result2 = mysqli_query($conn, $sql2);
        if($result2){
            header("Location: sign_up.php?success=Your account has been created successfully.&$user_data");
            exit();
        } else {
            header("Location: sign_up.php?error=Unknown error occurred.&$user_data");
            exit();
        }        
    }

} else {
    header("Location: sign_up.php");
    exit();
}
?>
