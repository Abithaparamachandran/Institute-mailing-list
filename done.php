<?php
session_start();
if (isset($_SESSION['success_message'])) {
	    echo $_SESSION['success_message'];
	        unset($_SESSION['success_message']);
}

$servername = "localhost";
$username = "root";
$password = "Password1";
$dbname = "seminar";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
}

$searchDate = date('Y-m-d');
$monthYear = date('Y-m');
$entries = [];


$entrySql = "SELECT * FROM seminarorg WHERE DATE(modifiedtimestamp) = CURDATE() ORDER BY modifiedtimestamp DESC";
$entryResult = $conn->query($entrySql);
if ($entryResult->num_rows > 0) {
	    while ($row = $entryResult->fetch_assoc()) {
		            $entries[] = $row;
			        }
}

require 'PHPMailerAutoload.php'; 

function sendEmail($data) {
	    $mail = new PHPMailer;
	        $mail->CharSet = 'UTF-8';
	        $mail->isSMTP();
		    $mail->Host = 'smtp.iitm.ac.in';
		    $mail->SMTPAuth = true;
		        $mail->Username = 'ebind';
		        $mail->Password = 'pgSiitmcc';
			    $mail->SMTPSecure = 'tls';
			    $mail->Port = 25;
			        $mail->From = $data['email'];
			        $mail->FromName = $data['sender'];

				    $mail->addAddress("seminartesting@list.iitm.ac.in");
				    $mail->isHTML(true);
				        $mail->Subject = "[{$data['select']}] {$data['title']}";
				        $mail->Body = "<strong>Welcome:</strong> {$data['welcome']}<br>
						                   <strong>Title:</strong> {$data['title']}<br>
								                      <strong>Date/Time:</strong> {$data['date']}<br>
										                         <strong>Venue:</strong> {$data['venue']}<br>
													                    <strong>Speaker:</strong> {$data['speaker']}<br>
															                       <strong>Biography:</strong> {$data['biography']}<br>
																	                          <strong>Affiliation:</strong> {$data['affiliation']}<br>
																				                     <strong>Abstract:</strong> {$data['abstract']}<br>
																						                        <strong>Web Conference Link:</strong> {$data['link']}<br>
																									                   <strong>Sender:</strong> {$data['sender']}<br>
																											                      <strong>Department:</strong> {$data['department']}";

    if ($mail->send()) {
        return true;
    } else {
        return $mail->ErrorInfo;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_email'])) {
	    $entryId = $_POST['entry_id'];
	        $entryData = $entries[$entryId]; // Get the specific entry data

	        $emailStatus = sendEmail($entryData);
		    if ($emailStatus === true) {
			            $_SESSION['success_message'] = 'Email sent successfully!';
				        } else {
						        $_SESSION['success_message'] = 'Email sending failed: ' . $emailStatus;
							    }
		    header("Location: " . $_SERVER['PHP_SELF']);
		    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminar Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 9px 50px rgba(0,0,0,0.1);
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="newlogo.png" alt="img">
            </div>
        </div>
    </header>

    <div class="container">
        <h2 class="text-center">Seminar Entries</h2>

        <div class="link-container">
            <a href="http://mx.iitm.ac.in/mailman/admindb/seminars" class="btn btn-info" target="_blank">View Seminar Admin Page</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Welcome</th>
                        <th>Title</th>
                        <th>Speaker</th>
                        <th>Biography</th>
                        <th>Affiliation</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Sender</th>
                        <th>Email</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($entries as $index => $row) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['type']}</td>";
                        echo "<td>{$row['welcome']}</td>";
                        echo "<td>{$row['title']}</td>";
                        echo "<td>{$row['speaker']}</td>";
                        echo "<td>{$row['biography']}</td>";
                        echo "<td>{$row['affiliation']}</td>";
                        echo "<td>{$row['date']}</td>";
                        echo "<td>{$row['venue']}</td>";
                        echo "<td>{$row['sender']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['link']}</td>";
                        echo "<td>
                                <form method='post'>
                                    <input type='hidden' name='entry_id' value='$index'>
                                    <button type='submit' name='send_email' class='btn btn-primary'>Send Email</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Eservices. All rights reserved.</p>
    </footer>
</body>
</html>

