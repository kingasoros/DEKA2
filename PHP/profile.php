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


<?php 

require "db_conn.php";
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PROFILE</title>
        <meta charset="UTF-8">
        <meta name="description" content="This website was created for a school.">
        <meta name="author" content="Kinga">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../CSS/style_1.css">

    </head>
    <body>
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
                    <a class="nav-link mx-2" href="insert_room.php">Rooms</a>
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
    
    <div class="container">
        <div class="row profile_things">
                <div class="col-md-6">
                    <img class="profile_img" src="">
                </div>
            <div class="col-md-6 datas">
                      <ul class="list-group mb-3" >
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                          <div>
                            <h6 class="my-0">First name</h6>
                          </div>
                          <span class="text-muted"><?php echo $_SESSION['first_name'];?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                          <div>
                            <h6 class="my-0">Last Name</h6>
                          </div>
                          <span class="text-muted"><?php echo $_SESSION['last_name'];?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                          <div>
                            <h6 class="my-0">Gender</h6>
                          </div>
                          <span class="text-muted"><?php echo $_SESSION['gender'];?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">Date Of Birth</h6>
                            </div>
                            <span class="text-muted"><?php echo $_SESSION['birth'];?></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">Email</h6>
                            </div>
                            <span class="text-muted"><?php echo $_SESSION['email'];?></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">Phone Number</h6>
                            </div>
                            <span class="text-muted"><?php echo $_SESSION['phone'];?></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">Address</h6>
                            </div>
                            <span class="text-muted"><?php echo $_SESSION['address'];?></span>
                          </li><li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">City</h6>
                            </div>
                            <span class="text-muted"><?php echo $_SESSION['city'];?></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">Zip</h6>
                            </div>
                            <span class="text-muted"><?php echo $_SESSION['zip'];?></span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">Nationality</h6>
                            </div>
                            <span class="text-muted"><?php echo $_SESSION['nationality'];?></span>
                          </li>
                    
                          <li class="list-group-item ">
                            <!-- <div class="d-grid gap-2">
                                <button class="btn btn-primary btn_edit" type="button">Edit</button>
                              </div> -->
                              <div class="d-grid gap-2">
                                <a class="btn btn-warning btn_edit" href="logout.php" type="button">Logout</a>
                              </div>
                          </li>
                      </ul>
              
                    </div>
            </div>
        </div>
    
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
    
    </body>
</html>