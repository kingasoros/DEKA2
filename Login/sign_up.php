<!DOCTYPE html>
<html>
<head>
    <title>Sign_up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../main_css.css">
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
<body data-bs-spy="scroll" data-bs-target=".navbar" data-offset="50" >
<nav class="navbar navbar-expand-sm fixed-top">
    <div class="logo">
        <img src="logo.svg" alt="Logo Image">
    </div>
    <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Solutions</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a class="login-button" href="Login/login.php">Login</a></li>
        <li><a class="join-button" href="Login/sign_up.php">Join</a></li>
    </ul>
    <div class="dark-mode-toggle" onclick="toggleDarkMode()">
        <i class="fas fa-toggle-on"></i>
    </div>
</nav>

<script src="../nav.js"></script>


<div class="form_login">
    <form action="sign_up_check.php" method="post">
        <h2>SIGN UP</h2>
           
        <?php if(isset($_GET['error'])){
        ?>
        <p class="error"> <?php echo $_GET['error'] ?> </p>
        <?php } ?>   
        
        <?php if(isset($_GET['success'])){
        ?>
        <p class="success"> <?php echo $_GET['success'] ?> </p>
        <?php } ?>

        <label>First Name</label>
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
        
        <label>Last Name</label>
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

        <label for="verification">Verification:</label><br>
        <input type="radio" id="yes" name="verification" value="yes" class="ver">
        <label class="ver" for="yes">Yes</label>
        <input class="ver" type="radio" id="no" name="verification" value="no">
        <label class="ver" for="no">No</label>

        <label>Password</label>
        <input type="password" 
               name="password" 
               placeholder="Password"><br>

        <label>Re_Password</label>
        <input type="password" 
               name="re_password" 
               placeholder="Re Password"><br>

        <button class="submit_2" type="submit">Sign Up</button>
        <a href="index.php" class="ca">Already have an account?</a><br>
        <a href="../main.html" class="ca">Back</a>
    </form>
</div>
</body>
</html>
