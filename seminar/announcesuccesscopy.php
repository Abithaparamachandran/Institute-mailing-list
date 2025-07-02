<?php

$type = $_GET['type'];
$id = $_GET['id'];
$filenameold = $_SESSION['filename'];
$filelocationold = $_SESSION['filelocation'];
$imagechecker = $_SESSION['imagechecker'];


?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>

<style>
body {
    background-color: #048f94
}

h3 {
    margin-top: 20px;
    color: black;
}
</style>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="font.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<script type="text/javascript">

    if (performance.navigation.type === 1) {
        alert("Cannot reload the page, please goback");
    }
</script>
<section id="contact">
    <div class="section-content">
        <center><img src="newlogo.png"></center>
        <br><br>

        <span style="float:right;margin-right:8%;">
            <a href="showsavedannounces.php?type=<?php echo $type; ?>&useremail=<?php echo $z . "@iitm.ac.in"; ?>"
                style="font-weight:bold;"><i class="fa fa-bookmark"></i>&nbsp;Saved Announces</a>
        </span>
    </div>

<div class="contact-section">
<div class="container">
<center>
<form method="post" id="register-form">
<div>
<?php
session_start();
if (isset($_SESSION['success_message'])) {
	    echo $_SESSION['success_message'];
	        unset($_SESSION['success_message']); // Remove the session variable after displaying
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
header('Content-Type: text/html; charset=utf-8');


				                            
$a_type = isset($_POST['atype']) ? $_POST['atype'] : $_POST['atypemain'];
$atitle = $_POST['atitle'];
$atitleinsert = addslashes($atitle);
$email = $_POST['email'];
$sender = $_POST['sender'];
$des = $_POST['des'];
$desinsert = addslashes($des);
$destags = strip_tags($desinsert);
$other = $_POST['other'];
$flag = "0";
$imagechecker = $_POST['imagechecker'];

$servername = "localhost";
$username = "Mailinglist";
$password = "MailinG24List";
$databasename = "seminar";
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
if (empty($id)) {
$query = "INSERT INTO seminarorg (type, category, title, remindermail, abstract, sender, email, others, filename, filelocation, flag) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
} else {
$query = "UPDATE seminarorg SET type=?, category=?, title=?, remindermail=?, abstract=?, sender=?, email=?, others=?, flag=? WHERE id=?";
 }
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ssssssssssi", $type, $a_type, $atitleinsert, $imagechecker, $destags, $sender, $email, $other, $nam, $fullpath, $flag);
if (mysqli_stmt_execute($stmt)) {
 require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Host = 'smtp.iitm.ac.in';
$mail->SMTPAuth = true;
$mail->Username = 'ebind';
$mail->Password = 'pgSiitmcc';
$mail->SMTPSecure = 'tls';
$mail->Port = 25;
$mail->From = $email;
$mail->FromName = $email;
$filecid = "1001";
$filename = $_FILES["fileToUpload"]["name"];
if (empty($filename)) {
 } else {
$nam = "announce" . date("d-m-Y H:i");
$fullpath = '10.24.8.213/seminar/upload/' . $nam;
}
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$location = '/var/www/html/seminar/upload/' . $nam;
if (move_uploaded_file($tmp_name, $location)) {
 }
//$mail->addAddress("seminarlisttest@list.iitm.ac.in");
$mail->addAddress("announce@list.iitm.ac.in");
//$mail->addAddress("ccprj36@iitm.ac.in");
$mail->isHTML(true);
$mail->Subject = "[" . $a_type . "]" . $atitle;
$mail->Body .= $des . "<br><br>";
if (empty($other)) {
$mail->Body .= "";
  } else {
$mail->Body .= "<font style=font-weight:bold;>Other Information:</font>" . $other . "<br>";
 }

if (!empty($imagechecker)) {
	    $mail->Body .= "<br><img src='$fullpath'><br><br>";
}

$mail->Body .= "<font style='font-weight:bold;'>" . $sender . "</font><br><br>";

if ($mail->send()) {
 
    $_SESSION['success_message']= '<div style="color:green; font-weight: bold;border: 2px solid green; padding: 10px;background-color: lightgreen">Thank you! Announcement Submitted Successfully...!</div>';
    // $_SESSION['email_sent'] = true;
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}else{
echo 'Message could not be sent. ';}

	

}}
?>
                    </div>
                </form>
            </center>
        </div>
    </div>
</section>
</body>
</html>
