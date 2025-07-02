<html>
<style>
html{
line-height:200px;
}
</style>
<body>
</body>
</html>

</html>

<?php

require 'PHPMailerAutoload.php';
$servername = "***";
$username = "***";
$password = "***";
$databasename = "***";
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

$result = mysqli_query($conn, "SELECT title,speaker,biography,affiliation,department,venue,abstract,date,email,reminder_date,remindermail,sender,others FROM `seminarorg` where DATE_FORMAT(reminder_date, '%Y-%m-%d') = DATE_ADD(CURDATE(), INTERVAL +1 DAY) && remindermail = 'yes' && email like 'ccprj05%'");

while($row = mysqli_fetch_array($result))
{

$mail = new PHPMailer;
$mail->CharSet="utf-8";
$mail->isSMTP();
$mail->Host = '***';
$mail->SMTPAuth = true;
$mail->Username = '***';
$mail->Password = '***';
$mail->SMTPSecure = 'tls';
$mail->Port = 25;
$title = $row['title'];
$speaker = $row['speaker'];
$department = $row['department'];
$venue = $row['venue'];
$abstract = $row['abstract'];
$date = $row['date'];
$biography = $row['biography'];
$affiliation = $row['affiliation'];
$sender = $row['sender'];
$others = $row['others'];
$email = $row['email'];
$mail->From = $row['email'];
$mail->FromName = $row['email'];
$mail->WordWrap = 50;
$mail->isHTML(true);
$mail->Subject = 'Gentle reminder-'.$title;
$mail->Body    = '<b><font color=red>Gentle reminder</font></b> for seminar on <b>' .$date.'</b>
<br><br><font color=#000066><b>Ttile: </b></font>'  .$title.
'<br><font color=#000066><b>Date/Time: </b></font>' .$date.
'<br><font color=#000066><b>Venue: </b></font>' .$venue.
'<br><font color=#000066><b>Speaker: </b></font>' .$speaker
;
echo "<br>";
if(empty($biography))
{
$mail->Body .="";
}
else{
$mail->Body .= "<br><font color=#000066 align=justify><b> Biography of the speaker:</b></font><br>"  .$biography."<br><br>";
}
if(empty($affiliation))
{
$mail->Body .="";
else{
$mail->Body .= "<font color=#000066 align=justify><b> Affiliation of the speaker:</b></font><br>" .$affiliation."<br><br>";
}
if(empty($guide))
{
$mail->Body .="";
}
else{
$mail->Body .= "<font color=#000066><b> Guide:</b></font>" .$guide."<br><br>";
}
if(empty($abstract))
{
$mail->Body .="";
}
else{
$mail->Body .= "<font color=#000066 align=justify><b> Abstract:</b></font><br>" .nl2br($abstract)."<br><br>";
}
if(empty($others))
{
$mail->Body .="";
}
else{
$mail->Body .= $others."<br><br>";
}
$mail->Body .= "<br><br><br><font color=#000066><i><b>".$sender."<br>".$department."</b></i></font>";
$mail->addAddress('***');
if(!$mail->send())
{
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
}
else
{
echo 'Reminder sent to seminars@list.iitm.ac.in successfully<br/>';
}
}

?>

