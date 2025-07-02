<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

if (!isset($_SESSION['usernamee'])) {
	    header("location:logout.php");
	        exit();
}
?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<script src="https://use.fontawesome.com/f59bcd8580.js"></script>
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
if (performance.navigation.type === 1) {
	alert("Cannot reload the page, please goback");
	    }
</script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="font.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<style >
	body{
	background-color:#048f94
	    }
h3{
margin-top:20px;
color:black;
	    }
</style>
	<section id="contact">
	                <div class="section-content">
			<center>
			<div class="tab">
			<img src="newlogo.png"alt="logo"align="center"></img>
			</center>
			<h3>Post to Seminar Mailing List</h3>
			<script>
document.addEventListener('DOMContentLoaded', function() {
	document.getElementById('myButton').addEventListener('click', function(event) {
		event.preventDefault();
		alert('Element clicked!');
	});
	    });
</script>
	</div>
	<div class="contact-section">
	<div class="container">
	<center>
	<form method="post" id="register-form">
	<div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    $type = "seminar";
	        $select = $_POST['select'];
	        $titleinsert = addslashes($_POST['title']);
		    $welcome = $_POST['welcome'];
		    $date = $_POST['date'];
		        $timestamp = date('Y-m-d', strtotime($date));
		        $venue = $_POST['venue'];
			    $speaker = $_POST['speaker'];
			    $biographyinsert = addslashes($_POST['biography']);
			        $affiliationinsert = addslashes($_POST['affiliation']);
			        $abstractinsert = addslashes($_POST['abstract']);
				    $sender = $_POST['sender'];
				    $department = $_POST['department'];
				        $other = $_POST['other'];
				        $email = $_POST['email'];
					    $remindermail = $_POST['remindermail'];
					    $link = $_POST['link'];
					        $mtimestamp = date('Y-m-d H:i:s');
					        $status = "Active";

						    $servername = "localhost";
						    $username = "Mailinglist";
						        $password = "MailinG24List";
						        $databasename = "seminar";
							    $conn = mysqli_connect($servername, $username, $password, $databasename);

							    if (!$conn) {
								            die("Connection failed: " . mysqli_connect_error());
									        }

							        $linkinsert = $other . "-web conference link" . $link;
							        $query = "INSERT IGNORE INTO seminarorg1 (type, category, welcome, title, speaker, biography, affiliation, department, date, reminder_date, remindermail, venue, abstract, sender, email, others, filename, filelocation, flag, modifiedtimestamp, status) VALUES ('$type', '$select', 'NULL', '$titleinsert', '$speaker', '$biographyinsert', '$affiliationinsert', '$department', '$date', '$timestamp', '$remindermail', '$venue', '$abstractinsert', '$sender', '$email', '$linkinsert', NULL, NULL, '0', '$mtimestamp', '$status')";

								    if (mysqli_query($conn, $query)) {
									            $_SESSION['success_message'] = '<div style="color:green;font-weight: bold;border: 2px solid green;padding: 10px;background-color:lightgreen">Thank you! Seminar Submitted Successfully...Your seminar will be moderate at 12.00pm</div>';
										        } else {
												        $_SESSION['error_message'] = '<div style="color:red;font-weight: bold;border: 2px solid red;padding: 10px;background-color:pink">Error: ' . mysqli_error($conn) . '</div>';
													    }

								    mysqli_close($conn);
								    header("Location: " . $_SERVER['PHP_SELF']);
								        exit();
}
?>

<?php
if (isset($_SESSION['success_message'])) {
	    echo $_SESSION['success_message'];
	        unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) {
	    echo $_SESSION['error_message'];
	        unset($_SESSION['error_message']);
}
?>
</div>
</form>
</center>
                        </div>
                        </div>
</div>
                </section>
</body>
</html>
