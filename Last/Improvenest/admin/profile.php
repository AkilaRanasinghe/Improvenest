<?php
include '../php/conn.php';
session_start();
$uname = $_SESSION['uname'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/headfoot.css">
<link rel="stylesheet" href="../css/formstyle.css">
<script>
function delete_profile()
{
	if(confirm("Are you sure you want to delete your profile?"))
	{
		window.location.href="admindelete.php";
	}
}
</script>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/adminsidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<?php
		$sql = "SELECT * FROM admin WHERE username = '".$uname."'";
		$result = $conn->query($sql);
							  
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo"<div class='column contents'>
						<div class='row'>
							<div class='column procol1'>
								<div class='row'>
									<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' alt='Avatar'>
								</div>

								<div class='row'>
									<button id='change' onclick='openForm()'><img id='change' src='../images/change.png'></button>
								</div>
							</div>

							<div class='form-popup' id='myForm'>
								<form action='../php/updatedpadmin.php' class='popup-container' method='POST' enctype='multipart/form-data'>
									<h2 style='text-align:center;'>Change Profile Picture</h2>

									<input type='file' name='Pimage' required>

									<button type='submit' value='Submit'>Update</button>
									<button type='reset' onclick='closeForm()' style='background-color:#a32626;'>Cancel</button>
								</form>
							</div>

							<br /><br/>

							<div class='column procol5'>
								<div class='row'>
									<div class='row'>
									<h1>".$row["username"]."</h1>
										<br />
									</div>
									
									<div class='row'>
										<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>
											<tr>
												<td>
													<b><p>Contact Number</p></b>
												</td>
												<td>
													<p>:</p>
												</td>
												<td colspan='4'>
													<p>".$row["contact_no"]."</p>
												</td>

												</tr>
												<tr>
												<td>
													<b><p>Address</p></b>
												</td>
												<td>
													<p>:</p>
												</td>
												<td colspan='4'>
													<p>".$row["address"]."</p>
												</td>
											</tr>

											<tr>
												<td>
													<b><p>Email Address</p></b>
												</td>
												<td>
													<p>:</p>
												</td>
												<td colspan='4'>
													<p>".$row["email"]."</p>
												</td>
											</tr>
										</table>
									</div>								
								</div>						
							</div>
						</div>

						<br/><br/>

						<div class='row' style='padding:20px 10px 0px 100px;' align='center'>
							<div class='column common'>
								<a href='editprofile.php'><button>Edit Profile</button></a>
							</div>
							
							
								
								<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
								<br /><br /><br /><br /><br />
								
							
							
						</div>
					</div>";
			}
		}
	?>
	<!-----------CONTENTS END-------------->
</div>
<script>
function openForm() {
	document.getElementById("myForm").style.display = "block";
}

function closeForm() {
	document.getElementById("myForm").style.display = "none";
}
</script>
<script src="../js/active.js"></script>
<!-----------BODY END-------------->
<!-----------FOOTER START-------------->
<?php include '../php/userfooter.php';?>
<!-----------FOOTER END-------------->
</body>
</html>
