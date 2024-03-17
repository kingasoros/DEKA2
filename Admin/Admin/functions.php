<?php
require 'db_config.php';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $db);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_GET['operation'])) {
    $operation = $_GET['operation'];

    if ($operation === 'add_new') {
        if (isset($_GET['submit'])) {
            $sql_array = [];

            $exceptions = ['submit', 'operation'];
            foreach ($_GET as $key => $value) {
                if (!in_array($key, $exceptions)) {
                    $sql_array[] = "{$key} = '" . $connection->real_escape_string($value) . "'";
                }
            }

            $sql = "INSERT INTO person SET " . implode(', ', $sql_array);
            if ($connection->query($sql) === TRUE) {
                echo "Successfully updated";
            } else {
                echo "Update failed. " . $connection->error;
            }
        }
    } else {
        list($action, $id) = explode(':', $operation);

        $sql_array = [];
        if (isset($_GET['submit'])) {
            $exceptions = ['submit', 'operation'];
            foreach ($_GET as $key => $value) {
                if (!in_array($key, $exceptions)) {
                    $sql_array[] = "{$key} = '" . $connection->real_escape_string($value) . "'";
                }
            }
        }

        switch ($action) {
            case 'update':
                if (isset($_GET['submit'])) {
                    $sql = "UPDATE person SET " . implode(', ', $sql_array);
                    $sql .= " WHERE PersonID = '" . $connection->real_escape_string($id) . "'";
                } else {
                    $sql = "SELECT * FROM person WHERE PersonID = " . $connection->real_escape_string($id);
                    if ($result = $connection->query($sql)) {
                        $update = $result->fetch_assoc();
                    }
                }
                break;
            case 'delete':
                $sql = "DELETE FROM person WHERE  PersonID = " . $connection->real_escape_string($id);
                break;
        }

        if (isset($_GET['submit']) || $action == 'delete') {
            if ($connection->query($sql) === TRUE) {
                echo "Succesfully deleted.";
            } else {
                echo "Deleting failed. " . $connection->error;
            }
        }
    }
}

$sql = "SELECT * FROM person";
$products = [];
if ($result = $connection->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>