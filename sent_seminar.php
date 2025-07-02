<?php
require 'PHPMailerAutoload.php';

$servername = "***";
$username = "***";
$password = "***";
$databasename = "seminar";
$conn = mysqli_connect($servername, $username, $password, $databasename);

if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
}
$index = 0;
while ($row = mysqli_fetch_assoc($result)) {
	    echo generateEmailBody($row, $index);
	        $index++;
}

$startDate = date('Y-m-d 00:00:00', strtotime('-1 day'));
$endDate = date('Y-m-d 23:59:59');
$query = "SELECT * FROM seminarorg1 WHERE modifiedtimestamp BETWEEN '$startDate' AND '$endDate' AND flag='0' AND type='seminar'";
echo "Query: $query<br>";

$result = mysqli_query($conn, $query);
if (!$result) {
	    die('Query Error: ' . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
	    $mail = new PHPMailer;
	        $mail->CharSet = 'UTF-8';
	        $mail->isSMTP();
		    $mail->Host = '***';
		    $mail->SMTPAuth = true;
		        $mail->Username = '***';
		        $mail->Password = '***';
			    $mail->SMTPSecure = 'tls';
			    $mail->Port = 25;
			        
			        $emailBody = "<h2>Upcoming Seminars</h2>";
			        $emailBody .= "<p>Below is a list of seminars happening soon. Click on the seminar titles to view more details including abstracts.</p>";

				    while ($row = mysqli_fetch_assoc($result)) {
					       
					            $seminarLink = "#seminar_" . $row['id'];  
						    function generateEmailBody($data, $index) {
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
	        $body .= "<button onclick=\"toggleAbstract('abstract$index')\" style='margin-top: 5px;'>Show/Hide Abstract</button>";
	        $body .= "<div id='abstract$index' style='display:none; margin-top:10px;'><strong>Abstract:</strong><br>" . nl2br($data['abstract']) . "</div>";
	    }

    if (!empty($data['others'])) {
            $body .= "<strong>Other Information:</strong> " . $data['others'] . "<br>";
    }

    $body .= "</div>";
    return $body;
						    }
<script>
function toggleAbstract(id) {
var el = document.getElementById(id);
if (el.style.display === "none") {
el.style.display = "block";
} else {
el.style.display = "none";
}
}
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
const seminarLinks = document.querySelectorAll('a[href^=\"#seminar_\"]');
seminarLinks.forEach(link => {
link.addEventListener('click', function(e) {
e.preventDefault();
const targetId = link.getAttribute('href').substring(1); // Get the target seminar ID
const seminarDetailDiv = document.getElementById(targetId);

if (seminarDetailDiv.style.display === 'none' || seminarDetailDiv.style.display === '') {
seminarDetailDiv.style.display = 'block';
} else {
seminarDetailDiv.style.display = 'none';
}
});
});
        });
    </script>";

    $mail->From = '***';
    $mail->FromName = 'Seminars';
    $mail->addAddress("***");
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
?>

