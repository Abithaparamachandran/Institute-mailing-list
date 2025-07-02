<?php
session_start();
if(!isset($_SESSION['usernamee'])) {
header("location:logout.php");
}
$z=$_SESSION['usernamee'];
?>

<?php $type=$_GET['type']; $useremail=$_GET['useremail'];?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="font.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">


<script src="jquery.min.js"></script>
<script src="jquery.validate.min.js"></script><!-- jquery validation -->
<style>
.container
{
padding:60px;
margin-top:80px;
margin-bottom:80px;
border:none!important;
box-shadow:0 9px 50px 0 rgba(0,0,0,0.6);
width:80%;
align:center!important;
background-color:white;

}
</style>
<section id="contact" style="height:auto !important;min-height:200px;">
                        <div class="section-content">
<form method="post" name="register-form">
<center><img src="newlogo.png"></center>
<br><br>
<h3>Post To Announce Mailing List
</h3>

<span style="float:right;margin-right:8%;"><i class="fa fa-user"></i>&nbsp;<?php echo $z;?>
&nbsp;&nbsp;<a href="logout.php" style="color:brown;">Logout</a>
</span>

                        </div>
                        <div class="contact-section">
                        <div class="container">
<center>

<?php
header('Content-Type: text/html; charset=utf-8');
$servername="***";
$username="***";
$password="***";
$databasename="***";
$conn=mysqli_connect($servername,$username,$password,$databasename);


mysqli_query('SET character_set_results=utf8');
mysqli_query('SET names=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_results=utf8');
mysqli_query('SET collation_connection=utf8_general_ci');

$result = mysqli_query("SET NAMES utf8");//the main trick

$result="select * from *** where type='$type' and email='$useremail' and flag='1'";
$result1=mysqli_query($conn,$result);


$rowcount=mysqli_num_rows($result1);
if($rowcount=="0"){
echo "No saved announces in your profile";
}
else{
        while ($row2 = mysqli_fetch_assoc($result1)) {
        $_SESSION['id']=$row2['id'];
        $_SESSION['a_type']=$row2['category'];
        $_SESSION['atitle']=$row2['title'];
        $_SESSION['des']=$row2['abstract'];
        $_SESSION['sender']=$row2['sender'];
        $_SESSION['email']=$row2['email'];
        $_SESSION['other']=$row2['others'];
        $_SESSION['filename']=$row2['filename'];
        $_SESSION['filelocation']=$row2['filelocation'];
	$_SESSION['imagechecker']=$row2['remindermail'];
?>
<div style="width:95%;border:1px solid white;text-align:left;line-height:25px;padding:8px;background:#f9f6f6;color:black;">

<font>Announcement Subject :</font> [<?php echo $_SESSION['a_type'];?>] <?php echo $_SESSION['atitle'];?><br>

<?php echo nl2br($_SESSION['des']);?><br>

<?php
if(empty($_SESSION['other'])){//
}
else {
?>
<font>Additional Information : </font><?php echo $_SESSION['other'];?><br>
<?php } ?>

<font><?php echo $_SESSION['sender'];?></font><br>


<?php 
if(empty($_SESSION['imagechecker'])){ }
else{
if(empty($_SESSION['filelocation'])) { } else { ?>
<img src="<?php echo $_SESSION['filelocation']; ?>" style="width:40%;height:auto;"><br> <?php }} ?>

<button class="btn btn-default submit" name="announceedit" formaction="v.php?type=<?php echo $type;?>&id=<?php echo $_SESSION['id']; ?>" style="background:#0088cc;">Edit Announce</button>
<?php  echo "<a class='btn btn-default submit' style='background:#0088cc !important;' onclick='javascript:confirmationDelete($(this));return false;' href='announcedelete.php?type=".$type."&useremail=".$useremail."&id=".$_SESSION['id']."'>Delete Announce</a>";
?>

<script>
function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>

<button class="btn btn-default submit" name="announcesave" formaction="announcesaveandsend.php?type=<?php echo $type;?>&id=<?php echo $row2['id'];?>&useremail=<?php echo $useremail; ?>" style="background:#0088cc;">Send Announce</button>

<hr style="border:1px solid black;"></div> <?php } ?>

</center>
                        </div>
<br><br>
</form>
                        </div>
<?php } ?>
<br><br><center><font>Copyright © 2024 All rights reserved | Developed and Maintained by <a style="cursor:point;color:black;" href="http://eservices.iitm.ac.in">Eservices,Computer Centre,IITM</font></center><br>
                </section>


?>
