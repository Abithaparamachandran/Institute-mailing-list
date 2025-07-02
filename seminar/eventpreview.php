<?php
session_start();
if(!isset($_SESSION['usernamee'])) {
header("location:logout.php");
}
?>

<?php
session_start();
if(isset($_SESSION['usernamee'])) {
$z=$_SESSION['usernamee'];
}
?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="font.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<style>
body{
background-color:#048f94;
}
</style>
<section id="contact" style="padding-top:2px !important;height:auto !important;">
			<div class="section-content">
<h3 style="font-size:30px;">Post to Event Mailing List</h3>

			</div>
			<div class="contact-section">
			<div class="container">
			

<center>

<div style="width:95%;border:1px solid white;text-align:left;line-height:30px;padding:10px;background:#f9f6f6;color:black;">
<?php
$welcome=$_POST['welcome'];
if(empty($_POST['etype'])){
$e_type=$_POST['e_type'];
}
else{
$e_type=$_POST['etype'];
}
$sender =  $_POST['sender'];
$other =  $_POST['other'];
$dept=$_POST['dept'];
$phone=$_POST['phone'];
$venue =  $_POST['venue'];
$date =  $_POST['datetime'];
$e_name =  $_POST['e_name'];
$e_des = $_POST['e_des'];

$filename = $_FILES["fileToUpload"]["name"];
if(empty($filename)){ } else {
$nam="event".date("d-m-Y H:i");
$fullpath = '10.24.8.213/mailinglist/upload/'.$nam;
}
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$location = '/var/www/html/mailinglist/upload/'.$nam;
if(move_uploaded_file($tmp_name, $location)){
//
}
?>			  			
<h4><center>Preview of the Event will be posted</center></h4><br>

<?php echo $welcome; ?><br><br>
<font color="red">Event Subject : </font>[<?php echo $e_type;?>]<?php echo $e_name;?><br>
<font color="red">Title : </font> <?php echo $e_name;?><br>
<font color="red">Date/Time : </font><?php echo $date;?><br>
<font color="red">Venue : </font><?php echo $venue;?><br><br>

<?php
if(empty($e_des)){
//
}
else {
?>
<font color="red">About Event :</font><br>
<?php echo $e_des;?><br><br>
<?php } ?>

<?php
if(empty($filename)){ }
else { ?>
<img src="<?php echo $fullpath;?>" style="width:60%;height:auto;"><br><br>
<?php
}
?>

<?php
if(empty($other)){
//
}
else {
?>
<font color="red">Other Information :</font>
<?php echo $other;?><br><br>
<?php } ?>

<font color="red"><?php echo $sender;?></font>

</div>
</center>
			</div>
			</div>

<br><br><center><font style="font-size:15px;">Copyright © 2023 All rights reserved | Developed and Maintained by <a style="cursor:point;color:white;" href="http://eservices.iitm.ac.in">Eservices,Computer Centre,IITM</font></center><br>
		</section>
