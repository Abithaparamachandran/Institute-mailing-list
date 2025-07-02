	<?php
session_start();
if(!isset($_SESSION['usernamee'])) {
header("location:logout.php");
}
?>

<?php
session_start();
if(isset($_SESSION['usernamee'])) {
	$z=$_SESSION['usernamee'];
}
?>
<?php $type=$_GET['type'];
        $category=$_GET['category'];
        $title=$_GET['title'];
	        $date=$_GET['date'];
	        $venue=$_GET['venue'];
		        $abstract=$_POST['tabstract'];
		        $sender=$_GET['sender'];  ?>

			<script>
			$(document).ready(function () {
$('#register-form').validate({ // initialize the plugin
rules: {
e_type: "required",
name: "required",
email: "required",
sender: "required",
venue: "required",
datetime: "required",
e_name: "required"
},
messages: {
e_type: "Please enter event type",
name: "Please enter name",
email: "Please enter email",
sender: "Please enter senders name",
venue: "Please enter event venue",
datetime: "Please enter event date",
e_name: "Please enter event name"
},
submitHandler: function (form) {
form.submit();
}
});
});
        </script>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Post to Event Mailing List</h3>
                </div>
                <div class="card-body">
                    <form method="post" id="register-form" enctype="multipart/form-data">
                        <!-- Welcome/Greeting Message -->
                        <div class="form-group">
                            <label for="welcome">Welcome/Greeting Message</label>
                            <textarea class="form-control" id="welcome" name="welcome" placeholder="Enter Welcome/Greeting Message"></textarea>
                        </div>

                        <!-- Event Type -->
                        <div class="form-group">
                            <label for="e_type">Event Type *</label>
                            <select class="form-control" id="e_type" name="e_type" onchange="checkvalue(this.value)">
                                <?php if(empty($category)) { ?>
                                    <option value="">--Select Event Type--</option>
                                <?php } else { ?>
                                    <option value="<?php echo $category;?>"><?php echo $category;?></option>
                                <?php } ?>
                                <option value="Classical Event">Classical Event</option>
                                <option value="Muthamizhmandram">Muthamizhmandram</option>
                                <option value="Saarang">Saarang</option>
                                <option value="Shaastra">Shaastra</option>
                                <option value="sports">Sports</option>
                                <option value="Vivekananda Study Circle">Vivekananda Study Circle</option>
                                <option value="Others">Add a New Event</option>
                            </select>
                            <input class="form-control mt-2" type="text" id="etype" name="etype" style="display:none;" placeholder="Please Enter Event Type" required>
                        </div>
			<script>
			function checkvalue(val)
{
    if(val==="Others")
       document.getElementById('etype').style.display='block';
    else
       document.getElementById('etype').style.display='none';
}
</script>
	  
		<!-- Event Title -->
                        <div class="form-group">
                            <label for="e_name">Event Title *</label>
                            <input type="text" class="form-control" id="e_name" name="e_name" placeholder="Enter Event Title" value="<?php echo $title;?>">
                        </div>

                        <!-- Date & Time -->
                        <div class="form-group">
                            <label for="datetime">Date & Time *</label>
                            <input type="text" id="date-range1" class="form-control" name="datetime" placeholder="Enter Date & Time" value="<?php echo $date;?>">
                        </div>

                        <!-- Event Venue -->
                        <div class="form-group">
                            <label for="venue">Venue *</label>
                            <input type="text" class="form-control" id="venue" name="venue" placeholder="Enter Event Venue" value="<?php echo $venue;?>">
                        </div>

                        <!-- About Event -->
                        <div class="form-group">
                            <label for="e_des">About Event</label>
                            <textarea class="form-control" id="e_des" name="e_des" placeholder="Enter Your Message"><?php echo $abstract;?></textarea>
                        </div>

			<script>
			function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024;// in MB
        if (FileSize > 100) {
            alert('Maximum file size is 100 KB');
           file.value = "";
        } else {
        }
  if ( /\.(jpe?g)$/i.test(file.files[0].name) === false ) { alert("Accepted file types are jpg,jpeg!");file.value=""; }

    }
</script>
                        <!-- Upload Image -->
                        <div class="form-group">
                            <label for="fileToUpload">Upload Image (jpeg, jpg, max filesize: 100KB)</label>
                            <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload" onchange="ValidateSize(this)">
                        </div>

                        <!-- Sender's Name -->
                        <div class="form-group">
                            <label for="sender">Sender's Name *</label>
                            <input type="text" class="form-control" id="sender" name="sender" placeholder="Enter Sender's Name" value="<?php echo $sender;?>">
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $z."@iitm.ac.in"; ?>" readonly>
                        </div>

                        <!-- Additional Information -->
                        <div class="form-group">
                            <label for="other">Additional Information</label>
                            <input type="text" class="form-control" id="other" name="other" placeholder="Enter Additional Information">
                        </div>

                        <!-- Note -->
                        <div class="alert alert-info">
                            <p>Note: Kindly provide an attractive image that will be posted on the IITM website. Your posting will be sent to all subscribers of the announcement list.</p>
                        </div>

                        <!-- Buttons -->
                        <div class="form-group text-center">
                            <button class="btn btn-primary" name="submit" formaction="eventsuccess1.php?type=<?php echo $type; ?>">Post Event</button>
                            <button class="btn btn-secondary ml-2" name="preview" formaction="eventpreview.php" formtarget="_blank">Preview Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include necessary scripts and styles for date and time pickers here -->

</body>
</html>

