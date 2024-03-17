<?php
$dbhost = "localhost";
$dbuser = "Edina";
$dbpass = "rootroot";
$db = "bizkod";
$dbhost = "localhost:3307";
$connection = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $connection -> error);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>