<?php

require 'PHPMailerAutoload.php';

$servername = "localhost";
$username = "Mailinglist";
$password = "MailinG24List";
$databasename = "seminar";
// $email = $_POST['email'];
$conn = mysqli_connect($servername, $username, $password, $databasename);

if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
}


$startDate = date('Y-m-d 00:00:00',strtotime('-1 day'));
$endDate = date('Y-m-d 23:59:59'); 
// $email = $_POST['email'];
$query = "SELECT * FROM seminarorg1 WHERE modifiedtimestamp BETWEEN '$startDate' AND '$endDate' AND flag='0'";
echo "Query: $query<br>";
$result = mysqli_query($conn, $query);

if (!$result) {
	    die('Query Error: ' . mysqli_error($conn)); 
}

if (mysqli_num_rows($result) > 0) {
	    $mail = new PHPMailer;
	        $mail->CharSet = 'UTF-8';
	        $mail->isSMTP();
		    $mail->Host = 'smtp.iitm.ac.in';
		    $mail->SMTPAuth = true;
		        $mail->Username = 'ebind';
		        $mail->Password = 'pgSiitmcc';
			    $mail->SMTPSecure = 'tls';
			    $mail->Port = 25;
			       // $mail->From = $row['email'];
			        //$mail->FromName = $row['email'];

			    while ($row = mysqli_fetch_assoc($result)) {
				     $mail->From = $row['email'];
				                                     $mail->FromName = $row['email'];
					            $mail->addAddress("seminartesting@list.iitm.ac.in");
						            $mail->isHTML(true);
						            $mail->Subject = "[" . $row['category'] . "] " . $row['title'];
							            $mail->Body = generateEmailBody($row);

							            if (!$mail->send()) {
									                echo 'Message could not be sent for entry ID ' . $row['id'] . '<br>';
											        } else {
													            $updateQuery = "UPDATE seminarorg1 SET flag='1' WHERE id='" . $row['id'] . "'";
														                mysqli_query($conn, $updateQuery);
														            }
								        }
} else {
	    echo "No results found.<br>";
}

mysqli_close($conn);

function generateEmailBody($data) {
	    $body = "<font style=color:#000066;font-weight:bold;>Title : </font>" . $data['title'] . "<br>";
	        $body .= "<font style=color:#000066;font-weight:bold;>Date/Time : </font>" . $data['date'] . "<br>";
	        $body .= "<font style=color:#000066;font-weight:bold;>Venue : </font>" . $data['venue'] . "<br>";
		    $body .= "<font style=color:#000066;font-weight:bold;>Speaker: </font>" . $data['speaker'] . "<br>";

		    if (!empty($data['biography'])) {
			            $body .= "<br><font style=text-align:justify;color:#000066;font-weight:bold;>Biography of the Speaker :<br></font>" . $data['biography'] . "<br>";
				        }
		        if (!empty($data['affiliation'])) {
				        $body .= "<br><font style=color:#000066;text-align:justify;font-weight:bold;>Affiliation of the Speaker :<br></font>" . $data['affiliation'] . "<br>";
					    }
		        if (!empty($data['abstract'])) {
				        $body .= "<br><font style=color:#000066;text-align:justify;font-weight:bold;>Abstract :<br></font>" . nl2br($data['abstract']) . "<br><br>";
					    }
		        if (!empty($data['others'])) {
				        $body .= "<font style=color:#000066;font-weight:bold;>Other Information: </font>" . $data['others'] . "<br><br>";
					    }
		        return $body;
}
?>

