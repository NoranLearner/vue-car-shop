<?php 

$dsn = 'mysql:host=localhost;dbname=CarShop'; // Data Source Name

$user = 'root'; // The User To Connect

$pass = ''; // Password Of This User

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $db = new PDO($dsn, $user,$pass, $options); // Start A New Connection Wth PDO Class
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = "INSERT INTO `cars` (name, price, modelYear, description, carImage) VALUES ('hyundai', 2000000, 2006, 'nice', 'myImg.png')";
    $db->exec($q);
    // echo 'You are connected';
} catch (PDOException $e) {
    echo 'Failed' . $e->getMessage();
}

?>