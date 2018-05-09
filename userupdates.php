<?php 
include_once('inc/check_log.php');

if(isset($_POST['job_title'])){
	$job_title = mysqli_real_escape_string($dbc, $_POST['job_title']);
	$office_room_number = mysqli_real_escape_string($dbc, $_POST['office_room_number']);
	$degrees = mysqli_real_escape_string($dbc, $_POST['degrees']);
	$degrees2 = mysqli_real_escape_string($dbc, $_POST['degrees2']);
	$degrees3 = mysqli_real_escape_string($dbc, $_POST['degrees3']);
	$degrees4 = mysqli_real_escape_string($dbc, $_POST['degrees4']);
	$biography = mysqli_real_escape_string($dbc, $_POST['biography']);
	
	if($job_title=='' || $office_room_number=='' || $degrees=='' ||$biography=='')
	{$status = '<div class="alert alert-danger">All details are compulsory</div>';}
	else{
		
	// $sql = "INSERT INTO userupdates (job_title,office_room_number,degrees,degrees2,degrees3,degrees4,biography) VALUES ('$job_title','$office_room_number','$degrees','$degrees2','$degrees3','$degrees4','$biography')";
	$sql = "UPDATE workers SET job_title='$job_title',office_room_number='$office_room_number',degrees='$degrees',degrees2='$degrees2',degrees3='$degrees3',degrees4='$degrees4',biography='$biography', WHERE id='$memberID' LIMIT 1";
	
	$query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
	if($query){
		$status = '<div class="alert alert-success ">Files updated accordingly</div>';}else {
			 $status = '<div class="alert alert-warning ">There was an error!</div>';
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Input form</title>
<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<link href="css/style-signup.css" rel="stylesheet" type="text/css" media="all">
<!-- <link href="//fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet"> -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
</head>
<body>
<!-- Navigation -->
			
<div class="topnav" style="float:right;font-size: 18px; font-weight:bold; overflow:hidden;  word-spacing:30px;">
      <a class="active" style="color:white;" href="index.php">Home</a>
      <a href="add_workers.php" style="color:white;" >Add-Workers</a>
      <a href="login.php" style="color:white;" >Login</a>
      <a href="userupdates.php" style="color:white;" >User-Update</a>
	  <a href="departmentadmin.php" style="color:white;" >Add-Departments</a>
 	</div>
  			
<div class="form">
<h1>Nora's Staff Record</h1>
	<div class="form-content">
		<form action="#" method="post">
			<div class="form-info">
			<h2>Welcome <?php echo $memberFirstname?> </h2>
				<h2>User Update</h2>
			</div>
			<br>
			<div class="name">
				<label for="job_title">Job Title</label>
				<input class="input1 state" type="text" name="job_title" placeholder="Job Title" required="" id="job_title" maxlength="26">
			</div>
			<div class="name">
				<label for="office_room_number">Office Room Number</label>
				<input class="input1 state" type="text" name="office_room_number" placeholder="Room Number" required="" id="office_room_number">
			</div>
			<div class="name">
				<label for="degrees">Degrees</label><br>
				<input class="input1 state" type="text" name="degrees" placeholder="Degree 1" required=""  id="degrees" ><br><br>
				<input class="input1 state" type="text" name="degrees2" placeholder="Degree 2" id="degrees2" ><br><br>
				<input class="input1 state" type="text" name="degrees3" placeholder="Degree 3" id="degrees3" ><br><br>
				<input class="input1 state" type="text" name="degrees4" placeholder="Degree 4"  id="degrees4" ><br><br>
			</div>
			<div class="name">
				<label for="biography">Biography</label><br>
				<textarea class="input1 state" placeholder="Biography" id="biography" name="biography" rows="9" cols="52" required=""></textarea>
			</div>
				
			<div class="signup">
			<input type="submit" id="Save" value = "Save">
			</div><br><br>
			<div class="signup">
			<a href="logout.php"><input type="button" class="loggingout" value = "Logout"></a>
			</div>
		</form>
	</div>
</div>

<footer>&copy; 2018 AddressBook | Design by Nora Anazia </footer>
</body>
</html>