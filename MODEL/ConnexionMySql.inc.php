<?php



$DB_SERVER="localhost";
$DB_USER="root";
$DB_PASS="";
$DB_NAME="location_de_voiture";


$conn=mysqli_connect($DB_SERVER,$DB_USER,$DB_PASS);
mysqli_select_db($conn,$DB_NAME);


?>