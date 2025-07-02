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


$startDate = '2025-06-05 13:00:00';


$endDate = '2025-06-06 14:00:00';

$query = "SELECT * FROM seminarorg WHERE modifiedtimestamp BETWEEN '$startDate' AND '$endDate' AND flag='1' AND type='seminar'";

echo "Query: $query<br>";

$result = mysqli_query($conn, $query);
if (!$result) {
	    die('Query Error: ' . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
	    

	    $emailBody = "<h2>Seminars</h2>";
	        $senderEmail = '';

	        while ($row = mysqli_fetch_assoc($result)) {
			        if (!$senderEmail) {
					            $senderEmail = $row['email'];
						            }
				        $emailBody .= generateEmailBody($row);

				       
				        $updateQuery = "UPDATE seminarorg SET flag='0' WHERE id='" . $row['id'] . "'";
					        mysqli_query($conn, $updateQuery);
					    }

		   
		    $emailsToReset = [
			             'cyoffice@iitm.ac.in',
										                                             'edoffice@iitm.ac.in',
															     'choffice@iitm.ac.in',
								            'abhijit@iitm.ac.in'
										        ];

		    $registrationTime = '2025-06-06 14:00:00';

		    $emailsCondition = "'" . implode("','", $emailsToReset) . "'";

		        $resetQuery = "UPDATE seminarorg SET flag='0' WHERE email IN ($emailsCondition) AND modifiedtimestamp = '$registrationTime'";
		        mysqli_query($conn, $resetQuery);

			    echo "Flag has been updated.<br>";
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

