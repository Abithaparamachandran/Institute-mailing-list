<?php
session_start();
header('Content-Type: text/html; charset=utf-8');


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


$mail->From = 'your_email@example.com';  
$mail->FromName = 'Your Name';            


$conn = new mysqli("localhost", "Mailinglist", "MailinG24List", "seminar");

if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
}


$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day'));
$startTime = "$yesterday 16:00:00"; 
$endTime = "$today 11:00:00"; 


$entrySql = "SELECT * FROM seminarorg1 WHERE Date BETWEEN '$startTime' AND '$endTime'";
$result = $conn->query($entrySql);

if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) {
		            $title = $row['Title'];
			            $speaker = $row['Speaker'];
			            $venue = $row['Venue'];
				            $date = $row['Date'];
				            $biography = $row['Biography'];
					            $affiliation = $row['Affiliation'];
					            $abstract = $row['Abstract'];
						            $link = $row['Others'];
						            $sender = $row['Sender'];
							            $department = $row['Department'];

							            
							            $mail->addAddress("Seminartesting@list.iitm.ac.in");

								         
								            $mail->Subject = "Seminar: " . $title;
								            $mail->isHTML(true);
									            $mail->Body = "
        <section id='contact'>
            <div class='section-content'>
                <center>
                    <div class='tab'>
                        <img src='newlogo.png' alt='logo' align='center'>
                    </div>
                    <h3>Post to Seminar Mailing List</h3>
                </center>
                <div class='contact-section'>
                    <div class='container'>
                        <font style='color:#000066;font-weight:bold;'>Title: </font>{$title}<br>
                        <font style='color:#000066;font-weight:bold;'>Date/Time: </font>{$date}<br>
                        <font style='color:#000066;font-weight:bold;'>Venue: </font>{$venue}<br>
                        <font style='color:#000066;font-weight:bold;'>Speaker: </font>{$speaker}<br>
                        <font style='color:#000066;font-weight:bold;'>Biography of the Speaker: </font>{$biography}<br>
                        <font style='color:#000066;font-weight:bold;'>Affiliation of the Speaker: </font>{$affiliation}<br>
                        <font style='color:#000066;font-weight:bold;'>Abstract: </font>" . nl2br($abstract) . "<br>
                        <font style='color:#000066;font-weight:bold;'>Web Conference Link: </font>{$link}<br>
                        <br><font style='color:#000066;font-weight:bold;'>{$sender}<br>{$department}</font>
                    </div>
                </div>
            </div>
        </section>";

									          
									            if (!$mail->send()) {
											                echo 'Message could not be sent for: ' . $title . '. Error: ' . $mail->ErrorInfo . '<br>';
													        } else {
															            echo 'Message sent for: ' . $title . '<br>';
																            }

									            $mail->clearAddresses();
									        }
} else {
	    echo "No seminars found for the specified time range.";
}


$conn->close();
?>
