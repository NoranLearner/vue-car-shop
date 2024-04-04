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
    } else{
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
// CRUD Operation

// ------------------------------//

if ($action == "read") {
    $results["calling_read"] = true;
}

// ------------------------------//


// ------------------------------------------------------------------------ //
echo json_encode($results);
// ------------------------------------------------------------------------ //
// Disconnect Database
mysqli_close($connect);
?>