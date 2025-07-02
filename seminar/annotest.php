
<?php
session_start();
if(isset($_SESSION['usernamee'])){
	$z=$_SESSION['usernamee'];
}
?>
<?php
header('Content-Type: text/html; charset=utf-8');

$conn = mysqli_connect("localhost","root","Password1");
mysqli_select_db("seminar",$conn);

mysqli_query('SET character_set_results=utf8');
mysqli_query('SET names=utf8');
mysqli_query('SET character_set_client=utf8');
mysqli_query('SET character_set_connection=utf8');
mysqli_query('SET character_set_results=utf8');
mysqli_query('SET collation_connection=utf8_general_ci');

$result = mysqli_query("SET NAMES utf8");//the main trick

?>
<!--?php include("connection.php");?-->

<?php $type=$_GET['type'];  $id=$_GET['id'];?>

<?php
$result=mysqli_query("select * from seminarorg where type='$type' and id='$id'");
        while ($row2 = mysqli_fetch_assoc($result)) {
		        $atitle=$row2['title'];
			        $des=$row2['abstract'];
			        $sender=$row2['sender'];
				        $other=$row2['others'];
				        $_SESSION['filename']=$row2['filename'];
					        $_SESSION['filelocation']=$row2['filelocation'];
					        $_SESSION['imagechecker']=$row2['remindermail'];}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post to Announce Mailing List</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom CSS if needed -->

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Your custom CSS and JavaScript files here -->

    <!-- Include jQuery validation plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!-- Include jQuery Rich Text Editor script -->
    <link rel="stylesheet" href="examples/richcss/site.css">
    <link rel="stylesheet" href="examples/richsrc/richtext.min.css">
    <script src="examples/richsrc/jquery.richtext.js"></script>

    <script>
        $(document).ready(function () {
            $('#register-form').validate({ // initialize the plugin
                rules: {
                    atypemain: "required",
                    atype: "required",
                    atitle: "required",
                    email: "required",
                    sender: "required",
                    des: "required"
                },
                messages: {
                    atypemain: "Please select announce subject",
                    atype: "Please select specific subject",
                    atitle: "Please enter announce title",
                    email: "Please enter email",
                    sender: "Please enter sender's name",
                    des: "Please enter the body of the message"
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });

	                $('.content').richText();
	            });
	    </script>

    <script>
        function ValidateSize(file) {
            var FileSize = file.files[0].size / 1024; // in MB
            if (FileSize > 100) {
                alert('Maximum file size is 100 KB');
                file.value = "";
            } else {
            }
            if (/\.(jpe?g)$/i.test(file.files[0].name) === false) {
                alert("Accepted file types are jpg, jpeg!");
                file.value = "";
            }
        }
    </script>

    <script>
        $(document).ready(function () {
            $("#atypemain").change(function () {
                $.get('category.php?atypemain=' + $(this).val(), function (data) {
                    $("#announcecategory").html(data);
                });
                return false;
            });
        });
    </script>
<style>
body{
background-color:#048f94;
}
</style>
</head>

<body>

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">
<h3 class="text-center">Post to Announce Mailing List</h3></div>


<div class="card-body">
            <form method="post" id="register-form" enctype="multipart/form-data">

	    <span style="float:right;margin-right:8%;"><a href="showsavedannounces.php?type=<?php echo $type;?>&useremail=<?php echo $z."@iitm.ac.in";?>" style="font-weight:bold;"><i class="fa fa-bookmark"></i>&nbsp;Saved Announces</a></span> 
	<!-- Announcement Subject -->
                <div class="form-group">
                    <label for="atypemain"><b>Announcement Subject*</b></label>
                    <select name="atypemain" id="atypemain" class="form-control">
			<option value="">--Select Announcement Subject--</option>
                        
			<!-- Populate options dynamically using PHP -->
                        <?php
                        $servername="localhost";
$username="Mailinglist";
$password="MailinG24List";
$dbname="seminar";
 $con=mysqli_connect($servername,$username,$password,$dbname);

        if ($con){
		                              echo "connected";
					                              }else{
									                                            echo "not connect";
														                                                 }

$list1 = "SELECT * FROM announcetype order by type asc";
$result=mysqli_query($con,$list1);
        while ($row = mysqli_fetch_assoc($result)) {
		        $announcetype=$row['type'];     ?>
			<option value="<?php echo $announcetype;?>"><?php echo $announcetype;?></option><?php } ?>
                    </select>
                </div>

                <!-- Upload Image -->
		<div class="form-group">
<?php if($_SESSION['filelocation']==''){?>
                    <label for="fileToUpload"><b>Upload Image (File Type: jpeg, jpg, Maximum File Size: 100KB)</b></label>
		    <input type="file" class="form-control" value=""name="fileToUpload" onchange="ValidateSize(this)">
<?php } else { ?>
<b>Saved Image Preview. Click Image to enlarge</b><a href="<?php echo $_SESSION['filelocation'];?>" target="_blank"><img src="<?php echo $_SESSION['filelocation'];?>" style="width:15%;height"></a>
<?php  }?>
                </div>
<div class="form-group"id="announcecategory">
</div>

                <!-- Announcement Title -->
                <div class="form-group">
                    <label for="atitle"><b>Announcement Title*</b></label>
		    <input type="text"value="<?php echo $atitle;?>" class="form-control"value="" name="atitle">
                </div>

                <!-- Body of the Message -->
                <div class="form-group">
                    <label for="des"><b>Body of the Message (Upload image will embed image with body of the message. Formatted messages can be pasted here.)</b></label>
		    <textarea class="form-control content" name="des" required><?php echo $des;?></textarea>
                </div>

                <!-- Sender's Name -->
                <div class="form-group">
                    <label for="sender"><b>Sender's Name*</b></label>
		    <input type="text" class="form-control" name="sender"value="<?php echo $sender;?>"value="">
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email"><b>Email Address*</b></label>
		    <input type="text" class="form-control" name="email"value="" name="email">
                </div>

                <!-- Additional Information -->
                <div class="form-group">
                    <label for="other"><b>Additional Information</b></label>
		    <input type="text" class="form-control" name="other"value="<?php echo $other;?>">
		</div>
 <div class="alert alert-info">
                            <p>Note: Kindly provide an attractive image that will be posted on the IITM website. Your posting will be sent to all subscribers of the announcement list.</p>
                        </div>

                <!-- Image Display Agreement -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="imagechecker" value="Yes">
                    <label class="form-check-label" for="imagechecker">
                       <b> I agree to display my image in Announce Mail and on the IITM website.</b>
                    </label>
                </div>

                <!-- Submit Buttons -->
                <div class="text-center mt-3">
                    <button class="btn btn-primary" name="submit" formaction="announcesave.php?type=<?php echo $type; ?>&id=<?php echo $id; ?>"><b>Save & Send Later</b></button>
                    <button class="btn btn-success" name="submit" formaction="anno.php?type=<?php echo $type; ?>&id=<?php echo $id; ?>"><b>Post Announce</b></button>
                  
                    
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>

