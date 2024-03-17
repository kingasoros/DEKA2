<!DOCTYPE html>
<html>
<head>
    <title>BizKod_DEKA</title>
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
    <form action="upload_check.php" method="post">
        <h2>UPLOAD YOUR APARTMAN:</h2>
           
        <?php if(isset($_GET['error'])){
        ?>
        <p class="error"> <?php echo $_GET['error'] ?> </p>
        <?php } ?>   
        
        <?php if(isset($_GET['success'])){
        ?>
        <p class="success"> <?php echo $_GET['success'] ?> </p>
        <?php } ?>

        <label for="s_meters">Please enter the squarmeters of the room:</label>
        <input type="text" id="s_meters" name="s_meters" placeholder="squarmeters"><br>

        <label for="smoking">Smoking area?</label>
        <select name="smoking" id="smoking">
            <option value="" selected disabled>Choose...</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>


        <label for="parking">Is there parking area near by?</label>
        <select name="parking" id="parking">
            <option value="" selected disabled>Choose...</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>

        <label for="pet">Do you have a pet?</label>
        <select name="pet" id="pet">
            <option value="" selected disabled>Choose...</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>

        <label for="child">Do you have a children?</label>
        <select name="child" id="child">
            <option value="" selected disabled>Choose...</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>

        <label for="kitchen">Do you have separated kitchen?</label>
        <select name="kitchen" id="kitchen">
            <option value="" selected disabled>Choose...</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>

        <label for="address">Address:</label>
        <input type="address" id="myAddress" name="myAddress" placeholder="example street 0"><br>

        <label for="city">City:</label>
        <select name="city" id="city">
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
                    <option value="other" <?php echo $customOption == "custom" ? "selected" : ""; ?>>Other</option>
        </select>
        <div id="othersInput" style="display:none;">
                <label for="otherInput">Enter Other Option:</label>
                <input type="text" id="otherInput">
            </div>

            <script>
                document.getElementById('dropdown').addEventListener('change', function() {
                    var selectedOption = this.value;
                    if (selectedOption === 'others') {
                        document.getElementById('othersInput').style.display = 'block';
                    } else {
                        document.getElementById('othersInput').style.display = 'none';
                    }
                });
            </script>

        <label for="zip">What is your zip number?</label>
        <input type="text" id="zip" name="zip"><br>

        <label for="bathroom">Do you have a separated bathroom?</label>
        <select name="bathroom" id="bathroom">
            <option value="" selected disabled>Choose...</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>

        <label for="livingroom">Do you have a livingroom?</label>
        <select name="livingroom" id="livingroom">
            <option value="" selected disabled>Choose...</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select><br>

        <label for="beds">How many bed you have?</label>
        <input type="text" id="beds" name="beds"><br>

        <button class="submit_2" type="submit">Upload</button>
        <a href="../main.html" class="ca">Back</a>
    </form>
</div>
</body>
</html>
