<?php 
$servername= "localhost";
$username = "root";
$password = "12345678";
$dbname = "lms_demo_2";

$con = new mysqli($servername, $username, $password, $dbname);

if($con === false){
	die("ERROR: Could not connect. " . $con->connect_error);
}

?>