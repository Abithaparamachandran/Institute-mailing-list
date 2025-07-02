<?php
session_start();
date_default_timezone_set('Asia/Kolkata');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    if (isset($_POST['email'])) {
		            $email = $_POST['email'];
			        } else {
					        die("Email is required.");
						    }

	        $servername = "localhost";
	        $username = "Mailinglist";
		    $password = "MailinG24List";
		    $databasename = "seminar";


		        $conn = mysqli_connect($servername, $username, $password, $databasename);

		       
		        if (!$conn) {
				        die("Connection failed: " . mysqli_connect_error());
					    }


			    $startDate = date('Y-m-d 12:01:00');
			    $endDate = date('Y-m-d 12:00:00', strtotime('+1 day'));
			        $query = "SELECT * FROM seminarorg1 WHERE modifiedtimestamp BETWEEN '$startDate' AND '$endDate' AND flag='0'";

			        echo "Query: $query<br>";
				    $result = mysqli_query($conn, $query);

				    if (!$result) {
					            die('Query Error: ' . mysqli_error($conn));
						        }

				        if (mysqli_num_rows($result) > 0) {
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

												        while ($row = mysqli_fetch_assoc($result)) {
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
}

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

