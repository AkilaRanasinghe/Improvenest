<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];

$image = addslashes(file_get_contents($_FILES['Pimage']['tmp_name']));

$sql = "UPDATE federation SET picture='$image' where username = '".$uname."'";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Profile Picture Updated.'); window.location.href='http://localhost/Improvenest/federation/federationprofile.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Update Failed. Please try again later.'); window.location.href='http://localhost/Improvenest/federation/federationprofile.php';</script>";
}	
		
mysqli_close($conn)
?>