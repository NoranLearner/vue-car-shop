<?php

header('Access-Control-Allow-Origin: *');
// ------------------------------------------------------------------------ //
$results = array();
$results["error"] = false;
$results["message"] = "";
// ------------------------------------------------------------------------ //
// Connect To Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vue-car-shop";
// Create connection
// https://stackoverflow.com/questions/10208691/do-i-need-a-php-mysql-connection-in-each-function-that-uses-database
// $connect = @mysql_connect($servername, $username, $password);
$connect = mysqli_connect($servername, $username, $password);
// Check connection
if (isset($connect) && isset($dbname)) {
    // $connect_db = @mysql_select_db($dbname);
    $connect_db = mysqli_select_db($connect, $dbname);
    if ($connect_db) {
        $results["is_db_connected"] = true;
        $results["connection_msg"] = "Connected successfully";
    } else {
        $results["is_db_connected"] = false;
        $results["connection_msg"] = "Error, Database is not found!";
    }
} else {
    // die("Connection failed: " . $conn->connect_error);
    // die('Unable to connect to database! Please try again later.');
    $results["is_db_connected"] = false;
    $results["connection_msg"] = "Error, Connection setup is not correct!";
}
// ------------------------------------------------------------------------ //
$action = "";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
// ------------------------------------------------------------------------ //
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
// ------------------------------------------------------------------------ //

// CRUD Operation

// ------------------------------//

if ($action == "read") {
    $results["calling_read"] = true;
}

// ------------------------------//

if ($action == "update") {

    // $results["calling_update"] = true;

    // files

    $imgName = "";

    $upload_path = "";

    if (isset($_FILES["carImage"]["name"])) {

        $img_name = $_FILES["carImage"]["name"];

        $valid_extensions = array("png", "jpg", "jpeg", "gif");

        $extensions = pathinfo($img_name, PATHINFO_EXTENSION);

        if (in_array($extensions, $valid_extensions)) {

            $newGeneratedId = generateRandomString(75);

            $upload_path = "../assets/cars/" . $newGeneratedId . "." . $extensions;

            if (file_exists($upload_path)) {
                $newGeneratedId = generateRandomString(75);
                $imgName = $newGeneratedId . "." . $extensions;
            } else {
                $imgName = $newGeneratedId . "." . $extensions;
            }

        } else {
            $results["error"] = true;
            $results["message"] = "Car Image has to be: jpg, png, jpeg, or gif";
        }

    } else {
        $results["error"] = true;
        $results["message"] = "Must select car image";
    }

    $results["newImageUploaded"] = $imgName;

    if ($imgName != "" && $upload_path != "") {

        $name = $_POST["name"];
        $price = $_POST["price"];
        $modelYear = $_POST["modelYear"];
        $description = $_POST["description"];

        // Add image to folder and Send data to DB

        if (move_uploaded_file($_FILES["carImage"]["tmp_name"], $upload_path)) {

            $results["added_new_car"] = true;

            // insert into DB
        }

    } else {
        $results["error"] = true;
        $results["message"] = "Failed Saving Car Image, Try again!";
        $results["added_new_car"] = false;
    }

}

// ------------------------------------------------------------------------ //
echo json_encode($results);
// ------------------------------------------------------------------------ //
// Disconnect Database
mysqli_close($connect);
?>