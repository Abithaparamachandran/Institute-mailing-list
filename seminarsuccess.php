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
<?php $type="seminar"; ?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script src="https://use.fontawesome.com/f59bcd8580.js"></script>
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
if (performance.navigation.type === 1) {
alert("Cannot reload the page, please goback");
    }
</script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="font.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<style >
body{
background-color:#048f94
}
h3{
margin-top:20px;
color:black;
}
</style>
<section id="contact">
		<div class="section-content">
<center>
<div class="tab">
<img src="newlogo.png"alt="logo"align="center"></img>
</center>
<h3>Post to Seminar Mailing List</h3>
<script>
document.addEventListener('DOMContentLoaded', function() {
document.getElementById('myButton').addEventListener('click', function(event) {
event.preventDefault(); 
alert('Element clicked!');
});
    });
</script>
</div>
<div class="contact-section">
<div class="container">
<center>
<form method="post" id="register-form">
<div>
<?php
session_start();
if (isset($_SESSION['success_message'])){
	echo $_SESSION['success_message'];
	unset($_SESSION['success_message']);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
header('Content-Type: text/html; charset=utf-8');
$select = $_POST['select'];
$title = $_POST['title'];
$titleinsert  =addslashes($_POST['title']);
$welcome=$_POST['welcome'];
$date= $_POST['date'];
$timestamp = date('Y-m-d', strtotime($date));
$venue= $_POST['venue'];
$speaker= $_POST['speaker'];
$biography= $_POST['biography'];
$biographyinsert  =addslashes($_POST['biography']);
$affiliation= $_POST['affiliation'];
$affiliationinsert  =addslashes($_POST['affiliation']);
$abstract= $_POST['abstract'];
$abstractinsert  =addslashes($_POST['abstract']);
$sender= $_POST['sender'];
$department= $_POST['department'];
$other= $_POST['other'];
$email=$_POST['email'];
$remindermail=$_POST['remindermail'];
$link=$_POST['link'];
$mtimestamp=date('Y-m-d H:i:s');
$status="Active";
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Host = '***';
$mail->SMTPAuth = true;
$mail->Username = '***';
$mail->Password = '***';
$mail->SMTPSecure = 'tls';
$mail->Port = 25;
$mail->From= $email;
$mail->FromName = $email;
$filename = $_FILES["fileToUpload"]["name"];
if(empty($filename)){ } else {
$nam="seminar".date("d-m-Y H:i");
$fullpath = '10.24.8.213/seminar/upload/'.$nam;
}
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$location = '/var/www/html/seminar/upload/'.$nam;
if(move_uploaded_file($tmp_name, $location)){
}
$mail->addAddress("***");
$mail->isHTML(true);
$mail->Subject ="[".$select."]".$title;
if(empty($welcome))
{
$mail->Body .="";
}
else{
$mail->Body .= $welcome."<br><br>";
}
$mail->Body .= "<font style=color:#000066;font-weight:bold;>Title : </font>".$title."<br>";
$mail->Body .= "<font style=color:#000066;font-weight:bold;>Date/Time : </font>".$date."<br>";
$mail->Body .= "<font style=color:#000066;font-weight:bold;>Venue : </font>".$venue."<br>";
$mail->Body .= "<font style=color:#000066;font-weight:bold;>Speaker: </font>".$speaker."<br>";
if(empty($biography))
{
$mail->Body .="";
}
else{
$mail->Body .= "<br><font style=text-align:justify;color:#000066;font-weight:bold;>Biography of the Speaker :<br></font>".$biography."<br>";
}
if(empty($affiliation))
{
$mail->Body .="";
}
else{
$mail->Body .= "<br><font style=color:#000066;text-align:justify;font-weight:bold;>Affiliation of the Speaker :<br></font>".$affiliation."<br>";
}
if(empty($abstract))
{
$mail->Body .="";
}
else{
$mail->Body .= "<br><font style=color:#000066;text-align:justify;font-weight:bold;>Abstract :<br></font>".nl2br($abstract)."<br><br>";
}
if(empty($nam)){
$mail->Body .="";
}
else{
$mail->Body .= "<img src='$fullpath'>";
}
if(empty($link)){
$mail->Body .=""; }
else{
$mail->Body .="<br><font style=color:#000066;font-weight:bold;>Web Conference Link :</font>".$link."<br>";
}
if(empty($other))
{
$mail->Body .="";
}
else{
$mail->Body .= "<font style=color:#000066;font-weight:bold;>Other Information: </font>".$other."<br><br>";
}
$mail->Body .= "<br><font style=color:#000066;font-weight:bold;>".$sender."<br>".$department."</font><br><br>";
$servername="***";
$username="***";
$password="***";
$databasename="seminar";
$conn= mysqli_connect($servername,$username,$password,$databasename);
if($conn){
}
else{
echo"not connected";
}
mysqli_query('SET character_set_results=utf8');
mysqli_query('SET names=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_results=utf8');
mysqli_query('SET collation_connection=utf8_general_ci');
$result = mysqli_query("SET NAMES utf8");
$linkinsert=$other."-web confernce link".$link;
$query = "INSERT IGNORE INTO seminarorg1 (type,category,welcome,title,speaker,biography,affiliation,department,date,reminder_date,remindermail,venue,abstract,sender,email,others,filename,filelocation,flag,modifiedtimestamp,status)VALUES('$type','$select','NULL','$titleinsert','$speaker','$biographyinsert','$affiliationinsert','$department','$date','$timestamp','$remindermail','$venue','$abstractinsert','$sender','$email','$linkinsert','$nam','$fullpath','0','$mtimestamp','$status')";
$result1=mysqli_query($conn,$query);
$lastID = mysqli_insert_id($conn);
if($result1)
{
if($mail->send()) {
$queryUpdate = "update seminarorg1 set flag='1' where id = '$lastID'";	
$resultUpdate=mysqli_query($conn,$queryUpdate);
$_SESSION['success_message'] = '<div style="color:green;font-weight: bold;border: 2px solid green;padding: 10px;background-color:lightgreen">Thank you! Seminar Submitted Successfully...!</div>';
header("Location: ".$_SERVER['PHP_SELF']);
exit();
}else{
	echo 'Message could not be sent.';
	    }}
}
?>
</div>
</form>
</center>
                        </div>
                        </div>
</div>
                </section>
</body>
</html>
