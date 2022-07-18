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
<link rel="stylesheet" href="../css/stars.css">
<link rel="stylesheet" href="../css/card.css"/>
<link rel="stylesheet" href="../css/pagination.css"/>
</head>
<body>
<!-----------HEADER START-------------->
<?php require sprintf('../php/userheader.php',__DIR__);?>
<!-----------HEADER END-------------->
<!-----------BODY START-------------->
<div class="row">
	<!-----------SIDEBAR START-------------->
	<?php include '../php/playersidenav.php';?>
	<!-----------SIDEBAR END-------------->
	<!-----------CONTENTS START-------------->
	<div class="column contents">
		<div class="row">
			<?php
			if(isset($_GET["id"]))  
			{
				$id = $_GET["id"];
			}
			else
			{
				$id = $_SESSION['id'];
			}
			$_SESSION['id'] = $id;
			
			$sql = "SELECT * FROM coach where username = '".$id."'";

			$result = $conn->query($sql);
								  
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{		
					echo"<div class='column procol1'>
					
						<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' alt='Avatar'>
						<div class='form-popup' id='myForm'>
							<form action='../php/reportcoach.php' class='popup-container' method='POST'>
								<h2 style='text-align:center;'>Make Complain</h2>
								
								<select id='compType' name='compType' required>					
								   <option value='Fake Account' selected>Fake Account</option>
								   <option value='Illegal Session'>Illegal Session</option>
								   <option value='Fake News'>Fake News</option>
								   <option value='Other'>Other</option>					   
								</select>								

								<input type='text' name='complaint' placeholder='Complaint' style='padding: 10px;' required>

								<button id='hoverbtn' type='submit' value='Submit'>Submit</button>
								<button type='reset' onclick='closeForm()' style='background-color:#a32626;'>Cancel</button>
							</form>
						</div>";
						
						$sqll = "SELECT SUM(stars) DIV COUNT(stars) AS Average FROM coach_request WHERE receiver_username = '".$id."'";

						$resultt = $conn->query($sqll);
											  
						if($resultt->num_rows > 0)
						{
							while($roww = $resultt->fetch_assoc())
							{	
								$average = $roww["Average"];
								echo"<div class='rate'>";
									if($average == 5)
									{
										echo"<input type='radio' id='retstar5' name='retrate' value='5' checked/>
										<label for='retstar5' title='text'>5 stars</label>
										<input type='radio' id='retstar4' name='retrate' value='4' disabled/>
										<label for='retstar4' title='text'>4 stars</label>										
										<input type='radio' id='retstar3' name='retrate' value='3' disabled/>
										<label for='retstar3' title='text'>3 stars</label>
										<input type='radio' id='retstar2' name='retrate' value='2' disabled/>
										<label for='retstar2' title='text'>2 stars</label>
										<input type='radio' id='retstar1' name='retrate' value='1' disabled/>
										<label for='retstar1' title='text'>1 star</label>";
									}
									else if($average == 4)
									{
										echo"<input type='radio' id='retstar5' name='retrate' value='5' disabled/>
										<label for='retstar5' title='text'>5 stars</label>
										<input type='radio' id='retstar4' name='retrate' value='4' checked/>
										<label for='retstar4' title='text'>4 stars</label>										
										<input type='radio' id='retstar3' name='retrate' value='3' disabled/>
										<label for='retstar3' title='text'>3 stars</label>
										<input type='radio' id='retstar2' name='retrate' value='2' disabled/>
										<label for='retstar2' title='text'>2 stars</label>
										<input type='radio' id='retstar1' name='retrate' value='1' disabled/>
										<label for='retstar1' title='text'>1 star</label>";									
									}
									else if($average == 3)
									{
										echo"<input type='radio' id='retstar5' name='retrate' value='5' disabled/>
										<label for='retstar5' title='text'>5 stars</label>
										<input type='radio' id='retstar4' name='retrate' value='4' disabled/>
										<label for='retstar4' title='text'>4 stars</label>										
										<input type='radio' id='retstar3' name='retrate' value='3' checked/>
										<label for='retstar3' title='text'>3 stars</label>
										<input type='radio' id='retstar2' name='retrate' value='2' disabled/>
										<label for='retstar2' title='text'>2 stars</label>
										<input type='radio' id='retstar1' name='retrate' value='1' disabled/>
										<label for='retstar1' title='text'>1 star</label>";									
									}									
									else if($average == 2)
									{
										echo"<input type='radio' id='retstar5' name='retrate' value='5' disabled/>
										<label for='retstar5' title='text'>5 stars</label>
										<input type='radio' id='retstar4' name='retrate' value='4' disabled/>
										<label for='retstar4' title='text'>4 stars</label>										
										<input type='radio' id='retstar3' name='retrate' value='3' disabled/>
										<label for='retstar3' title='text'>3 stars</label>
										<input type='radio' id='retstar2' name='retrate' value='2' checked/>
										<label for='retstar2' title='text'>2 stars</label>
										<input type='radio' id='retstar1' name='retrate' value='1' disabled/>
										<label for='retstar1' title='text'>1 star</label>";									
									}
									else if($average == 1)
									{
										echo"<input type='radio' id='retstar5' name='retrate' value='5' disabled/>
										<label for='retstar5' title='text'>5 stars</label>
										<input type='radio' id='retstar4' name='retrate' value='4' disabled/>
										<label for='retstar4' title='text'>4 stars</label>										
										<input type='radio' id='retstar3' name='retrate' value='3' disabled/>
										<label for='retstar3' title='text'>3 stars</label>
										<input type='radio' id='retstar2' name='retrate' value='2' disabled/>
										<label for='retstar2' title='text'>2 stars</label>
										<input type='radio' id='retstar1' name='retrate' value='1' checked/>
										<label for='retstar1' title='text'>1 star</label>";									
									}
									else
									{
										echo"<input type='radio' id='retstar5' name='retrate' value='5' disabled/>
										<label for='retstar5' title='text'>5 stars</label>
										<input type='radio' id='retstar4' name='retrate' value='4' disabled/>
										<label for='retstar4' title='text'>4 stars</label>										
										<input type='radio' id='retstar3' name='retrate' value='3' disabled/>
										<label for='retstar3' title='text'>3 stars</label>
										<input type='radio' id='retstar2' name='retrate' value='2' disabled/>
										<label for='retstar2' title='text'>2 stars</label>
										<input type='radio' id='retstar1' name='retrate' value='1' disabled//>
										<label for='retstar1' title='text'>1 star</label>";									
									}									
								echo"</div>";
							}
						}							
							echo"</div>
								<div class='column procol5'>
									<div class='row'>
										<div class='row'>
											<h1>".$row["f_name"]." ".$row["l_name"]."</h1>
											<br >
										</div>
										<div class='row'>
											<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>
												<tr>
													<td>
														<p>Gender</p>
													</td>
													<td>
														<p>:</p>
													</td>
													<td colspan='4'>
														<p>".$row["gender"]."</p>
													</td>
													<td>
														<p>Address</p>
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
														<p>Country</p>
													</td>
													<td>
														<p>:</p>
													</td>
													<td colspan='4'>
														<p>".$row["country"]."</p>
													</td>
													<td>
														<p>Birthday</p>
													</td>
													<td>
														<p>:</p>
													</td>
													<td colspan='4'>
														<p>".$row["dob"]."</p>
													</td>
												</tr>
												<tr>
													<td>
														<p>Mobile</p>
													</td>
													<td>
														<p>:</p>
													</td>
													<td colspan='4'>
														<p>".$row["contact_no"]."</p>
													</td>
													<td>
														<p>Email</p>
													</td>
													<td>
														<p>:</p>
													</td>
													<td colspan='4'>
														<p>".$row["email"]."</p>
													</td>
												</tr>
												<tr>
													<td>
														<p>Sports</p>
													</td>
													<td>
														<p>:</p>
													</td>
													<td colspan='4'>";
														$sqll = "SELECT * FROM coach_sport WHERE username = '".$id."'";
														$resultt = $conn->query($sqll);
														
														if($resultt->num_rows > 0)
														{
															$data = array();
															while($roww = $resultt->fetch_assoc())
															{
																$data[] = $roww["sport"];
															}
															for($x = 0 ; $x < count($data) ; $x++)
															{
																print_r($data[$x]);echo"&emsp;&emsp;";
															}
														}
													echo"</td>
													<td colspan='6'></td>
												</tr>
											</table>
										</div>								
									</div>						
								</div>					
							</div>
				<br/><br/>
				<div class='row'>
					<div class='column procol5'>
						<div class='row' style='padding:35px 0px 35px 50px;overflow: hidden;background-color: rgba(0, 20, 61, 0.5);box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.5);'>
							<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>
								<tr>
									<td>
										<p>Qualification</p>
									</td>
									<td>
										<p>:</p>
									</td>
									<td colspan='4'>
										<p>".$row["qualification"]."</p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Specilization</p>
									</td>
									<td>
										<p>:</p>
									</td>
									<td colspan='4'>
										<p>".$row["specilization"]."</p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Fees</p>
									</td>
									<td>
										<p>:</p>
									</td>
									<td colspan='4'>
										<p>".$row["fees"]." LKR per hour</p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Training Locations</p>
									</td>
									<td>
										<p>:</p>
									</td>
									<td colspan='4'>
										<p>".$row["province"]." Province&emsp;&emsp;&emsp;&emsp;".$row["city"]." District&emsp;&emsp;&emsp;&emsp;".$row["venue"]."</p>
									</td>
								</tr>
								<tr>
									<td>
										<p>Notes</p>	
									</td>
									<td>
										<p>:</p>
									</td>
									<td colspan='4'>
										<p>".$row["note"]."</p>	
									</td>
								</tr>
							</table>
						</div>
					</div>";
				}
			}
					?>				
			<div class="column procol1" style="padding: 10px 10px 0px 10px;">
				<div class="popup-container">
					<h2 style="margin: 5px;">Rate Coach</h2>
					<form action="../php/ratecoach.php" name="reviewForm" method="POST">
						
						<div class="rate">
							<input type="radio" id="star5" name="Rate" value="5" />
							<label for="star5" title="text">5 stars</label>
							<input type="radio" id="star4" name="Rate" value="4" />
							<label for="star4" title="text">4 stars</label>
							<input type="radio" id="star3" name="Rate" value="3" />
							<label for="star3" title="text">3 stars</label>
							<input type="radio" id="star2" name="Rate" value="2" />
							<label for="star2" title="text">2 stars</label>
							<input type="radio" id="star1" name="Rate" value="1" />
							<label for="star1" title="text">1 star</label>
						</div>
						
						<input type="text" name="Review" placeholder="Review" style="padding: 10px;" required>
						<table class='protable' cellspacing='2' cellpadding='2' border='0' width='100%'>
						<td>
							<button id='hoverbtn' type="submit" style="padding: 10px;" value="Submit">Rate</button>
						</td>
						<td>
							<button type="reset" value="Reset" style="background-color:#a32626; padding: 10px;">Reset</button>	
						</td>
						</table>
						
					</form>
				</div>		
			</div>		
		</div>
		<br>
		<div class="row" style="padding:10px 10px 0px 10px;" align="center">
			<div class="column common">
				<a><button id='hoverbtn' onclick="openForm()">Report</button></a>
			</div>		
			<div class="column common">
				<?php echo"<a href='../php/removecoach.php?id=".$id."'><button style='background-color:#a32626;'>Remove</button></a>";?>
			</div>
		</div>
		<br />
		<div class="maintabcontent">
			<div class="row search-form">
				<div class="column procol4">
					<h2>Ratings</h2>
				</div>
				<div class="column procol5" style="padding-top:25px;">
				</div>
			</div>
			<div class="row" style="padding-bottom:20px;">
				<div style="width:95%; margin:0 auto;">
					<center>  
						<?php
							$limit = 3;    
							if (isset($_GET["page"]))
							{    
								$page_number  = $_GET["page"];    
							}
							else 
							{
								 $page_number=1;
							}

							$initial_page = ($page_number-1) * $limit;       
							$getQuery = "SELECT * FROM coach_request WHERE receiver_username = '".$id."' AND stars IS NOT NULL AND review IS NOT NUll LIMIT $initial_page, $limit";     
							$result = mysqli_query ($conn, $getQuery);
							
							echo"<br>   
							<div>";							
							
							if($result->num_rows > 0)
							{
								echo"<table style='border-spacing: 0 15px;'>    
									<tbody>";  
									
									while ($row = mysqli_fetch_array($result)) 
									{
										$stars = $row["stars"];
										$count = $count + 1;
										$player = $row["requester_username"];						
																	
										$sqllll = "SELECT * FROM player WHERE username = '".$player."'";
										$resultttt = $conn->query($sqllll);
																													  
										if($resultttt->num_rows > 0)
										{
											while($rowww = $resultttt->fetch_assoc())
											{
												echo "<tr class='horitem' style='float:none;padding:10px;'>
												<td style='border-radius: 5px 0px 0px 5px;width:25%;padding:20px;'><h3>".$rowww["f_name"]." ".$rowww["l_name"]."</h3></td>
												<td style='width:25%;padding:20px;'><div class='rate'>";
												if($stars == 5)
												{
													echo"<input type='radio' id='retstar5' name='$count' value='5' checked/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4'disabled/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' disabled/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' disabled/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' disabled/>
														<label for='retstar1' title='text'>1 star</label>";
												}
												else if($stars == 4)
												{
													echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' checked/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' disabled/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' disabled/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' disabled/>
														<label for='retstar1' title='text'>1 star</label>";									
												}
												else if($stars == 3)
												{
													echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' disabled/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' checked/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' disabled/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' disabled/>
														<label for='retstar1' title='text'>1 star</label>";									
												}									
												else if($stars == 2)
												{
													echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' disabled/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' disabled/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' checked/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' disabled/>
														<label for='retstar1' title='text'>1 star</label>";									
												}
												else if($stars == 1)
												{
													echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' disabled/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' disabled/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' disabled/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' checked/>
														<label for='retstar1' title='text'>1 star</label>";									
												}
												else
												{
													echo"<input type='radio' id='retstar5' name='$count' value='5' disabled/>
														<label for='retstar5' title='text'>5 stars</label>
														<input type='radio' id='retstar4' name='$count' value='4' disabled/>
														<label for='retstar4' title='text'>4 stars</label>										
														<input type='radio' id='retstar3' name='$count' value='3' disabled/>
														<label for='retstar3' title='text'>3 stars</label>
														<input type='radio' id='retstar2' name='$count' value='2' disabled/>
														<label for='retstar2' title='text'>2 stars</label>
														<input type='radio' id='retstar1' name='$count' value='1' disabled//>
														<label for='retstar1' title='text'>1 star</label>";									
												}
												echo"</div></td><td style='border-radius: 0px 5px 5px 0px;width:50%;padding:30px;text-align:justify;text-justify:inter-word;'><p>".$row['review']."</p></td>
												</tr>";										
											}
										}
									}
									echo"</tbody>
								</table>";								
							}
							else
							{
								echo "<div class='procol7'><h3>No ratings given yet.</h3></div>";
							}

							echo"<div class='items'>";
								$getQuery = "SELECT COUNT(*) FROM coach_request WHERE receiver_username = '".$id."' AND stars IS NOT NULL AND review IS NOT NUll";     
								$result = mysqli_query($conn, $getQuery);     
								$row = mysqli_fetch_row($result);     
								$total_rows = $row[0];              

								echo "</br>";

								$total_pages = ceil($total_rows / $limit);     
								$pageURL = "";             

								if($page_number>=2)
								{
									echo "<a style='border-radius:5px 0px 0px 5px;' href='coachprofile.php?page=".($page_number-1)."'>  Prev </a>";   
								}                          

								for ($i=1; $i<=$total_pages; $i++) 
								{   
									if ($i == $page_number) 
									{   
										$pageURL .= "<a class = 'active' href='coachprofile.php?page=".$i."'>".$i." </a>";   
									}               
									else
									{   
										$pageURL .= "<a href='coachprofile.php?page=".$i."'>".$i." </a>";     
									}
								}    

								echo $pageURL;    

								if($page_number<$total_pages)
								{   
									echo "<a style='border-radius:0px 5px 5px 0px;' href='coachprofile.php?page=".($page_number+1)."'>  Next </a>";   
								}
								echo"</div>
							</div>";
						?> 
					</center>
				</div>			
			</div>
		</div>
	</div>
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