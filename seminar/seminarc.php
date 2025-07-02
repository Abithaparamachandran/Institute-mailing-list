<?php
session_start();
if(!isset($_SESSION['usernamee'])){
	header("location:logout.php");
}
?>
<?php
session_start();
if(isset($_SESSION['usernamee'])){
	$z=$_SESSION['usernamee'];
}
?>
<?php $type=$GET['type'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script> 
</head>
<style>
body{
background-color:#048f94;
}
</style>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
	<div class="col-md-8">
<div class="card">
<div class="card-header">
                    <h3 class="text-center">Post to Seminar  Mailing List</h3>
                </div>
         <div class="card-body">  
            <form id="register-form" name="register-form" method="post" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="remindermail" class="form-label"><b>Check this to send reminder</b></label>
                    <input type="checkbox" name="remindermail" id="remindermail" value="yes">
                    <small class="form-text"><b>Reminder will be sent a day before your seminar date to seminars@list.iitm.ac.in</b></small>
                </div>
                <div class="mb-3">
                    <label for="select" class="form-label"><b>Seminar Type</b> <b style="font-size:20px;">*</b></label>
                    <select name="select" id="select" class="form-select" onchange='checkvalue(this.value)'>
                        <option value="">--Select Seminar Type--</option>
                        <option value="Research Proposal Seminars">Research Proposal seminars</option>
                        <option value="Research Scholar Seminars">Research Scholar seminars</option>
                       <option value="Guest Lectures">Guest lectures</option>
<option value="Technical Talk">Technical talk</option>
<option value="Special Seminar">Special seminar</option>
<option value="Viva Voce">Viva Voce</option>
<option value="Colloquium">Colloquium</option>
<option value="Seminar Cancellation">Seminar Cancellation</option>
<option value="Seminar Postponed">Seminar Postponed</option>
<option value="MS Seminar">MS Seminar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="welcome" class="form-label"><b>Welcome</b></label>
                    <textarea name="welcome" id="welcome" class="form-control" required placeholder="Enter Welcome Message"></textarea>
                </div>
		<div class="mb-3">
<label for="title"class="form-label"><b>Title*</b></label>
<input type="text"name="title"id="title"class="form-control"required placeholder="Enter Seminar Title"value="">
</div>
<div class="mb-3">
<label for="speaker"class="form-label"><b>Speaker*</b></label>
<input type="text"name="speaker"class="form-control"required placeholder="Enter Speaker"required value="<?php echo $speaker;?>">
</div>
<div class="mb-3">
<label for="biography"class="form-label"><b>Biography of the speaker</b></label>
<textarea name="biography"id="biography"class="form-control"required placeholder="Enter Biography of the Speaker"></textarea>
</div>
<div class="mb-3">
<label for="affiliation"class="form-label"><b>Affiliation of the speaker</b></label>
<textarea name="affiliation"id="affiliation"class="form-control"required placeholder="Commitee Member Name,Guide Name,DC Members,GTC Members can be filled here"></textarea>
</div>
<div class="mb-3">
<label for="department"class="form-label"><b>Department*</b></label>
<input type="text" name="department"class="form-control"required placeholder="Enter Your Department"value="">
</div>

<div class="mb-3">
<label for="date"class="form-label"><b>Date & Time*</b>(date can be edited)</label>
<input type="text"class="form-control"name="date"id="datetimepicker" placeholder="Enter Date/Time"value="">
</div>
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

<div class="mb-3">
<label for="venue"class="form-label"><b>Venue*</b></label>
<input type="text"class="form-control"name="venue"required placeholder="Enter Seminar Venue"value="">
</div>

<div class="mb-3">
<label for="abstract"class="form-label"><b>Abstract(Please enter below 500 Characters)</b></label>
<div contenteditable="true" id="abstract" class="form-control" placeholder="Enter Seminar Abstract" style="min-height: 100px;"></div>
<input type="hidden" name="abstract" id="abstract">
</div>

<!--textarea name="abstract"class="form-control"placeholder="Enter Seminar Abstract"></textarea-->
</div>
<script>
function applyStyles() {
	 const contentDiv = document.getElementById("abstract");
	 contentDiv.style.fontFamily = 'Calibri';
	 contentDiv.style.fontSize = '11px';
}
 document.querySelector("form").addEventListener("submit", function(event) {
	 applyStyles();
 });
</script>



                <div class="mb-3">
                    <label for="fileToUpload" class="form-label"><b>Upload Image (File Type: jpeg, jpg, Maximum File Size: 100KB)</b></label>
                    <input type="file" name="fileToUpload" id="fileToUpload" onchange="ValidateSize(this)" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="sender" class="form-label"><b>Sender's Name </b><b style="font-size:20px;">*</b></label>
                    <input type="text" name="sender" id="sender" required class="form-control" placeholder="Enter Sender's Name" value="">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"><b>Email Address</b> <b style="font-size:20px;">*</b></label>
		    <input type="text" name="email" id="email" value="<?php echo$z?>@iitm.ac.in" required class="form-control"readonly>
                </div>
                <div class="mb-3">
                    <label for="other" class="form-label"><b>Additional Information</b></label>
                    <input type="text" name="other" id="other" class="form-control" placeholder="Enter Additional Information">
		</div>
<div class="mb-3">
<label for="link"class="form-label"><b>Enter the Web Conference Link</label>
<input type="text"name="link"id="link"class="form-control"placeholder="Mention the web conferncing link either zoom or hangout or mention the meeting link where the seminars will happen"></div>

 <div class="alert alert-info">
                            <p>Note: Kindly provide an attractive image that will be posted on the IITM website. Your posting will be sent to all subscribers of the announcement list.</p>
                        </div>
                <div class="text-center">
                    <button class="btn btn-primary" name="submit" formaction="store_seminar.php?type=<?php echo $type; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i><b> Post Seminar</b></button>
                   
                </div>
            </form>
        </div>
    </div>
</div>
</div>
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


<script>
$(document).ready(function () {
	$('#register-form').validate({ // initialize the plugin
	rules: {
	select: "required",
		title: "required",
		speaker: "required",
		department: "required",
		date: "required",
		venue: "required",
		sender: "required"
},
	messages: {
	select:"Please select seminar type",
		title: "Please enter seminar title",
		speaker: "Please enter speaker name",
		department: "Please enter department",
		date: "Please enter date and time",
		venue: "Please enter seminar venue",
		sender: "Please enter senders name"
},
	submitHandler: function (form) {
		form.submit();
	}
});
});
</script>


</body>
</html>
