<?php
session_start();

if (!isset($_SESSION['usernamee'])) {
	    header("location:logout.php");
	        exit();
}

$z = isset($_SESSION['usernamee']) ? $_SESSION['usernamee'] : '';

$type = isset($_GET['type']) ? $_GET['type'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$filenameold = isset($_SESSION['filename']) ? $_SESSION['filename'] : '';
$filelocationold = isset($_SESSION['filelocation']) ? $_SESSION['filelocation'] : '';
$imagechecker = isset($_SESSION['imagechecker']) ? $_SESSION['imagechecker'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post to Announce Mailing List</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="font.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id="contact">
    <div class="section-content">
        <center><img src="newlogo.png"></center>
        <h3>Post to Announce Mailing List</h3>
        <span style="float:right;margin-right:8%;"><i class="fa fa-user"></i>&nbsp;<?php echo $z; ?>&nbsp;&nbsp;<a href="logout.php" style="color:white;">Logout</a></span>
    </div>
    <div class="contact-section">
        <div class="container">
            <center>
                <form method="post" id="register-form">
                    <div>
                        <?php
                        header('Content-Type: text/html; charset=utf-8');

                        if (empty($_POST['atype'])) {
				                            $a_type = $_POST['atypemain'];
							                            } else {
											                                $a_type = $_POST['atype'];
															                        }

			                        $atitle = addslashes($_POST['atitle']);
			                        $atitlenew = str_replace("\'", "'", $atitle);

						                        $email = $_POST['email'];
						                        $sender = $_POST['sender'];
									                        $des = $_POST['des'];
									                        $desinsert = addslashes($_POST['des']);
												                        $desnew = str_replace("\'", "'", $desinsert);

												                        $other = $_POST['other'];
															                        $flag = "1";
															                        $imagechecker = $_POST['imagechecker'];

																		                        $filecid = "1001";
																		                        $filename = $_FILES["fileToUpload"]["name"];

																					                        if (!empty($filename)) {
																									                            $nam = "announce" . date("d-m-Y H:i");
																												                                $fullpath = '10.24.8.213/seminar/upload/' . $nam;

																												                                $tmp_name = $_FILES['fileToUpload']['tmp_name'];
																																                            $location = '/var/www/html/seminar/upload/' . $nam;
																																                            if (move_uploaded_file($tmp_name, $location)) {
																																				                                    
																																				                                }
																																			                            }

																					                        $servername = "localhost";
																					                        $username = "Mailinglist";
																								                        $password = "MailinG24List";
																								                        $databasename = "seminar";
																											                        $conn = mysqli_connect($servername, $username, $password, $databasename);

																											                        mysqli_query($conn, 'SET charactier_set_results=utf8');
																														                        mysqli_query($conn, 'SET names=utf8');
																														                        mysqli_query($conn, 'SET character_set_client=utf8');
																																	                        mysqli_query($conn, 'SET character_set_connection=utf8');
																																	                        mysqli_query($conn, 'SET character_set_results=utf8');
																																				                        mysqli_query($conn, 'SET collation_connection=utf8_general_ci');

																																				                        $result = mysqli_query($conn, "SET NAMES utf8");

																																							                        if (empty($id)) {
																																											                            $query = "INSERT INTO seminarorg (type,category,title,remindermail,abstract,sender,email,others,filename,filelocation,flag)VALUES('$type','$a_type','$atitle','$imagechecker','$desinsert','$sender','$email','$other','$nam','$fullpath','$flag')";
																																														                            } elseif (!empty($id) && !empty($filename)) {
																																																		                                $query = "UPDATE seminarorg SET type='$type', category='$a_type',title='$atitle',remindermail='$imagechecker',abstract='$desinsert',sender='$sender',email='$email',others='$other',filename='$nam',filelocation='$fullpath',flag='$flag' WHERE id='$id'";
																																																						                        } else {
																																																										                            $query = "UPDATE seminarorg SET type='$type', category='$a_type',title='$atitle',remindermail='$imagechecker',abstract='$desinsert',sender='$sender',email='$email',others='$other',flag='$flag' WHERE id='$id'";
																																																													                            }

																																							                        $result1 = mysqli_query($conn, $query);
																																							                        if (!$result1) {
																																											                            die('Error: ' . mysqli_error($conn));
																																														                            }

																																										                        echo "Thank you! Announce has been saved.!"; ?>
																																										                        &nbsp;<a href="showsavedannounces1.php?type=<?php echo $type; ?>&useremail=<?php echo $z . "@iitm.ac.in"; ?>"
																																														                                style="font-weight:bold;"><i class="fa fa-bookmark"></i>&nbsp;Saved Announces</a>
																																																		                    </div>
																																																				                    </form>
																																																						                </center>
																																																								        </div>
																																																									    </div>
																																																									        <br><br>
																																																										    <center>
																																																										            <font>Copyright © 2024 All rights reserved | Developed and Maintained by <a
																																																											                        style="cursor:point;color:white;" href="http://eservices.iitm.ac.in">Eservices, Computer Centre,
																																																														                IITM</a></font>
																																																																    </center>
																																																																    </section>
</body>
</html>
