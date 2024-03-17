<?php

session_start();
include "db_conn.php";

if(isset($_POST['s_meters']) && isset($_POST['smoking']) && 
   isset($_POST['parking'])  && isset($_POST['pet']) && 
   isset($_POST['child']) && isset($_POST['kitchen']) && 
   isset($_POST['address']) && isset($_POST['city']) && 
   isset($_POST['zip']) && isset($_POST['bathroom']) && 
   isset($_POST['livingroom']) && isset($_POST['beds'])){

    function validate($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $s_meters=validate($_POST['s_meters']);
    $smoking=$_POST['smoking'];
    $parking=$_POST['parking'];
    $pet=$_POST['pet'];
    $child=$_POST['child'];
    $kitchen=$_POST['kitchen'];
    $address=validate($_POST['address']);
    $city=$_POST['city'];
    $zip=validate($_POST['zip']);
    $bathroom=$_POST['bathroom'];
    $livingroom=$_POST['livingroom'];


    $user_data= "s_meters=". $s_meters. "&smoking=". $smoking. "&parking=". $parking. "&pet=". $pet. "&child=". $child. "&kitchen=". $kitchen. 
    "&address=". $address. "&city=". $city. "&zip=". $zip. "&bathroom=". $bathroom. "&livingroom=". $livingroom;
    
    if(empty($s_meters)){
        header("Location:upload.php?error=Squaremeter is required.&$user_data");
        exit();
    }else if(empty($smoking)){
        header("Location:upload.php?error=Smoking info is required.&$user_data");
        exit();
    }else if(empty($pet)){
        header("Location:upload.php?error=Pet info is required.&$user_data");
        exit();
    }else if(empty($child)){
        header("Location:upload.php?error=Child info is required.&$user_data");
        exit();
    }else if(empty($kitchen)){
        header("Location:upload.php?error=Kitchen is required.&$user_data");
        exit();
    }else if(empty($address)){
        header("Location:upload.php?error=Address is required.&$user_data");
        exit();
    }else if(empty($city)){
        header("Location:upload.php?error=City is required.&$user_data");
        exit();
    }else if(empty($zip)){
        header("Location:upload.php?error=Zip number is required.&$user_data");
        exit();
    }else if(empty($bathroom)){
        header("Location:upload.php?error=Bathroom info is required.&$user_data");
        exit();
    }else if(empty($livingroom)){
        header("Location:upload.php?error=Livingroom info is required.&$user_data");
        exit();
    }else {

    $sql3 = "INSERT INTO rooms(SquareMeters,Smoking,Parking,Pet,Children,Kitchen,Address,City,
    Zip,Bathroom,LivingRoom,NumberOfBeds) VALUES ('$s_meters', '$smoking', '$pet','$child','$kitchen','$address','$city','$zip','$bathroom','$livingroom')";

    $result3 = mysqli_query($conn, $sql3);
    if($result3){
        header("Location:upload.php?success=Your apartmann is uploaded succesfully.&$user_data");
        exit();
    }else{
        header("Location:upload.php?error=unknown error occured.&$user_data");
        exit();
    }
}

}else{
    header("Location:upload.php");
    exit();
}