<?php
session_start();
if(!isset($_SESSION['usernamee'])) {
header("location:logout.php");
}
$z=$_SESSION['usernamee'];
?>

<?php $type=$_GET['type']; 
$id=$_GET['id'];
$filenameold=$_SESSION['filename'];
$filelocationold=$_SESSIOn['filelocation'];
$imagechecker=$_SESSION['imagechecker'];
?>

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

<span style="float:right;margin-right:8%;"><i class="fa fa-user"></i>&nbsp;<?php echo $z;?>
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

if(empty($_POST['atype'])){
$a_type=$_POST['atypemain'];
}
else{
$a_type=$_POST['atype'];
}
$atitlepost=$_POST['atitle'];
$atitle  =addslashes($_POST['atitle']);
$atitlenew=str_replace("\'","'",$atitle);

$email=$_POST['email'];
$sender=$_POST['sender'];
$des  =$_POST['des'];
$desinsert  =addslashes($_POST['des']);
$desnew=str_replace("\'","'",$desinsert);

$other= $_POST['other'];
$flag="1";
$imagechecker=$_POST['imagechecker'];

$filecid="1001";
$filename = $_FILES["fileToUpload"]["name"];
if(empty($filename)){ } else {
$nam="announce".date("d-m-Y H:i");
$fullpath = '10.24.8.213/seminar/upload/'.$nam;
}
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$location = '/var/www/html/seminar/upload/'.$nam;
if(move_uploaded_file($tmp_name, $location)){
//$mail->AddEmbeddedImage($location, $filecid, $nam, "base64", "image/jpg");
}
$servername="localhost";
$username="Mailinglist";
$password="MailinG24List";
$databasename="seminar";
$conn= mysqli_connect($servername,$username,$password,$databasename);



mysqli_query('SET charactier_set_results=utf8');
mysqli_query('SET names=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_results=utf8');
mysqli_query('SET collation_connection=utf8_general_ci');

$result = mysqli_query("SET NAMES utf8");//the main trick

if(empty($id)){
$query = "INSERT INTO seminarorg (type,category,title,remindermail,abstract,sender,email,others,filename,filelocation,flag)VALUES('$type','$a_type','$atitle','$imagechecker','$desinsert','$sender','$email','$other','$nam','$fullpath','$flag')";
}
elseif(!empty($id) && !empty($filename)){
$query="UPDATE seminarorg SET type='$type', category='$a_type',title='$atitle',remindermail='$imagechecker',abstract='$desinsert',sender='$sender',email='$email',others='$other',filename='$nam',filelocation='$fullpath',flag='$flag' WHERE id='$id'";
}
else{
$query="UPDATE seminarorg SET type='$type', category='$a_type',title='$atitle',remindermail='$imagechecker',abstract='$desinsert',sender='$sender',email='$email',others='$other',flag='$flag' WHERE id='$id'";
}
$result1=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result1))
//$result = mysql_query($sql);
//if (!mysql_query($query,$conn))
  {
  die('Error: ' . mysqli_error());
  }
echo "Thank you! Announce has been saved.!"; ?>
&nbsp;<a href="showsavedannounces1.php?type=<?php echo $type;?>&useremail=<?php echo $z."@iitm.ac.in";?>" style="font-weight:bold;"><i class="fa fa-bookmark"></i>&nbsp;Saved Announces</a>
<?php
?>



</div>
</form>
</center>
                        </div>
                        </div>

<br><br><center><font>Copyright © 2024 All rights reserved | Developed and Maintained by <a style="cursor:point;color:white;" href="http://eservices.iitm.ac.in">Eservices,Computer Centre,IITM</font></center><br>
                </section>

