<!DOCTYPE html>
<html>
<head>
    <title>seminar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
 
    <style>
        body {
	    font-family:Times New Roman;
background-color:#048f94;
        }

        .img-fluid {
            width: 100%;
            height: 100%;
            margin-left: 1px;
            margin-top: 1px;
            margin-bottom: 11px;
            margin-right: 12px;
        }

        .form-style input {
            border: 0;
            padding-left: 1px;
            padding-right: 1px;
            padding-top: 1px;
            padding-bottom: 1px;
            margin-left: 11px;
            margin-right: 112px;
            margin-top: 1px;
            margin-bottom: 33px;
            height: 50px;
            border-radius: 0;
            border-bottom: 1px solid #ebebeb;
        }

        .form-style input:focus {
            border-bottom: 1px solid #007bff;
            box-shadow: none;
            outline: 0;
            background-color: #ebebeb;
        }

        .sideline {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #ccc;
        }

        .sideline:before,
        .sideline:after {
            content: '';
            border-top: 1px solid #ebebeb;
            margin: 0 20px 0 0;
            flex: 1 0 20px;
        }

        .sideline:after {
            margin: 0 0 0 20px;
        }

        h1 {
            text-color: white;
        }

        p {
            color: black!important;
	}

h3{
font-style:Times New Roman!important;
}

    </style>
</head>

<body>
<center>
<header id="header"class="fixed-top">
<div class="container d-flex align-items-center">
<h1 class="logo me-auto"><img src="newlogo.png"alt="logo"></h1>
<nav id="navbar"class="navbar">
<h1>Post To Campus Community For Employee</h1>
</nav>
</div>
</header>
<br><br><br><br><br><br>
<br><br><br><br>
<div class="container">
<div class="col-md-6 bg-white p-5">
<center>
<h4 class="pb-3">Login with LDAP Credentials</h4>
</center>
<br><br>
<div class="form-style">
<form action="" method="POST">
<div class="form-group pb-3">
<input type="text" placeholder="Enter LDAP Username" name="username" class="form-control"id="username" aria-describedby="usernameHelp">
</div
<div class="form-group pb-3">
<input type="password" placeholder="Password" name="password" class="form-control"id="password">
</div>
<div class="pb-2">
<center>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</center>
</div></div></div></div>
</form>
<br>
<p><b>Subscribed members can post seminar/announce/events to the list</p>
<p>Permanent faculty, permanent staff, project staff & students of IITM will receive announcements after moderator approval.</p>
<p>For Subscription/queries mail to sanand@iitm.ac.in</b></p>
<br><br><br>
<div class="footer">
<center>
<h5>Copyright © 2023 All rights reserved | Developed and Maintained by Eservices,Computer Centre,IITM
</h5>
</center>
</div>
</div>
</body>
</html>

<?php
ob_start();
session_start();
if (isset($_POST['submit'])) {
$ldapserver = '10.24.0.127';
$ldapuser = 'cn=Admin,dc=ldap,dc=iitm,dc=ac,dc=in';
$ldappass = '00o00opio0+$0';
$ldaptree = 'DC=ldap,DC=iitm,DC=ac,DC=in';
$ldapuname = trim($_POST['username']);
$ldappwd = trim($_POST['password']);
$ldapconn = ldap_connect($ldapserver) or die('Could not connect to LDAP server.');
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
if ($ldapconn) {
$ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die('Error trying to bind: ' . ldap_error($ldapconn));
if ($ldapbind) {
$dn[] = 'OU=student,dc=ldap,dc=iitm,dc=ac,dc=in';
$dn[] = 'OU=employee,dc=ldap,dc=iitm,dc=ac,dc=in';
for ($x = 0; $x < count($dn); $x++) {
$conn[] = $ldapconn;
}
$srr = ldap_search($conn, $dn, 'cn=' . $ldapuname) or die('Error in search query: ' . ldap_error($conn));
$search = false;
foreach ($srr as $value) {										
if (ldap_count_entries($ldapconn, $value) > 0) {
$search = $value;
break;
}
}
if ($search) 
{			
$infoo = ldap_get_entries($ldapconn, $search);
for ($i = 0; $i < $infoo['count']; $i++) {
$userdn = $infoo[$i]['dn'];
@$j = $infoo[$i]["givenname"][0];
echo $j;
@$a = $infoo[$i]["mail"][0];
echo $a;
}
if ($bind = @ldap_bind($ldapconn, $userdn, $ldappwd)) {
$_SESSION['user'] = $ldapuname;
header("Location: index.html?");
} else {
echo '<script>alert("Authentication Failed")</script>';
}
} else {
echo '<script>alert("This user does not exist")</script>';
}
} else {
echo '<script>alert("LDAP bind not successful...<br/><br>")</script>';
}
}
}
?>
<?php
session_start();
$_SESSION['usernamee']=$_POST['username'];
$_SESSION['dis']=$a;
$_SESSION['email']=$b;
?>

