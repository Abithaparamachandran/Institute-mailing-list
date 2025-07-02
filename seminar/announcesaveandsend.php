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

<?php $type=$_GET['type']; $useremail=$_GET['useremail']; $id=$_GET['id'];?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="font.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

<section id="contact">
                        <div class="section-content">

<center><img src="newlogo.png"></center>

<h3>Post to Announce Mailing List</h3>

<span style="float:right;margin-right:8%;">
<a href="showsavedannounces.php?type=<?php echo $type;?>&useremail=<?php echo $z."@iitm.ac.in";?>" style="font-weight:bold;"><i class="fa fa-bookmark"></i>&nbsp;Saved Announces</a>
<i class="fa fa-user"></i>&nbsp;<?php echo $z;?>
&nbsp;&nbsp;<a href="logout.php" style="color:white;">Logout</a>
</span>

                        </div>
                        <div class="contact-section">
                        <div class="container">
<center>
<form method="post" id="register-form">

<div>

<?php
header('Content-Type: text/html; charset=utf-8');
$servername="localhost";
$username="Mailinglist";
$password="MailinG24List";
$databasename="seminar";
$conn=mysqli_connect($servername,$username,$password,$databasename);
if($conn){
	//echo"connected";
}else{
	echo"not connected";
}

mysqli_query('SET character_set_results=utf8');
mysqli_query('SET names=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_results=utf8');
mysqli_query('SET collation_connection=utf8_general_ci');

$result = mysqli_query("SET NAMES utf8");//the main trick
//break;
//exit;
$flag="0";
$result="select * from seminarorg where id='$id'";
$result1=mysqli_query($conn,$result);
        while ($row2 = mysqli_fetch_assoc($result1)) {
//        $_SESSION['id']=$row2['id'];
        $a_type=$row2['category'];
        $atitle=$row2['title'];
        $des=$row2['abstract'];
        $sender=$row2['sender'];
        $email=$row2['email'];
        $other=$row2['others'];
        $filename=$row2['filename'];
        $filelocation=$row2['filelocation'];
        $imagechecker=$row2['remindermail'];

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

/*$filecid="1001";
$filename = $_FILES["fileToUpload"]["name"];
if(empty($filename)){ } else {
$nam="announce".date("d-m-Y H:i");
$fullpath = 'https://eservices2.iitm.ac.in/seminar/upload/'.$nam;
}
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$location = '/var/www/html/seminar/upload/'.$nam;
if(move_uploaded_file($tmp_name, $location)){
$mail->AddEmbeddedImage($location, $filecid, $nam, "base64", "image/jpg");
}
*/
$filecid="1001";
$location = '/var/www/html/seminar/upload/'.$filename;
//$mail->AddEmbeddedImage($location, $filecid, $filename, "base64", "image/jpg");

$mail->addAddress("announce@list.iitm.ac.in");

$mail->isHTML(true);

$mail->Subject ="[".$a_type."]".$atitle;

$mail->Body .= $des."<br>";

if(empty($other))
{
$mail->Body .="";
}
else{
$mail->Body .= "<font>Other Information:</font>".$other."<br>";
}

$mail->Body .= "<font>".$sender."</font><br>";

if(empty($imagechecker)){ }
else{
if(empty($filelocation))
{
$mail->Body .="";
}
else{
//$mail->AddAttachment(".$fielocation.");
//$mail->Body .= "<img src='cid:1001' style=width:40%;height:auto;><br><br>";
//$mail->Body .= "<img src='$filelocation'><br><br>";
$mail->Body .= "<br><img src='$location'><br><br>";
}
}

if(!$mail->send()) {
echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else {
	$servername="localhost";
	$username="Mailinglist";
	$password="MailinG24List";
	$databasename="seminar";
	$conn=mysqli_connect($servername,$username,$password,$databasename);
	if($conn){
		//echo"connected";
	}else{
		echo"not connected";
	}

mysqli_query('SET character_set_results=utf8');
mysqli_query('SET names=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_results=utf8');
mysqli_query('SET collation_connection=utf8_general_ci');

$result = mysqli_query("SET NAMES utf8");//the main trick

$query = "update seminarorg set flag='0' where email='$useremail' and flag='1' and id='$id'";
//$result = mysql_query($sql);
$result1=mysqli_query($conn,$result);
while($row=mysqli_fetch_array($result1))
//if (!mysql_query($query,$conn))
  {
  die('Error: ' . mysql_error());
  }
echo '<div class="alert alert-success">"Thank you! Announce Submitted Successfully...!";</div>';


}//else loop for php mailer
}
?>



</div>
</form>
</center>
                        </div>
                        </div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><center><font>Copyright © 2024 All rights reserved | Developed and Maintained by <a style="cursor:point;color:white;" href="http://eservices.iitm.ac.in">Eservices,Computer Centre,IITM</font></center><br>
                </section>

