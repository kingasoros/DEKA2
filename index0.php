<?php
session_start();
require "PHP/db_conn.php";
// Véletlenszerűen generált RoomID
$randomRoomID = rand(1, 5); // Itt 1-től 100-ig állítottam be a véletlenszerű számok intervallumát, de ezt módosíthatod az adatbázisban lévő szobák számához igazítva

// Lekérdezés a véletlenszerűen kiválasztott szobához
$query = "SELECT * FROM `room` WHERE `RoomID` = $randomRoomID";
$result = mysqli_query($conn, $query);
$room = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BizKod_DEKA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/main_main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="front_body" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
<script src="../nav.js"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1 fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bi bi-house-door"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 active bg-warning rounded" aria-current="page" href="index0.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="PHP/insert_room.php">Rooms</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link mx-2 " href="about_us.html">
                        Company
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item mx-3">
                    <a class="nav-link text-light h4" href="PHP/index.php" target="blank">Login</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-light h4" href="PHP/sign_up.php" target="blank">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light cont">
    <div class="col-md-5 p-lg-5 mx-auto my-5 text-center">
        <h1 class="display-4 fw-normal">APARTMENTS</h1>
        <p class="lead fw-normal">If you are looking for a roommate, you are in the right place.</p>
    </div>
    <!-- A további tartalom -->
</div>

<div class="container marketing">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 media">
            <p class="m_img"></p>
            <h2 class="fw-normal">Jani</h2>
            <p>I have a positive experience with this site</p>
            <p><a class="btn btn-secondary" href="PHP/sign_up.php">Let's start! &raquo;</a></p>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>

<hr>

<div class="row featurette">
    <div class="col-md-6">
        <h2 class="featurette-heading fw-normal lh-1">Would you like to quickly find a recipe based on what's in your fridge?</h2>
        <p class="lead">You are at the right place!</p>
    </div>
    <div class="col-md-5">
        <img class="start_img" src="IMAGES/bedroom1.jpg">
    </div>
</div>

<hr>

<div class="row featurette">
    <div class="col-md-6 col-sm-12 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Don't have time to cook all the time,
            but do you like to save recipes for later?</h2>
        <p class="lead">This is also possible.</p>
    </div>
    <div class="col-md-6 col-sm-12 order-md-1">
        <img class="start_img" src="IMAGES/bedroom2.jpg">
    </div>
</div>

<hr>

<div class="row featurette">
    <div class="col-md-6">
        <h2 class="featurette-heading fw-normal lh-1">Are you full of ideas?</h2>
        <p class="lead">Register and share your recipes with us!</p>
    </div>
    <div class="col-md-5">
        <img class="start_img" src="IMAGES/bedroom3.jpg">
    </div>
</div>

<!-- Az egyetlen véletlenszerűen kiválasztott szoba megjelenítése -->
<div class="container">
    <div class="home">
        <div class="row">
            <div class="picture col-md-6 col-lg-6 col-sm-6 col-6 d-flex justify-content-center align-items-center">
                <?php
                // Ha van kép a szobához, akkor jelenítsük meg
                if (!empty($room['RoomPic'])) {
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($room['RoomPic']).'" class="img-fluid" alt="Room Image">';
                } else {
                    echo '<p>No images found for this room.</p>';
                }
                ?>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-6 d-flex justify-content-center align-items-center">
                <div class="room-details">
                    <h2 class="city-name"><?php echo htmlspecialchars($room['City']); ?></h2>
                    <p class="data">Address: <?php echo htmlspecialchars($room['Address']); ?></p>
                    <p class="data">Square Meters: <?php echo htmlspecialchars($room['SquareMeters']); ?></p>
                    <p class="data">Smoking: <?php echo htmlspecialchars($room['Smoking'] ? 'Yes' : 'No'); ?></p>
                    <p class="data">Parking: <?php echo htmlspecialchars($room['Parking'] ? 'Yes' : 'No'); ?></p>
                    <p class="data">Pet: <?php echo htmlspecialchars($room['Pet'] ? 'Yes' : 'No'); ?></p>
                    <p class="data">Children: <?php echo htmlspecialchars($room['Children'] ? 'Yes' : 'No'); ?></p>
                    <p class="data">Kitchen: <?php echo htmlspecialchars($room['Kitchen'] ? 'Yes' : 'No'); ?></p>
                    <p class="data">Bathroom: <?php echo htmlspecialchars($room['Bathroom']); ?></p>
                    <p class="data">Living Room: <?php echo htmlspecialchars($room['LivingRoom'] ? 'Yes' : 'No'); ?></p>
                    <!-- További részletek -->
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
