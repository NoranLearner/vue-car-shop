<?php

header('Access-Control-Allow-Origin: *');

$results = array();

$results["error"] = false;

$results["message"] = "";

// ------------------------------------------------------------------------ //

$dsn = 'mysql:host=localhost;dbname=vue-car-shop'; // Data Source Name

$user = 'root'; // The User To Connect

$pass = ''; // Password Of This User

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {

    $db = new PDO($dsn, $user, $pass, $options); // Start A New Connection Wth PDO Class

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $results["is_db_connected"] = true;
    $results["connection_msg"] = "Successfully Connected";

    echo 'You are connected' . "<br>";

} catch (PDOException $e) {

    $results["is_db_connected"] = false;
    $results["connection_msg"] = "Error";

    echo 'Failed' . $e->getMessage();

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

if ($action == "read") {
    $results["calling_read"] = true;
}

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



        } else {
            $results["error"] = true;
            $results["message"] = "Failed Saving Car Image, Try again!";
        }

    }

}

// ------------------------------------------------------------------------ //

echo json_encode($results);

?>