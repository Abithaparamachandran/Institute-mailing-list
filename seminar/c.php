<?php
$servername = "localhost";
$username = "root";
$password = "Password1";
$dbname = "seminar";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
}

$searchDate = date('Y-m-d'); 
$entries = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    $searchDate = $_POST['search_date']; 
	        
	        $entrySql = "SELECT * FROM seminarorg WHERE DATE(modifiedtimestamp) = '$searchDate' ORDER BY modifiedtimestamp DESC";
} else {
	  
	    $entrySql = "SELECT * FROM seminarorg WHERE DATE(modifiedtimestamp) = CURDATE() ORDER BY modifiedtimestamp DESC";
}

$entryResult = $conn->query($entrySql);

if ($entryResult->num_rows > 0) {
	    while ($row = $entryResult->fetch_assoc()) {
		            $entries[] = $row;
			        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminar Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            padding: 20px;
            width: 1800px;
            background: #ffffff;
            box-shadow: 0 9px 50px rgba(0,0,0,0.1);
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        table {
            width: 100%;
            table-layout: auto;
        }
        th, td {
            overflow-wrap: break-word;
            white-space: normal;
            padding: 5px;
        }
        th {
            background-color: #f2f2f2;
        }
        .link-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .navbar-header {
            display: flex;
            justify-content: center;
            width: 100%;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="newlogo.png" alt="img">
            </div>
        </div>
    </header>

    <div class="container">
        <h2 class="text-center">Seminar Entries</h2>

        <div class="link-container">
            <a href="http://mx.iitm.ac.in/mailman/admindb/seminars" class="btn btn-info" target="_blank">View Seminar Admin Page</a>
        </div>

        <form method="post" class="text-center">
            <div class="form-group">
                <input type="date" name="search_date" required class="form-control" value="<?php echo $searchDate; ?>" style="display: inline-block; width: auto; margin-bottom: 20px;">
                <input type="submit" value="Search" class="btn btn-primary">
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Welcome</th>
                        <th>Title</th>
                        <th>Speaker</th>
                        <th>Biography</th>
                        <th>Affiliation</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Reminder Date</th>
                        <th>Venue</th>
                        <th>Sender</th>
                        <th>Email</th>
                        <th>Others</th>
                        <th>Flag</th>
                        <th>Registration Time & Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($entries)) {
                        foreach ($entries as $row) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['type']}</td>";
                            echo "<td>{$row['category']}</td>";
                            echo "<td>{$row['welcome']}</td>";
                            echo "<td>{$row['title']}</td>";
                            echo "<td>{$row['speaker']}</td>";
                            echo "<td>{$row['biography']}</td>";
                            echo "<td>{$row['affiliation']}</td>";
                            echo "<td>{$row['department']}</td>";
                            echo "<td>{$row['date']}</td>";
                            echo "<td>{$row['reminder_date']}</td>";
                            echo "<td>{$row['venue']}</td>";
                            echo "<td>{$row['sender']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['others']}</td>";
                            echo "<td>{$row['flag']}</td>";
                            echo "<td>{$row['modifiedtimestamp']}</td>";
                            echo "<td>{$row['status']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='18' class='text-center'>No entries found for this date.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2024@Eservices. All rights reserved.</p>
    </footer>
</body>
</html>
