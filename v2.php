<?php
session_start();
if (!isset($_SESSION['usernamee'])) {
	    header("location:logout.php");
}
?>

<?php
if (isset($_SESSION['usernamee'])) {
	    $z = $_SESSION['usernamee'];
}
?>
<?php
$type = $_GET['type'];
$category = $_GET['category'];
$title = $_GET['title'];
$date = $_GET['date'];
$venue = $_GET['venue'];
$sender = $_GET['sender'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include jQuery Validation Plugin -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

<script>
  $(document).ready(function() {
	  $('#datetimepicker').datetimepicker({
	  
		  
	            icons: {
		            time: 'fas fa-clock',
		            date: 'fas fa-calendar',
		            up: 'fas fa-arrow-up',
			    down: 'fas fa-arrow-down',
			    previous: 'fas fa-chevron-left',
			    next: 'fas fa-chevron-right',
			    today: 'fas fa-calendar-day',
			    clear: 'fas fa-trash',
			    close: 'fas fa-times'
  }
	 
    });
  });
</script>
<style>
    body {
        background-color: #048f94;
    }
</style>
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
                            <label for="welcome"><b>Welcome/Greeting Message</b></label>
                            <textarea class="form-control" id="welcome" name="welcome" placeholder="Enter Welcome/Greeting Message"></textarea>
                        </div>

                        <!-- Event Type -->
                        <div class="form-group">
                            <label for="e_type"><b>Event Type *</b></label>
                            <select class="form-control" id="e_type" name="e_type" onchange="checkvalue(this.value)">
                                <?php if (empty($category)) { ?>
                                    <option value="">--Select Event Type--</option>
                                <?php } else { ?>
                                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                                <?php } ?>
                                <option value="Classical Event">Classical Event</option>
                                <option value="Muthamizhmandram">Muthamizhmandram</option>
                                <option value="Saarang">Saarang</option>
                                <option value="Shaastra">Shaastra</option>
                                <option value="sports">Sports</option>
                                <option value="Vivekananda Study Circle">Vivekananda Study Circle</option>
                                <option value="Others">Add a New Event</option>
                            </select>
                            <input class="form-control mt-2" type="text" id="etype" name="etype" style="display:none;"
                                   placeholder="Please Enter Event Type" required>
                        </div>

                        <!-- Event Title -->
                        <div class="form-group">
                            <label for="e_name"><b>Event Title *</b></label>
                            <input type="text" class="form-control" id="e_name" name="e_name" placeholder="Enter Event Title"
                                   value="<?php echo $title; ?>">
                        </div>

                        <!-- Date & Time -->
                        <div class="form-group">
                            <label for="datetime"><b>Date & Time *</b>(date can be edited)</label>
                            <input type="text" id="datetimepicker" class="form-control" name="date" placeholder="Enter Date & Time" value="<?php echo $date; ?>">
                        </div>

                       
                        <div class="form-group">
                            <label for="venue"><b>Venue *</b></label>
                            <input type="text" class="form-control" id="venue" name="venue" placeholder="Enter Event Venue"
                                   value="<?php echo $venue; ?>">
                        </div>

                        <!-- About Event -->
                        <div class="form-group">
                            <label for="tabstract"><b>About Event</b></label>
                            <textarea class="form-control" id="tabstract" name="tabstract"
                                      placeholder="Enter Your Message"><?php echo $abstract; ?></textarea>
                        </div>

                        <script>
                            function ValidateSize(file) {
                                var FileSize = file.files[0].size / 1024;// in KB
                                if (FileSize > 100) {
                                    alert('Maximum file size is 100 KB');
                                    file.value = "";
                                } else if (/\.(jpe?g)$/i.test(file.files[0].name) === false) {
                                    alert("Accepted file types are jpg, jpeg!");
                                    file.value = "";
                                }
                            }
                        </script>

                        <!-- Upload Image -->
                        <div class="form-group">
                            <label for="fileToUpload"><b>Upload Image (jpeg, jpg, max filesize: 100KB)</b></label>
                            <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload"
                                   onchange="ValidateSize(this)">
                        </div>

                        <!-- Sender's Name -->
                        <div class="form-group">
                            <label for="sender"><b>Sender's Name *</b></label>
                            <input type="text" class="form-control" id="sender" name="sender" placeholder="Enter Sender's Name"
                                   value="<?php echo $sender; ?>">
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email"><b>Email Address *</b></label>
                            <input type="text" class="form-control" id="email" name="email" value="">
                        </div>

                        <!-- Additional Information -->
                        <div class="form-group">
                            <label for="other"><b>Additional Information</b></label>
                            <input type="text" class="form-control" id="other" name="other" placeholder="Enter Additional Information">
                        </div>

                        <!-- Note -->
                        <div class="alert alert-info">
                            <p>Note: Kindly provide an attractive image that will be posted on the IITM website. Your posting will be sent to all subscribers of the announcement list.</p>
                        </div>

                        <!-- Buttons -->
                        <div class="form-group text-center">
                            <button class="btn btn-primary" name="submit" formaction="eventsuccess.php?type=<?php echo $type; ?>">
                                <b>Post Event</b></button>
                         
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include necessary scripts and styles for date and time pickers here -->

<script>
$(document).ready(function () {
$('#register-form').validate({ // initialize the plugin
rules: {
e_type: "required",
e_name: "required",
email: "required",
sender: "required",
venue: "required",
datetime: "required",
},
messages: {
e_type: "Please enter event type",
e_name: "Please enter event name",
email: "Please enter email",
sender: "Please enter sender's name",
venue: "Please enter event venue",
datetime: "Please enter event date",
},
submitHandler: function (form) {
form.submit();
}
				        });
		        });
</script>

</body>
</html>
