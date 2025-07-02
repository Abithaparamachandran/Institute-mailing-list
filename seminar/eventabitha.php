<?php
session_start();
if (!isset($_SESSION['usernamee'])) {
	    header("location:logout.php");
}

if (isset($_SESSION['usernamee'])) {
	    $z = $_SESSION['usernamee'];
}
?>

<?php
$type = $_GET['type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Post Event</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="font.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #048f94;
        }

        .section-content {
            text-align: center;
        }

     

        .tab img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        h3 {
            margin-top: 20px;
            color: black;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .footer {
            text-align: center;
            background-color: white;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<section id="contact">
    <div class="section-content">
        <div class="tab">
            <img src="newlogo.png" alt="logo">
        </div>
        <h3>Post to Event Mailing List</h3>
    </div>
    <div class="contact-section">
        <div class="container">
            <center>
                <form method="post" id="register-form" enctype="multipart/form-data">
<?php
session_start();
if (isset($_SESSION['success_message'])){
	        echo $_SESSION['success_message'];
		        unset($_SESSION['success_message']);
}

// Check if the form has been submitted
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Set a session variable to indicate that the form has been submitted
       //  $_SESSION['form_submitted'] = true;

                    header('Content-Type: text/html; charset=utf-8');

                    $welcome = $_POST['welcome'];
		    if (empty($_POST['etype'])) {
		   $e_type = $_POST['e_type'];
		    } else {
		$e_type = $_POST['etype'];
															                        }
		    $email = $_POST['email'];
		    $venue = $_POST['venue'];
		    $sender = $_POST['sender'];
	            $date = $_POST['date'];
                    $e_name = $_POST['e_name'];
		    $e_nameinsert = addslashes($_POST['e_name']);
		    $e_des = $_POST['e_des'];
		    $e_desinsert = addslashes($_POST['e_des']);
		    $other = $_POST['other'];

		    $timestamp = date('Y-m-d H:i:s');
		    $status = "Active";

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
		    $filename = $_FILES["fileToUpload"]["name"];
		   if (empty($filename)) {
																													} else {
																													$nam = "event" . date("d-m-Y H:i");
																													$fullpath = '10.24.8.213/seminar/upload/' . $nam;
																												           }
		     $tmp_name = $_FILES['fileToUpload']['tmp_name'];
		     $location = '/var/www/html/seminar/upload/' . $nam;
		     if (move_uploaded_file($tmp_name, $location)) {
		                          }
                     $mail->addAddress("ccprj05@iitm.ac.in");
                     $mail->isHTML(true);
                     $mail->Subject = "[" . $e_type . "]" . $e_name;
                     if (empty($welcome)) {
                     $mail->Body .= "";
		     } else {
		     $mail->Body .= $welcome . "<br>";
																												        }
                     $mail->Body .= "
                     <table>
                     <tr>
                     <td style='width:16%; color:#000066; font-weight:bold;'>Event Title:</td>
                     <td>" . $e_name . "</td>
                     </tr>
                     <tr>
                     <td style='color:#000066; font-weight:bold;'>Date/Time:</td>
                     <td>" . $date . "</td>
                     </tr>
                     <tr>
                     <td style='color:#000066; font-weight:bold;'>Venue:</td>
                     <td>" . $venue . "</td>
                     </tr>
                     </table>";
		     if (empty($e_des)) {
                     $mail->Body .= "";
                     } else {
                        $mail->Body .= "<br><font style='color:#000066; font-weight:bold;'>About Event:</font><br>" . nl2br($e_des) . "<br>";
                     }
                     if (empty($nam)) {
		     $mail->Body .= "";
		     } else {
		     $mail->Body .= "<img src='$fullpath'>";
		     }

		     if (empty($other)) {
		     $mail->Body .= "";
		     } else {
																													 $mail->Body .= "<br><font style='color:#000066; font-weight:bold;'>Other Information:</font>" . $other . "<br><br>";
																																																					                    }
                      $mail->Body .= "<br><br><font style='color:#000066; font-weight:bold;'>" . $sender . "</font>";

	              if (!$mail->send()) {
																													 echo '<div class="alert alert-danger">Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</div>';
																													 } else {
																													 $servername = "localhost";
		      $username = "root";
		      $password = "Password1";
		      $databasename = "seminar";
		      $conn = mysqli_connect($servername, $username, $password, $databasename);
		      if ($conn) {
		      $query = "INSERT INTO seminarorg (type, category, welcome, title, date, venue, abstract, sender, email, others, filename, filelocation, modifiedtimestamp, status) VALUES ('$type', '$e_type', '$welcome', '$e_nameinsert', '$date', '$venue', '$e_desinsert', '$sender', '$email', '$other', '$nam', '$fullpath', '$timestamp', '$status')";
		      $result1 = mysqli_query($conn, $query);
		     /* if (!$result1) {
		      echo '<div class="alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
																													  } else {
		       echo '<div class="alert alert-success">Thank you! Event Submitted Successfully...</div>';
			}
                        } else {
				echo '<div class="alert alert-danger">Unable to connect to the database.</div>';
				header("Location: ".$_SERVER['PHP_SELF']);
				exit();*/
//$lastID = mysqli_insert_id($conn);
	     if($result1)
		      {


			      if($mail->send()) {

				      $queryUpdate = "update seminarorg set flag='1' where id = '$lastID'";

$resultUpdate=mysqli_query($conn,$queryUpdate);
if($resultUpdate){
/*$_SESSION['success_message'] = '<div style="color:green;font-weight: bold;border: 2px solid green;padding: 10px;background-color:lightgreen">Thank you! Seminar Submitted Successfully...!</div>';
header("Location: ".$_SERVER['PHP_SELF']);
exit();
}else{
        echo 'Message could not be sent.';

}
			}
		      }			 }
			      // }*/
			  $_SESSION['success_message'] = '<div style="color:green;font-weight:bold;border:2px solid green;padding:10px;background-color:lightgreen">Thank you! Seminar Submitted Successfully...!</div>';
                $_SESSION['email_sent'] = true; // Set email_sent flag to prevent resending
                header("Location: ".$_SERVER['PHP_SELF']);
                exit();
            } else {
                echo 'Error updating database.';
            }
        } else {
            echo 'Message could not be sent.';
        }
    } else {
        echo '<div class="alert alert-danger">Unable to connect to the database.</div>';
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}}}																												?>
                </form>
            </center>
        </div>
    </div>
</section>


</body>
</html>
