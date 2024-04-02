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

// CRUD Operation
if ($action == "read") {
    $results["calling_read"] = true;
}


echo json_encode($results);

?>