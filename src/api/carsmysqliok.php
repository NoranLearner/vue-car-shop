<?php 

// https://www.tutorialspoint.com/php/php_function_mysqli_query.htm

$servername = "localhost";
$username = "root"; // The User To Connect
$password = ""; // Password Of This User
$dbname = "CarShop";

$con = mysqli_connect($servername, $username, $password, $dbname);

mysqli_query($con, "CREATE TABLE IF NOT EXISTS my_team(ID INT, First_Name VARCHAR(255), Last_Name VARCHAR(255), Place_Of_Birth VARCHAR(255), Country VARCHAR(255))");
print("Table Created ..."."\n");

//Inserting a records into the my_team table
mysqli_query($con, "insert into my_team values(1, 'Shikhar', 'Dhawan', 'Delhi', 'India')");
mysqli_query($con, "insert into my_team values(2, 'Jonathan', 'Trott', 'CapeTown', 'SouthAfrica')");
mysqli_query($con, "insert into my_team values(3, 'Kumara', 'Sangakkara', 'Matale', 'Srilanka')");
mysqli_query($con, "insert into my_team values(4, 'Virat', 'Kohli', 'Delhi', 'India')");

print("Records Inserted ..."."\n");

//Inserting a records into the cars table

mysqli_query($con, "INSERT INTO `cars` (name, price, modelYear, description, carImage) VALUES ('hyundai', 2000000, 2006, 'nice', 'myImg.png')");

//Closing the connection
mysqli_close($con);

?>