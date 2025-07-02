<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prevent Page Refresh</title>
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('myForm').addEventListener('submit', function(event) {
      
		            event.preventDefault();
			                
			            });
	    });
    </script>
	    </head>
	    <body>


	    <form id="myForm">
    <label for="fname">First Name:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">Last Name:</label><br>
    <input type="text" id="lname" name="lname"><br><br>
    <button type="submit">Submit</button>
</form>

</body>
</html>

