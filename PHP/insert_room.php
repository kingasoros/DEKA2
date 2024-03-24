<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $squareMeters = $_POST['squareMeters'];
    $smoking = $_POST['smoking'];
    $parking = $_POST['parking'];
    $pet = $_POST['pet'];
    $children = $_POST['children'];
    $kitchen = $_POST['kitchen'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $bathroom = $_POST['bathroom'];
    $livingRoom = $_POST['livingRoom'];
    $numberOfBeds = $_POST['numberOfBeds'];

    // Prepare and bind parameters for room insertion
    $stmtRoom = $conn->prepare("INSERT INTO room (SquareMeters, Smoking, Parking, Pet, Children, Kitchen, Address, City, Zip, Bathroom, LivingRoom, NumberOfBeds) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmtRoom->bind_param("isssssssisii", $squareMeters, $smoking, $parking, $pet, $children, $kitchen, $address, $city, $zip, $bathroom, $livingRoom, $numberOfBeds);

    // Execute the room insertion
    if ($stmtRoom->execute()) {
        // Room inserted successfully
        $roomID = $stmtRoom->insert_id; // Get the ID of the last inserted room

        // Close the statement
        $stmtRoom->close();

        // Close connection
        $conn->close();

        // Send JSON response with success and roomID
        echo json_encode(array("success" => true, "roomID" => $roomID));
    } else {
        // Error inserting room
        echo json_encode(array("success" => false, "error" => "Error inserting room"));
    }

    // Exit the script after sending the JSON response
    exit();
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <title>BizKod_DEKA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/main_main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
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
                    <a class="nav-link mx-2 active bg-warning rounded" aria-current="page" href="../index0.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="search.php">Rooms</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Company
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="../about_us.html">About Us</a></li>
                    </ul>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="roomForm">
                    <div class="mb-3">
                        <label for="squareMeters" class="form-label">Square Meters</label>
                        <input type="number" class="form-control" id="squareMeters" name="squareMeters">
                    </div>
                    <div class="mb-3">
                        <label for="smoking" class="form-label">Smoking Allowed?</label>
                        <select class="form-select" id="smoking" name="smoking">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="parking" class="form-label">Parking Available?</label>
                        <select class="form-select" id="parking" name="parking">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pet" class="form-label">Pet Allowed?</label>
                        <select class="form-select" id="pet" name="pet">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="children" class="form-label">Children Allowed?</label>
                        <select class="form-select" id="children" name="children">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kitchen" class="form-label">Kitchen Available?</label>
                        <select class="form-select" id="kitchen" name="kitchen">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="mb-3">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="number" class="form-control" id="zip" name="zip">
                    </div>
                    <div class="mb-3">
                        <label for="bathroom" class="form-label">Bathroom Available?</label>
                        <select class="form-select" id="bathroom" name="bathroom">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="livingRoom" class="form-label">Living Room Available?</label>
                        <select class="form-select" id="livingRoom" name="livingRoom">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="numberOfBeds" class="form-label">Number of Beds</label>
                        <input type="number" class="form-control" id="numberOfBeds" name="numberOfBeds">
                    </div>
                    <button type="button" class="btn btn-primary" id="saveRoom">Next</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Next Modal -->
<div class="modal fade" id="nextModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Next Step</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display room ID here -->
                <p> Room added succesfully!</p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('saveRoom').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default form submission behavior

            var form = document.getElementById('roomForm');
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Parse the response JSON
                        var response = JSON.parse(xhr.responseText);

                        if (response.success) {
                            // Log the roomID to the console
                            console.log("RoomID:", response.roomID);

                            // Reset the form after successful insertion
                            form.reset();

                            // Close the current modal and open the next one
                            $('#exampleModal').modal('hide');
                            $('#nextModal').modal('show');
                        } else {
                            // Insertion failed, log the error
                            console.error('Error:', response.error);
                            alert('Error: ' + response.error); // Notify user of insertion failure
                        }
                    } else {
                        // Error occurred in the request
                        console.error('Error:', xhr.statusText);
                        alert('Error: ' + xhr.statusText); // Notify user of request failure
                    }
                }
            };

            xhr.open('POST', '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(new URLSearchParams(formData));
        });
    });
</script>



</body>
</html>