<?php
session_start();

if (!isset($_SESSION['usernamee'])) {
	    header("location:logout.php");
	        exit();
}

$z = $_SESSION['usernamee'];

$type = isset($_GET['type']) ? $_GET['type'] : '';
$useremail = isset($_GET['useremail']) ? $_GET['useremail'] : '';

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
<section id="contact" style="height:auto !important;min-height:200px;">
    <div class="section-content">
        <form method="post" name="register-form">
            <center><img src="newlogo.png"></center>
            <br><br>
            <h3>Post To Announce Mailing List</h3>
            <span style="float:right;margin-right:8%;"><i class="fa fa-user"></i>&nbsp;<?php echo $z; ?>&nbsp;&nbsp;<a href="logout.php" style="color:brown;">Logout</a></span>
        </form>
    </div>
    <div class="contact-section">
        <div class="container">
            <center>
                <?php
                $servername = "localhost";
                $username = "Mailinglist";
                $password = "MailinG24List";
                $databasename = "seminar";
                $conn = mysqli_connect($servername, $username, $password, $databasename);

		 $result = mysqli_query($conn, "SET NAMES utf8");//the main trick

		  $result = "SELECT * FROM seminarorg WHERE type='$type' AND email='$useremail' AND flag='1'";
		 $result1 = mysqli_query($conn, $result);

		$rowcount = mysqli_num_rows($result1);
		if ($rowcount == "0") {
		echo "No saved announces in your profile";
		} else {
		while ($row2 = mysqli_fetch_assoc($result1)) {
		$_SESSION['id'] = $row2['id'];
		$_SESSION['a_type'] = $row2['category'];
		$_SESSION['atitle'] = $row2['title'];
		$_SESSION['des'] = $row2['abstract'];
		$_SESSION['sender'] = $row2['sender'];
		$_SESSION['email'] = $row2['email'];
		$_SESSION['other'] = $row2['others'];
		$_SESSION['filename'] = $row2['filename'];
		$_SESSION['filelocation'] = $row2['filelocation'];
		$_SESSION['imagechecker'] = $row2['remindermail'];
		?>
                <div style="width:95%;border:1px solid white;text-align:left;line-height:25px;padding:8px;background:#f9f6f6;color:black;">
                            <font>Announcement Subject :</font> [<?php echo $_SESSION['a_type']; ?>] <?php echo $_SESSION['atitle']; ?><br>
                            <?php echo nl2br($_SESSION['des']); ?><br>
                            <?php if (!empty($_SESSION['other'])) { ?>
                                <font>Additional Information :</font><?php echo $_SESSION['other']; ?><br>
                            <?php } ?>
                            <font><?php echo $_SESSION['sender']; ?></font><br>
                            <?php if (!empty($_SESSION['imagechecker']) && !empty($_SESSION['filelocation'])) { ?>
                                <img src="<?php echo $_SESSION['filelocation']; ?>" style="width:40%;height:auto;"><br>
                            <?php } ?>
                            <button class="btn btn-default submit" name="announceedit"
                                    formaction="v.php?type=<?php echo $type; ?>&id=<?php echo $_SESSION['id']; ?>"
                                    style="background:#0088cc;">Edit Announce
                            </button>
                            <a class='btn btn-default submit' style='background:#0088cc !important;'
                               onclick='javascript:confirmationDelete($(this));return false;'
                               href='announcedelete.php?type=<?php echo $type; ?>&useremail=<?php echo $useremail; ?>&id=<?php echo $_SESSION['id']; ?>'>Delete Announce</a>
                            <button class="btn btn-default submit" name="announcesave"
                                    formaction="announcesaveandsend.php?type=<?php echo $type; ?>&id=<?php echo $row2['id']; ?>&useremail=<?php echo $useremail; ?>"
                                    style="background:#0088cc;">Send Announce
                            </button>
                            <hr style="border:1px solid black;">
                        </div>
                    <?php }
                }
                ?>
            </center>
        </div>
    </div>
    <br><br>
    <center><font>Copyright © 2024 All rights reserved | Developed and Maintained by <a
                    style="cursor:point;color:black;" href="http://eservices.iitm.ac.in">Eservices,Computer Centre,IITM</font></center>
</section>
						<script>
						    function confirmationDelete(anchor) {
							            var conf = confirm('Are you sure want to delete this record?');
								            if (conf)
										                window.location = anchor.attr("href");
									        }
						</script>
</body>
</html>

