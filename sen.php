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
$query = "SELECT * FROM seminarorg1 WHERE modifiedtimestamp BETWEEN '$startDate' AND '$endDate' AND flag='0' AND type='seminar'";

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
			        
			        $emailBody = "<h2>Upcoming Seminars</h2>";
			        $emailBody .= "<p>Below is a list of seminars happening soon. Click the title to view the abstract.</p>";

				    $index = 0;
				    while ($row = mysqli_fetch_assoc($result)) {
					            $emailBody .= generateEmailBody($row, $index);         $index++;
						        }

				        $mail->From = 'seminartesting@list.iitm.ac.in';
				        $mail->FromName = 'Seminars';
					    $mail->addAddress("seminartesting@list.iitm.ac.in");
					    $mail->isHTML(true);
					        $mail->Subject = "Seminar Announcement";
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

function generateEmailBody($data, $index) {
	    $body = "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;'>";
	        $body .= "<strong>Title:</strong> " . htmlspecialchars($data['title']) . "<br>";
	        $body .= "<strong>From:</strong> " . htmlspecialchars($data['email']) . "<br>";
		    $body .= "<strong>Date/Time:</strong> " . htmlspecialchars($data['date']) . "<br>";
		    $body .= "<strong>Venue:</strong> " . htmlspecialchars($data['venue']) . "<br>";
		        $body .= "<strong>Speaker:</strong> " . htmlspecialchars($data['speaker']) . "<br>";

		        if (!empty($data['biography'])) {
				        $body .= "<strong>Biography of the Speaker:</strong> " . htmlspecialchars($data['biography']) . "<br>";
					    }

			    if (!empty($data['affiliation'])) {
				            $body .= "<strong>Affiliation of the Speaker:</strong> " . htmlspecialchars($data['affiliation']) . "<br>";
					        }

			    if (!empty($data['abstract'])) {
				            $body .= "<button style='background-color: #4CAF50; color: white; padding: 10px; cursor: pointer;' onclick='toggleAbstract($index)'>Show Abstract</button>";
					            $body .= "<div id='abstract$index' style='display:none; margin-top:10px;'><strong>Abstract:</strong><br>" . nl2br(htmlspecialchars($data['abstract'])) . "</div>";
					        }

			    if (!empty($data['others'])) {
				            $body .= "<strong>Other Information:</strong> " . htmlspecialchars($data['others']) . "<br>";
					        }

			    $body .= "</div>";
			    return $body;
}

?>
<script type="text/javascript">
    function toggleAbstract(index) {
	            var abstract = document.getElementById('abstract' + index);
		            var button = event.target;
		            if (abstract.style.display === 'none' || abstract.style.display === '') {
				                abstract.style.display = 'block';
						            button.innerHTML = 'Hide Abstract';
						        } else {
								            abstract.style.display = 'none';
									                button.innerHTML = 'Show Abstract';
									            }
			        }
</script>
