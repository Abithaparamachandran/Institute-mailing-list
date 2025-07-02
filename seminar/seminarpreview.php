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
<form method="post">
<div class="tab">
<center><img src="newlogo.png"></center>
</div>

                        </div>
                        <div class="contact-section">
                        <div class="container">


<center>

<div style="width:95%;border:groove;text-align:left;line-height:60px;padding:10px;background:white;color:black;">

<h4><center>Preview of the Seminar will be posted</center></h4><br>

<?php
header('Content-Type: text/html; charset=utf-8');

$welcome=$_POST['welcome'];
$select = $_POST['select'];
$title = $_POST['title'];
$date= $_POST['date'];
$venue= $_POST['venue'];
$speaker= $_POST['speaker'];
$biography= $_POST['biography'];
$affiliation= $_POST['affiliation'];
$abstract= $_POST['abstract'];
$sender= $_POST['sender'];
$department= $_POST['department'];
$other= $_POST['other'];
$link=$_POST['link'];
$filename = $_FILES["fileToUpload"]["name"]; 
if(empty($filename)){ } else {
$nam="seminar".date("d-m-Y H:i");
$fullpath = '10.24.8.213/mailinglist/upload/'.$nam;
}
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$location = '/var/www/html/mailinglist/upload/'.$nam;
if(move_uploaded_file($tmp_name, $location)){
//
}
?>

<font color="red">Seminar Subject :</font> [<?php echo $select;?>] <?php echo $title; ?><br>
<?php
if(empty($welcome)){ }
else {
echo $welcome."<br><br>";
?>
<?php
}
?>
<font color="red">Title :</font> <?php echo $title;?><br>
<font color="red">Date/Time :</font> <?php echo $date;?><br>
<font color="red">Venue :</font> <?php echo $venue;?><br>
<font color="red">Speaker :</font> <?php echo $speaker;?><br>

<?php
if(empty($biography)){ }
else {
?>
<font color="red">Biography of the speaker :</font><br>
<?php echo $biography;?><br><br>
<?php } ?>

<?php
if(empty($affiliation)){ }
else {
?>
<font color="red">Affiliation of the speaker :</font><br>
<?php echo $affiliation;?><br><br>
<?php } ?>


<?php
if(empty($abstract)){ }
else {
?>
<font color="red">Abstract :</font><br>
<?php echo $abstract;?><br><br>
<?php } ?>

<?php
if(empty($filename)){ }
else{
?>
<img style="width:60%;height:auto;" src="<?php echo $fullpath;?>"><br><br>
<?php }?>

<?php
if(empty($link)) { }
else { ?>
<font color="red">Web Conference Link :</font>
<?php echo $link;?><br><br><?php } ?>

<?php
if(empty($other)){ }
else {
?>
<font color="red">Additional Information :</font>
<?php echo $other;?><br><br>
<?php } ?>

<font color="red"><?php echo $department;?><br>
<?php echo $sender;?></font>

</div>

</center>
                        </div>
                        </div>
<br><br>
<br><br><center><font style="font-size:20px;">Copyright © 2023 All rights reserved | Developed and Maintained by Eservices,IITM</font></center><br>
                </section>

