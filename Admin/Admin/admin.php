<?php
require 'db_config.php';
require "functions.php";

$sql = "SELECT * FROM person";
if ($result = $connection->query($sql)) {
    // Process your results
} else {
    echo "Error: " . $connection->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEKA - Admin</title>
</head>
<body>
<div class="topnav">


</div>
<h1 class="cim">Admin site</h1>
<?php //if (isset($update) || isset($add_new)) { ?>
    <h2 class="form"></h2>
    <form class="form" method="GET">
        <input type="hidden" name="operation" value="update:<?php echo $update['PersonID']; ?>">
        <div class="updateitem">
            <label for="First Name">First Name</label>
            <input placeholder="First Name" name="First Name" type="text"
                   value="<?php if (isset($update)) { echo $update['FirstName'];} ?>">
        </div>
        <div class="updateitem">
            <label for="Last Name">Last Name</label>
            <input placeholder="Last Name" name="Last Name" type="text"
                   value="<?php if (isset($update)) { echo $update['LastName'];} ?>">
        </div>
        <div class="updateitem">
            <label for="IDPIC">ID picture</label>
            <input placeholder="ID Picture" name="IDPic" type="text"
                   value="<?php if (isset($update)) { echo $update['IDPic'];} ?>">
        </div>
        <div class="updateitem">
            <label for="Verification">Verification</label>
            <input placeholder="Verification" name="Verification" type="text"
                   value="<?php if (isset($update)) { echo $update['Verification']; } ?>">
        </div>
        <div class="updateitem">
            <label for="Gender">Gender</label>
            <input placeholder="Gender" name="Gender" type="text"
                   value="<?php if (isset($update)) { echo $update['Gender']; } ?>">
        </div>
        <div class="updateitem">
            <label for="DateOfBirth">DateOfBirth</label>
            <input placeholder="DateOfBirth" name="DateOfBirth" type="Date"
                   value="<?php if (isset($update)) { echo $update['DateOfBirth']; } ?>">
        </div>
        <div class="updateitem">
            <label for="EmailAddress">EmailAddress</label>
            <input placeholder="EmailAddress" name="EmailAddress" type="email"
                   value="<?php if (isset($update)) { echo $update['EmailAddress']; } ?>">
        </div>
        <div class="updateitem">
            <label for="Password">Password</label>
            <input placeholder="Password" name="Password" type="password"
                   value="<?php if (isset($update)) { echo $update['Password']; } ?>">
        </div>
        <div class="updateitem">
            <label for="PhoneNumber">honeNumber</label>
            <input placeholder="PhoneNumber" name="PhoneNumber" type="text"
                   value="<?php if (isset($update)) { echo $update['PhoneNumber']; } ?>">
        </div>
        <div class="updateitem">
            <label for="Address">Address</label>
            <input placeholder="Address" name="Address" type="text"
                   value="<?php if (isset($update)) { echo $update['Address']; } ?>">
        </div>
        <div class="updateitem">
            <label for="City">City</label>
            <input placeholder="City" name="City" type="text"
                   value="<?php if (isset($update)) { echo $update['City']; } ?>">
        </div>
        <div class="updateitem">
            <label for="Zip">Zip</label>
            <input placeholder="Zip" name="Zip" type="text"
                   value="<?php if (isset($update)) { echo $update['Zip']; } ?>">
        </div>
        <div class="updateitem">
            <label for="Nationality">Nationality</label>
            <input placeholder="Nationality" name="Nationality" type="text"
                   value="<?php if (isset($update)) { echo $update['Nationality']; } ?>">
        </div>
        <div class="updateitem">
            <label for="Picture">Profile picture</label>
            <input placeholder="Picture" name="Picture" type="text"
                   value="<?php if (isset($update)) { echo $update['Picture']; } ?>">
        </div>

        <button class="uj" type="submit" name="submit" value="true">Update</button>
    </form>
<div class="roomlist">
    <form method="GET" class="form">
        <table>
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>IDPic</th>
                <th>Verification</th>
                <th>Gender</th>
                <th>DateOfBirth</th>
                <th>EmailAddress</th>
                <th>Password</th>
                <th>PhoneNumber</th>
                <th>Address</th>
                <th>City</th>
                <th>Zip</th>
                <th>County</th>
                <th>Nationality</th>
                <th>Picture</th>
            </tr>
            <?php
            foreach ($result as $key => $value)
            {
                echo '<tr>
                        <td>' . $value['FirstName'] . '</td>
                        <td>' . $value['LastName'] . ' </td>
                        <td>' . $value['IDPic'] . ' </td>                      
                        <td><img src="../' . $value['IDPic'] . '" alt="ID picture" width="300px" height="300px" 
                        style="border: #ffdbdc 5px solid"></td>
                        <td>' . $value['Verification'] . ' </td>   
                        <td>' . $value['Gender'] . ' </td>   
                        <td>' . $value['DateOfBirth'] . ' </td>   
                        <td>' . $value['EmailAddress'] . ' </td>   
                        <td>' . $value['Password'] . ' </td>  
                        <td>' . $value['PhoneNumber'] . ' </td> 
                        <td>' . $value['Address'] . ' </td> 
                        <td>' . $value['City'] . ' </td> 
                        <td>' . $value['Zip'] . ' </td>  
                        <td>' . $value['County'] . ' </td>  
                        <td>' . $value['Nationality'] . ' </td>  
                        <td>' . $value['Picture'] . ' </td> 
                           <td><img src="../' . $value['Picture'] . '" alt="Profile picture" width="300px" height="300px" 
                        style="border: #ffdbdc 5px solid"></td>                  
                        <td> <button type="submit" name="operation" value="update:' . $value['PersonID'] . '">Update</button></td>
                        <td><button type="submit" name="operation" value="delete:' . $value['PersonID'] . '">Delete</button></td>
                    </tr>';
            }
            ?>
        </table>
    </form>
</body>
</html>