<?php
session_start();

$type = $_GET['type'];
$id = $_GET['id'];
$filenameold = $_SESSION['filename'];
$filelocationold = $_SESSION['filelocation'];
$imagechecker = $_SESSION['imagechecker'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    require 'PHPMailerAutoload.php';

	      
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
					        mysqli_query($conn, 'SET NAMES utf8');

					        
					        if (empty($id)) {
							        $query = "INSERT INTO seminarorg (type, category, title, remindermail, abstract, sender, email, others, filename, filelocation, flag) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
								    } else {
									            $query = "UPDATE seminarorg SET type=?, category=?, title=?, remindermail=?, abstract=?, sender=?, email=?, others=?, flag=? WHERE id=?";
										        }
						    $stmt = mysqli_prepare($conn, $query);
						    mysqli_stmt_bind_param($stmt, "ssssssssssi", $type, $a_type, $atitleinsert, $imagechecker, $destags, $sender, $email, $other, $nam, $fullpath, $flag);

						        if (mysqli_stmt_execute($stmt)) {
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

														       
														        $filename = $_FILES["fileToUpload"]["name"];
														        if (!empty($filename)) {
																            $nam = "announce" . date("d-m-Y_H-i-s");
																	                $fullpath = 'http://10.24.8.213/seminar/upload/' . $nam;
																	                $tmp_name = $_FILES['fileToUpload']['tmp_name'];
																			            $location = '/var/www/html/seminar/upload/' . $nam;
																			            if (move_uploaded_file($tmp_name, $location)) {
																					                    
																					                }
																				            }

															       
															        $mail->addAddress("announce@list.iitm.ac.in");
															        $mail->isHTML(true);
																        $mail->Subject = "[" . $a_type . "] " . $atitle;
																        $mail->Body = $des . "<br><br>";

																	        if (!empty($other)) {
																			            $mail->Body .= "<strong>Other Information:</strong> " . $other . "<br>";
																				            }

																	        if (!empty($filename)) {
																			            
																			            $mail->addEmbeddedImage($location, 'image_cid', $filename);
																				                $mail->Body .= "<br><img src='cid:image_cid'><br><br>";
																				            }

																	        $mail->Body .= "<strong>" . $sender . "</strong><br><br>";

																	        if ($mail->send()) {
																			            $_SESSION['success_message'] = '<div style="color:green; font-weight: bold;border: 2px solid green; padding: 10px;background-color: lightgreen">Thank you! Announcement Submitted Successfully...!</div>';
																				                header("Location: " . $_SERVER['PHP_SELF']);
																				                exit();
																						        } else {
																								            echo 'Message could not be sent. ' . $mail->ErrorInfo;
																									            }
																		    } else {
																			            echo "Database operation failed: " . mysqli_error($conn);
																				        }

						        mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="bootstrap.min.js"></script>
    <style>
        body {
            background-color: #048f94;
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
            alert("Cannot reload the page, please go back");
        }
    </script>
</head>
<body>
<section id="contact">
    <div class="section-content">
        <center><img src="newlogo.png" alt="Logo"></center>
        <br><br>
        <span style="float:right;margin-right:8%;">
            <a href="showsavedannounces.php?type=<?php echo htmlspecialchars($type); ?>&useremail=<?php echo htmlspecialchars($z . "@iitm.ac.in"); ?>"
               style="font-weight:bold;"><i class="fa fa-bookmark"></i>&nbsp;Saved Announces</a>
        </span>
    </div>

    <div class="contact-section">
        <div class="container">
            <center>
                <form method="post" id="register-form" enctype="multipart/form-data">
                    <div>
                        <?php
                        if (isset($_SESSION['success_message'])) {
                            echo $_SESSION['success_message'];
                            unset($_SESSION['success_message']); 
                        }
                        ?>
                       
                    </div>
                </form>
            </center>
        </div>
    </div>
</section>
</body>
</html>

