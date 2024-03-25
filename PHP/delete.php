<?php

session_start();
require "db_conn.php";

$id_to_delete = $_SESSION['room_id']; // id lekérése a GET kéréstől, ami a táblából való törlendő rekordot azonosítja
$sql = "DELETE FROM Room WHERE RoomID = $id_to_delete";

if (!($conn->query($sql) === TRUE)) {
    header("Location:insert_room.php?success= Room succesfully reserved!");
    exit();
} else {
    header("Location:insert_room.php?error= Couldn't reserve, error. Try again!");
    exit();
}

// Kapcsolat bezárása
$conn->close(); 