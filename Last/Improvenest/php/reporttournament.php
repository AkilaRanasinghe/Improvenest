<?php
include 'conn.php';
session_start();
$uname = $_SESSION['uname'];
$tournament = $_SESSION['tid'];

$type = "";
$complaint = "";
$status = "Pending";
$acctype = "tournament";

if(isset($_POST["compType"]))  
{
	$type = $_POST["compType"];
}
if(isset($_POST["complaint"]))  
{
	$complaint = $_POST["complaint"];
}

$sql = "INSERT INTO report (reporter_username,reported_username,complain_type,complain,status,type) VALUES ('$uname','$tournament','$type','$complaint','$status','$acctype')";

if(mysqli_query($conn,$sql))
{
	echo "<script type='text/javascript'>alert('Complaint recorded. We will take necessary actions. Thankyou!'); window.location.href='http://localhost/Improvenest/player/viewtournament.php';</script>";
} 
else
{
	echo "<script type='text/javascript'>alert('Failed to record complaint. Please try again later.'); window.location.href='http://localhost/Improvenest/player/viewtournament.php';</script>";
}	
		
mysqli_close($conn)
?>