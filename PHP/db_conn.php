<?php
$host = "localhost";
$username = "root";
$password = "root";
$db_123 = "bizkod";


$conn = mysqli_connect("$host","$username", "$password", "$db_123") or die(mysqli_error($connection));
