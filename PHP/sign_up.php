<!DOCTYPE html>
<html>
<head>
    <title>BizKod_DEKA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Guntur:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" style="text/css" href="style.css">
</head>
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
                    <a class="nav-link mx-2 active bg-warning rounded" aria-current="page" href="../index.html">Home</a>
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
                        <li><a class="dropdown-item" href="#">Contact us</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item mx-3">
                    <a class="nav-link text-light h4" href="login.php" target="blank">Login</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-light h4" href="sign_up.php" target="blank">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="../nav.js"></script>


<div class="form_login">
    <form action="sign_up_check.php" method="post">
        <h2>SIGN UP</h2>
           
        <?php if(isset($_GET['error'])){
        ?>
        <p class="error"> <?php echo $_GET['error'] ;?> </p>
        <?php } ?>   
        
        <?php if(isset($_GET['success'])){
        ?>
        <p class="success"> <?php echo $_GET['success'] ;?> </p>
        <?php } ?>

        <label>First Name:</label>
        <?php if(isset($_GET['f_name'])) {?>
            <input type="text" 
                   name="f_name" 
                   placeholder="FirstName" 
                   value="<?php echo $_GET['f_name']; ?>"><br>
        <?php }else{ ?>
            <input type="text" 
                   name="f_name" 
                   placeholder="FirstName"><br>
        <?php }?>
        
        <label>Last Name:</label>
        <?php if(isset($_GET['l_name'])) {?>
            <input type="text" 
                   name="l_name" 
                   placeholder="LastName" 
                   value="<?php echo $_GET['l_name']; ?>"><br>
        <?php }else{ ?>
            <input type="text" 
                   name="l_name" 
                   placeholder="LastName"><br>
        <?php }?>

        <label for="gender">Gender:</label>
        <select>
        <option value="">Please select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
        </select>

        <?php
        $errorMessage = ""; // Initialize an error message variable
        $initialDefaultDate = '2005-01-01'; // Set an initial default date

        // Determine the display date: submitted value or initial default
        $displayDate = isset($_GET['birthday']) ? $_GET['birthday'] : $initialDefaultDate;

        // Check if a birthday has been submitted
        if (isset($_GET['birthday']) && !empty($_GET['birthday'])) {
            $userDob = $_GET['birthday'];
            $dob = new DateTime($userDob); // Convert the birthday to a DateTime object
            $today = new DateTime('today'); // Get today's date
            $age = $dob->diff($today)->y; // Calculate the age

            // If age is less than 18, set an error message
            if ($age < 18) {
                $errorMessage = "You must be at least 18 years old.";
            }
        }
        ?>

    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="birthday" value="<?php echo htmlspecialchars($displayDate); ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="example@gmail.com">

            <label>Address:</label>
            <?php if(isset($_GET['l_name'])) {?>
                <input type="text"
                       name="address"
                       placeholder="Address"
                       value="<?php echo $_GET['address']; ?>"><br>
            <?php }else{ ?>
                <input type="text"
                       name="address"
                       placeholder="Address"><br>
            <?php }?>

            <label for="city">City:</label>
                <select id="city" name="city" onchange="checkCustomOption(this)">
                    <option value="">Please select</option>
                    <option value="belgrade">Belgrade</option>
                    <option value="novi sad">Novi Sad</option>
                    <option value="kragujevac">Kragujevac</option>
                    <option value="subotica">Subotica</option>
                    <option value="zrenjanin">Zrenjanin</option>
                    <option value="pančevo">Pancevo</option>
                    <option value="užice">Užice</option>
                    <option value="niš">Niš</option>
                    <option value="čačak">Čačak</option>

                    <option value="custom" <?php echo $customOption == "custom" ? "selected" : ""; ?>>Other</option>
                </select>
            <div id="othersInput" style="display:none;">
                <label for="otherInput">Enter Other Option:</label>
                <input type="text" id="otherInput">
            </div>

        <script src="../nav.js"></script>

        <label>Password:</label>
        <input type="password" 
               name="password" 
               placeholder="Password"><br>

        <label>Reenter Password:</label>
        <input type="password" 
               name="re_password" 
               placeholder="Re Password"><br>

        <button class="submit_2" type="submit">Sign Up</button>
        <a href="login.php" class="ca">Already have an account?</a><br>
        <a href="../index.html" class="ca">Back</a>
    </form>
</div>
</body>
</html>