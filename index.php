<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<title> Login</title>
<link rel="stylesheet" href="styl.css">
<!--link rel="stylesheet" href="all.min.css"-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
h2{
  font-family:'math';
color:#0b2e33;
	   }
.tab {
overflow: hidden;
background-color:white;
padding:10px;
margin-top:-5px;
}
</style>
	<body>

	  <div class="container">
	  <input type="checkbox" id="flip">
	  <div class="cover">
	  <div class="front">
	  <img src="images/frontImg.jpg" alt="">
	  <div class="text">
	          <h3>Post To Campus Community For Employee</h3>

		  <span class="text-2">Subscribed members can post seminar/announce <br>/events to the list</span>
		  <span class="text-2">Permanent faculty,permanent staff,project staff & students of IITM will receive anouncements after moderator approval</span>
		  <span class="text-2">For Subscription/queries mail to sanand@iitm.ac.in</span>
		  </div>
		  </div>
		  <div class="back">
		  <img class="backImg" src="images/backImg.jpg" alt="">
		  <div class="text">
		  <span class="text-2">For Subscription/ <br>queries mail to</span>
		  <span class="text-2">sanand@iitm.ac.in</span>
		  </div>
		   </div>
</div>
<div class="tab">
 <img src="newlogo.png" alt="logo" align="center"></img>
</center>
<br><br>
</div>
 <div class="forms">
<div class="form-content">
<div class="login-form">
<div class="title">Login</div>
<form action=""method="POST">
<div class="input-boxes">
<div class="input-box">
<i class="fas fa-envelope"></i>
<input type="text" placeholder="Enter your LDAP username"name="username"class="form-control"id="username" required>
</div>
<div class="input-box">
<i class="fas fa-lock"></i>
<input type="password" placeholder="Enter your LDAP password"name="password"id="password" required>
</div>
<div class="button input-box">																							
<input type="submit" name="submit"value="Submit">
</div>
</div>
</form>
</div>
 </div>	</div>
</body>
 </html>

<?php
ob_start();
session_start();
if (isset($_POST['submit'])) {
$ldapserver = '***';
$ldapuser = '***';
$ldappass = '***';
$ldaptree = '***';
$ldapuname = trim($_POST['username']);
$ldappwd = trim($_POST['password']);
$ldapconn = ldap_connect($ldapserver) or die('Could not connect to LDAP server.');
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
if ($ldapconn) {
$ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die('Error trying to bind: ' . ldap_error($ldapconn));
if ($ldapbind) {
$dn[] = 'OU=People,dc=ldap,dc=iitm,dc=ac,dc=in';
$dn[] = 'OU=facilities,OU=employee,dc=ldap,dc=iitm,dc=ac,dc=in';
$dn[] = 'OU=faculty,OU=employee,dc=ldap,dc=iitm,dc=ac,dc=in';
$dn[] = 'OU=official,OU=employee,dc=ldap,dc=iitm,dc=ac,dc=in';
$dn[] = 'OU=official1,OU=employee,dc=ldap,dc=iitm,dc=ac,dc=in';
$dn[] = 'OU=staff,OU=employee,dc=ldap,dc=iitm,dc=ac,dc=in';
$dn[] = 'cn=ccprj05,OU=cc,OU=project,OU=employee,dc=ldap,dc=iitm,dc=ac,dc=in';
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
header("Location: menu.php?");
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

