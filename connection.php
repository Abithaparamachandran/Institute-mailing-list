<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "***";
$username = "***";
$password = "***";
$databasename = "***";
$conn = mysqli_connect($servername, $username, $password, $databasename);
if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, 'SET character_set_results=utf8');
mysqli_query($conn, 'SET names=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');
mysqli_query($conn, 'SET collation_connection=utf8_general_ci');

$result = mysqli_query($conn, "SET NAMES utf8");
?>

