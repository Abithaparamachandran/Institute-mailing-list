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

<?php $type=$_GET['type']; ?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="font.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<style>
</style>


<section id="contact">
                        <div class="section-content">

<center>
<div class="tab">
<img src="newlogo.png"alt="logo"align="center"></img>
</center>

<br>
<h3>Post to Event Mailing List</h3>


                        </div>
                        <div class="contact-section">
                        <div class="container">
<center>
<form method="post" id="register-form">

<div>
<?php

header('Content-Type: text/html; charset=utf-8');

$welcome=  $_POST['welcome'];
if(empty($_POST['etype'])){
$e_type=$_POST['e_type'];
}
else{
$e_type=$_POST['etype'];
}
$email=  $_POST['email'];
$venue=  $_POST['venue'];
$sender=  $_POST['sender'];
$date=  $_POST['datetime'];
$e_name= $_POST['e_name'];
$e_nameinsert  =addslashes($_POST['e_name']);
$e_des= $_POST['e_des'];
$e_desinsert  =addslashes($_POST['e_des']);
$other= $_POST['other'];

$timestamp=date('Y-m-d H:i:s');
$status="Active";

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Host = 'smtp2.iitm.ac.in';
$mail->SMTPAuth = true;
$mail->Username = 'ebind';
$mail->Password = 'pgSiitmcc';
$mail->SMTPSecure = 'tls';
$mail->Port = 25;

$mail->From= $email;
$mail->FromName = $email;

//$filecid="1001";
$filename = $_FILES["fileToUpload"]["name"];
if(empty($filename)) { } else {
$nam="event".date("d-m-Y H:i");
$fullpath = 'https://eservices2.iitm.ac.in/seminar/upload/'.$nam;
}
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$location = '/var/www/html/seminar/upload/'.$nam;
if(move_uploaded_file($tmp_name, $location)){
//$mail->AddEmbeddedImage($location, $filecid, $nam, "base64", "image/jpg");
}

$mail->addAddress("ccprj05@iitm.ac.in");

$mail->isHTML(true);

$mail->Subject ="[".$e_type."]".$e_namenew;

if(empty($welcome))
{
$mail->Body .="";
}
else{
$mail->Body .= $welcome."<br>";
}

//$mail->Body .= "<img src='cid:1001' style=width:70%;height:auto;>";

$mail->Body .="
<table>
<tr><td style=width:16%;color:#000066;font-weight:bold;>Event Title:</td><td>".$e_name."</td></tr>
<tr><td style=color:#000066;font-weight:bold;>Date/Time:</td><td>".$date."</td></tr>
<tr><td style=color:#000066;font-weight:bold;>Venue:</td><td>".$venue."</td></tr></table>";

if(empty($e_des))
{
$mail->Body .="";
}
else{
$mail->Body .= "<br><font style=color:#000066;font-weight:bold;>About Event:</font><br>".nl2br($e_des)."<br>";
}

if(empty($nam)){
$mail->Body .="";
}
else{
//$mail->Body .= "<br><img src='cid:1001' style=width:70%;height:auto;>";
$mail->Body .= "<img src='$fullpath'>";
}

if(empty($other))
{
$mail->Body .="";
}
else{
$mail->Body .= "<br><font style=color:#000066;font-weight:bold;>Other Information:</font>".$other."<br><br>";
}

$mail->Body .= "<br><br><font style=color:#000066;font-weight:bold;>".$sender."</font>";


if(!$mail->send()) {
echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else {

	$servername="10.24.8.213";
	$username="root";
	$password="Password1";
	$databasename="seminar";
	$conn=mysqli_connect($servername,$username,$password,$databasename);
	if($conn){
		//echo"connected";
	}else{
		//echo"not connected";
	}


mysqli_query('SET character_set_results=utf8');
mysqli_query('SET names=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_results=utf8');
mysqli_query('SET collation_connection=utf8_general_ci');

$result = mysqli_query("SET NAMES utf8");//the main trick

//$query = "INSERT INTO seminarorg (id,type,seminareventtype,welcome,title,speaker,biography,affiliation,department,date,reminder_date,remindermail,venue,abstract,sender,email,others)VALUES('','$type','$e_type','$welcome','$e_name','NULL','NULL','NULL','NULL','$date','NULL','NULL','$venue','$e_des','$sender','$email','$other')";
$query = "INSERT INTO seminarorg (type,category,welcome,title,date,venue,abstract,sender,email,others,filename,filelocation,modifiedtimestamp,status)VALUES('$type','$e_type','$welcome','$e_nameinsert','$date','$venue','$e_desinsert','$sender','$email','$other','$nam','$fullpath','$timestamp','$status')";

$result1=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result1))
//if (!mysqli_query($query,$conn))
  {
  die('Error: ' . mysqli_error());
  }
echo "Thank you! Event Submitted Successfully...!";


}//else loop for php mailer
?>



</div>
</form>
</center>
                        </div>
                        </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>><br><br>><br><br><br><br><br><br><br><br><br>
<br><br><center><font>Copyright © 2023 All rights reserved | Developed and Maintained by <a style="cursor:point;color:black;">Eservices,Computer Centre,IITM</font></center><br>
                </section>

