<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect the user to the login page or display an error message
    header("Location: login.php");
    exit(); // Stop execution of the script
}

// Include the database connection file
require "db_conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Function to handle file upload
    function uploadFile($fieldName, $columnName)
    {
        global $conn; // Access the $conn variable defined outside the function

        // Check if file is uploaded successfully
        if ($_FILES[$fieldName]["error"] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES[$fieldName]["tmp_name"];
            $name = basename($_FILES[$fieldName]["name"]);
            $data = file_get_contents($tmp_name);

            // Prepare and execute query to insert image into database
            $stmt = $conn->prepare("UPDATE person SET $columnName = ? WHERE EmailAddress = ?");
            $stmt->bind_param("ss", $data, $_SESSION['email']);
            $stmt->execute();
            $stmt->close();

            return true; // File uploaded successfully
        } else {
            return false; // File upload failed
        }
    }

    // Upload ID Pic
    if (uploadFile("id_pic", "IDPic")) {
        echo "ID Pic uploaded successfully.<br>";
    } else {
        echo "ID Pic upload failed.<br>";
    }

    // Upload Profile Picture
    if (uploadFile("profile_pic", "Picture")) {
        echo "Profile Picture uploaded successfully.<br>";
    } else {
        echo "Profile Picture upload failed.<br>";
    }
}
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
        <script src="../script.js"></script>
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
    
    <div class="container">
        <div class="row profile_things">
            <div class="col-md-6">
                <?php
                // Include the database connection file
                require "db_conn.php";
                global $conn;
                // Query the person table for the user's profile picture
                $stmt = $conn->prepare("SELECT Picture FROM person WHERE EmailAddress = ?");
                $stmt->bind_param("s", $_SESSION['email']);
                $stmt->execute();
                $stmt->store_result();

                // Check if the profile picture exists
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($profilePicture);
                    $stmt->fetch();

                    // Output the profile picture
                    echo '<img class="profile_img" style="width: 70%;" src="data:image/jpeg;base64,' . base64_encode($profilePicture) . '" alt="Profile Picture">';
                } else {
                    // Display the default profile picture
                    echo '<img class="profile_img" style="width: 70%;" src="../profilelogo.png" alt="Default Profile Picture">';
                }

                // Close the statement
                $stmt->close();
                ?>
            </div>

            <div class="col-md-6 datas">
                      <ul class="list-group mb-3" contenteditable="true">
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
                            <div class="d-grid gap-2">
                                <button class="btn btn-warning btn_edit" type="button">Edit</button>
                              </div>
                          </li>
                      </ul>
              
                    </div>
            </div>
        </div>
    <div class="container">
        <div class="col-md-6">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <h6 class="text-danger">Upload your ID for verification!</h6>
                <input type="file" name="id_pic">
                <h6>Upload a profile picture. </h6>
                <input type="file" name="profile_pic">
                <button class="btn btn-warning btn_edit" type="submit">Save</button>
            </form>
        </div>
    </div>
    </body>
</html>