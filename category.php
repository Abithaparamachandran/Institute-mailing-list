<?php
//if (isset($array['atypemain'])) {
	    
$name=$_GET['atypemain'];
if($name=="Announcement" || $name=="Awards" || $name=="Closure" || $name=="General" || $name=="Hospital Particulars"){ ?>
<label>Please Select the Specific Subject<b>*</b></label>
<select name="atype" id="atype" class="form-control">
<?php
$servername="***";
$username="***";
$password="***";
$dbname="***";

$con=mysqli_connect($servername,$username,$password,$dbname);
if($con){
	echo"connected";
}else{
	echo"not connected";
}
$list1 = "SELECT * FROM announcesubtype where category='$name' order by type ASC";
$result=mysqli_query($con,$list1);
        while ($row = mysqli_fetch_assoc($result)) {
        $user[] = $row['type'];
        }
        foreach($user as $user)
        {
        echo '<option value="'.$user.'">'.$user.'</option>';
	}
//}
?>
</select>
<?php
}
else { }
?>

