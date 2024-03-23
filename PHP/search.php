<!DOCTYPE html>
<html lang="en">
<head>
    <title>BizKod_DEKA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="../CSS/main_main.css">
    <link rel="stylesheet" type="text/css" href="../CSS/search.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    .room {
        border: 1px solid #000000;
    }
</style>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1 fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bi bi-house-door"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 active bg-warning rounded" aria-current="page" href="../index0.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="search.php">Rooms</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link mx-2 " href="../about_us.html">
                        Company
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item mx-3">
                    <a class="nav-link text-light h4" href="index.php" target="blank">Login</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-light h4" href="sign_up.php" target="blank">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="search_main  container-fluid mt-5 border p-3 mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="search.php" method="get">
                <div class="input-group mb-3">
                    <i class="bi bi-pin-map-fill m-3"></i>
                    <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                </div>
            </form>

        </div>
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <div class="col-md-3 col-lg-4 col-sm-12 col-12">
                    <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-3 col-lg-4 col-sm-12 col-12">
                    <label for="checkin">Check-in:</label>
                    <input type="date" id="checkin" name="checkin">
                    <label for="checkout">Check-out:</label>
                    <input type="date" id="checkout" name="checkout">
                </div>
                <script>
                    let visible = false;

                    document.getElementById("dropdownMenuButton3").addEventListener("click", function() {
                        if (!visible) {
                            document.getElementById("hiddenDiv").style.display = "block";
                            visible = true;
                        } else {
                            document.getElementById("hiddenDiv").style.display = "none";
                            visible = false;
                        }
                    });
                </script>
            </div>
        </div>
    </div>
    <div id="hiddenDiv" class="hidden_div" style="display: none;">
        <div class="hidde_choose">
            <label for="Smoking" class="col-md-6 col-lg-2 col-sm-6 col-6">Smoking</label>
            <select id="Smoking" name="smoking">
                <option value="0" selected>No</option>
                <option value="1">Yes</option>
            </select>
            <label for="Parking" class="col-md-6 col-lg-2 col-sm-6 col-6">Parking</label>
            <select id="Parking" name="parking">
                <option value="0" selected>No</option>
                <option value="1">Yes</option>
            </select>
            <label for="Pet" class="col-md-6 col-lg-2 col-sm-6 col-6">Pet</label>
            <select id="Pet" name="pet">
                <option value="0" selected>No</option>
                <option value="1">Yes</option>
            </select>
            <label for="Children" class="col-md-6 col-lg-2 col-sm-6 col-6">Children</label>
            <select id="Children" name="children">
                <option value="0" selected>No</option>
                <option value="1">Yes</option>
            </select>
            <label for="Kitchen" class="col-md-6 col-lg-2 col-sm-6 col-6">Kitchen</label>
            <select id="Kitchen" name="kitchen">
                <option value="0" selected>No</option>
                <option value="1">Yes</option>
            </select>
            <label for="LivingRoom" class="col-md-6 col-lg-2 col-sm-6 col-6">LivingRoom</label>
            <select id="LivingRoom" name="livingroom">
                <option value="0" selected>No</option>
                <option value="1">Yes</option>
            </select>
            <label for="Gender" class="col-md-6 col-lg-2 col-sm-6 col-6">Gender</label>
            <select id="Gender" name="gender">
                <option value="Male" selected>Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="NumberOfBeds" class="col-md-6 col-lg-2 col-sm-6 col-6">Number of Beds</label>
            <select id="NumberOfBeds" name="beds">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>


<?php
$host = "localhost";
$username = "root";
$password = "root";
$db_123 = "bizkod2_3";


$conn = mysqli_connect("$host","$username", "$password", "$db_123") or die(mysqli_error($connection));


$rooms = []; // Initialize an empty array to store room data

if (isset($_GET['search']) && !empty($_GET['search'])) {
    // The user submitted a search query
    $searchTerm = $_GET['search'];
    // Prepare a SELECT statement to fetch rooms matching the search term
    $stmt = $conn->prepare("SELECT * FROM `room` WHERE `City` LIKE ?");
    $searchTerm = "%$searchTerm%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row; // Store each fetched row in the array
    }
    $stmt->close();
} else {
    // No search query; fetch all rooms
    $result = $conn->query("SELECT * FROM `room`");

    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row; // Store each fetched row in the array
    }
}
?>

    <?php if (!empty($rooms)): ?>
        <div class="room-results">
            <?php foreach ($rooms as $room): ?>
                <div class="container">
                    <div class="row border">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-6 b-1 d-flex justify-content-center">
                            <!-- Fetch and display images for this room -->
                            <?php
                            // Prepare a SELECT statement to fetch images for this room
                            $stmt = $conn->prepare("SELECT `RoomPic` FROM `roompic` WHERE `RoomID` = ?");
                            $stmt->bind_param("i", $room['RoomID']);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Check if there are images for this room
                            if ($result->num_rows > 0) {
                                // Fetch and display the first image
                                $row = $result->fetch_assoc();
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['RoomPic']).'" class="img-fluid" alt="Room Image">';
                            } else {
                                // No images found for this room
                                echo '<p>No images found for this room.</p>';
                            }

                            // Close the statement
                            $stmt->close();
                            ?>
                        </div>
                        <table class="table table-hover">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-6 ">
                            <h2><?php echo htmlspecialchars($room['City']); ?></h2>
                            <p>Address: <?php echo htmlspecialchars($room['Address']); ?></p>
                            <p>Square Meters: <?php echo htmlspecialchars($room['SquareMeters']); ?></p>
                            <p>Smoking: <?php echo htmlspecialchars($room['Smoking'] ? 'Yes' : 'No'); ?></p>
                            <p>Parking: <?php echo htmlspecialchars($room['Parking'] ? 'Yes' : 'No'); ?></p>
                            <p>Pet: <?php echo htmlspecialchars($room['Pet'] ? 'Yes' : 'No'); ?></p>
                            <p>Children: <?php echo htmlspecialchars($room['Children'] ? 'Yes' : 'No'); ?></p>
                            <p>Kitchen: <?php echo htmlspecialchars($room['Kitchen'] ? 'Yes' : 'No'); ?></p>
                            <p>Bathroom: <?php echo htmlspecialchars($room['Bathroom']); ?></p>
                            <p>Living Room: <?php echo htmlspecialchars($room['LivingRoom'] ? 'Yes' : 'No'); ?></p>
                            <!-- Include other details as needed -->
                        </div></table>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No rooms found for the specified search criteria.</p>
    <?php endif; ?>

</body>
</html>
