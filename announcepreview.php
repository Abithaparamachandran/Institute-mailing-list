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
<?php
header('Content-Type: text/html; charset=utf-8');

$servername="****";
$username="***";
$password="***";
$databasename="***";
$conn=mysqli_connect($servername,$username,$password,$databasename);
if($conn){
//	echo"connected";
}
else{
//	echo"not connected";
}


mysqli_query('SET character_set_results=utf8');
mysqli_query('SET names=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_results=utf8');
mysqli_query('SET collation_connection=utf8_general_ci');

$result = mysqli_query("SET NAMES utf8");//the main trick

?>
<!--?php include("connection.php");?-->

<?php $type=$_GET['type'];  $id=$_GET['id'];?>


<!--?php include("connection.php");?-->

<?php $type=$_GET['type'];  $id=$_GET['id'];?>

<?php
$result=mysqli_query("select * from seminarorg where type='$type' and id='$id'");
        while ($row2 = mysqli_fetch_assoc($result)) {
        $atitle=$row2['title'];
        $des=$row2['abstract'];
        $sender=$row2['sender'];
        $other=$row2['others'];
        $_SESSION['filename']=$row2['filename'];
        $_SESSION['filelocation']=$row2['filelocation'];
        $_SESSION['imagechecker']=$row2['remindermail'];}
?>

<?php $type=$_GET['type']; ?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="font.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<style>
.tab{
overflow:hidden;
border:3px solid #ccc;
background-color:#007bff;
padding:10px;
margin-top:-34px;
}

</style>
<section id="contact" style="height:auto !important;min-height:200px;">
                        <div class="section-content">
<form method="post">
<div class="tab">
<center><img src="newlogo.png"></center>
</div>


                        </div>
                        <div class="contact-section">
			<div class="container">
<br><br>
<center>

<div style="width:100%;border-style:groove ;text-align:left;line-height:50px;padding:18px;background:white;color:black;">


<?php

header('Content-Type: text/html; charset=utf-8');
if(empty($_POST['atype'])){
$a_type=$_POST['atypemain'];
}
else{
$a_type=$_POST['atype'];
}
$atitle=$_POST['atitle'];
$email=$_POST['email'];
$sender=$_POST['sender'];
$des  =$_POST['des'];
$other= $_POST['other'];
$imagechecker=$_POST['imagechecker'];
$filename = $_FILES["fileToUpload"]["name"];
if(empty($filename)){ } else {
$nam="announce".date("d-m-Y H:i");
$fullpath = 'https://eservices2.iitm.ac.in/seminar/uploadpreview/'.$nam;
}
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$location = '/var/www/html/seminar/uploadpreview/'.$nam;
if(move_uploaded_file($tmp_name, $location)){
//
}
$servername="***";
$username="***";
$password="***";
$databasename="***";
$conn= mysqli_connect($servername,$username,$password,$databasename);
if($conn){
}
else
{
}

mysqli_query('SET character_set_results=utf8');
mysqli_query('SET names=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_results=utf8');
mysqli_query('SET collation_connection=utf8_general_ci');

$result = mysqli_query("SET NAMES utf8");//the main trick

?>

<h4><center>Preview of the Announce will be posted</center></h4><br>

<font><b>Announcement Subject :</b></font> [<?php echo $a_type;?>] <?php echo $atitle;?><br><br>

<font><b>Body of the Message :</b> </font><br>
<?php echo nl2br($des);?><br><br>

<?php
if(empty($other)){//
}
else {
?>



<input type="hidden" class="form-control" id="other" value="<?php echo $other;?>" placeholder="Enter Additional Information" name="other">
<input type="hidden" class="form-control" id="sender" value="<?php echo $sender;?>" placeholder="Enter Additional Information" name="sender">
<font ><b>Additional Information :</b> </font><?php echo $other;?><br>
<?php } ?>

<font ><?php echo $sender;?></font><br><br>
<?php
if(empty($imagechecker)){ }
else{
if(empty($filename)){//
}
else {
?>
<img src="<?php echo $fullpath;?>" style="width:40%;height:auto;"><br>
<?php } }?>


</div>
</center>
		</div>
<br><br>
</form>
		</div>
</section>
?>

<br><br><br><br><br><br>
<div class="footer">
<center><h5>Copyright © 2023 All rights reserved | Developed and Maintained by Eservices,Computer    </h5>             </center>
</div>
               

