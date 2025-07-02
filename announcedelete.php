<?php
session_start();
if (!isset($_SESSION['usernamee'])) {
	    header("location: logout.php");
	        exit(); 
}

$z = $_SESSION['usernamee'];

if (!isset($_GET['type']) || !isset($_GET['id']) || !isset($_GET['useremail'])) {
	    
	    echo "Missing parameters";
	        exit();
}

$type = $_GET['type'];
$id = $_GET['id'];
$useremail = $_GET['useremail'];

include("connection.php");


$query = "DELETE FROM seminarorg WHERE id='$id'";

if (!mysqli_query($conn, $query)) {
	    die('Error: ' . mysqli_error($conn));
}


echo "<script>
	    if(confirm('Announce Deleted. Click OK to Go to Previous Page')) {
		            window.location.href = 'showsavedannounces.php?type=$type&useremail=$useremail';
			        }
</script>";
?>
