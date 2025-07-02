<?php
require 'PHPMailerAutoload.php';

$servername = "localhost";
$username = "Mailinglist";
$password = "MailinG24List";
$databasename = "seminar";
$conn = mysqli_connect($servername, $username, $password, $databasename);

if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
}

$startDate = date('Y-m-d 00:00:00', strtotime('-1 day'));
$endDate = date('Y-m-d 23:59:59');
$query = "SELECT * FROM seminarorg1 WHERE modifiedtimestamp BETWEEN '$startDate' AND '$endDate' AND flag='1' AND type='seminar'";
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
			        $emailBody = "<h2>Seminars</h2>";
			        $senderEmail = '';

				    while ($row = mysqli_fetch_assoc($result)) {
					            if (!$senderEmail) {
							                $senderEmail = $row['email'];
									        }
						            $emailBody .= generateEmailBody($row);
						         
						            $updateQuery = "UPDATE seminarorg1 SET flag='0' WHERE id='" . $row['id'] . "'";
							            mysqli_query($conn, $updateQuery);
							        }
				    
				    $mail->From = 'Eservices';
				    $mail->FromName = 'Seminars';
				        $mail->addAddress("seminartesting@list.iitm.ac.in");
				        $mail->isHTML(true);
					    $mail->Subject = "Seminars Announcement";
					    $mail->Body = $emailBody;
					        
					        if (!$mail->send()) {
							        echo 'Message could not be sent: ' . $mail->ErrorInfo . '<br>';
								    } else {
									            echo 'Message has been sent.<br>';
										        }
} else {
	    echo "No results found.<br>";
}

mysqli_close($conn);

function generateEmailBody($data) {
	    $body = "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>";
	        $body .= "<strong>Title:</strong> " . $data['title'] . "<br>";
	        $body .= "<strong>From:</strong> " . $data['email'] . "<br>";
		    $body .= "<strong>Date/Time:</strong> " . $data['date'] . "<br>";
		    $body .= "<strong>Venue:</strong> " . $data['venue'] . "<br>";
		        $body .= "<strong>Speaker:</strong> " . $data['speaker'] . "<br>";
		        if (!empty($data['biography'])) {
				        $body .= "<strong>Biography of the Speaker:</strong> " . $data['biography'] . "<br>";
					    }
			    if (!empty($data['affiliation'])) {
				            $body .= "<strong>Affiliation of the Speaker:</strong> " . $data['affiliation'] . "<br>";
					        }
			    if (!empty($data['abstract'])) {
				            $body .= "<strong>Abstract:</strong><br>" . nl2br($data['abstract']) . "<br>";
					        }
			    if (!empty($data['others'])) {
				            $body .= "<strong>Other Information:</strong> " . $data['others'] . "<br>";
					        }
			    $body .= "</div>";
			    return $body;
}
?>

