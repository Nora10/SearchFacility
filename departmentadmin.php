<?php 
include_once('inc/check_log.php');
//Check if admin
$sql = "SELECT id FROM admin WHERE member_id='$memberID'";
	$query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
	$resultCount = mysqli_num_rows($query);
	if($resultCount<1){header('location: logout.php'); exit();}

$status='';
if(isset($_POST['title'])){
	$title = mysqli_real_escape_string($dbc, $_POST['title']);
	
	if($title==''){$status = '<div class="alert alert-danger">Title cannot be empty</div>';}
	else{
$sql = "INSERT INTO departments (title) VALUES ('$title')";
	$query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
	if($query){$status = '<div class="alert alert-success ">New Department has been added to the database</div>';}else {$status = '<div class="alert alert-warning ">There was an error!</div>';}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Address Input</title>
<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<link href="css/style-signup.css" rel="stylesheet" type="text/css" media="all">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<!-- Navigation -->
			
<div class="topnav" style="float:right;font-size: 18px; font-weight:bold; overflow:hidden;  word-spacing:30px;">
      <a class="active" style="color:white;" href="index.php">Home</a>
      <a href="add_workers.php" style="color:white;" >Add-Workers</a>
      <a href="login.php" style="color:white;" >Login</a>
      <a href="userupdates.php" style="color:white;" >User-Update</a>
	  <a href="departmentadmin.php" style="color:white;" >Add-Departments</a>
 	</div><br><br>
  			
<div class="form">
<h1 style="text-align:center;">Nora's Community</h1>
	<div class="form-content">
		<form action="#" method="post">
		<?php echo $status; ?>
			<div class="form-info">
				<h2>Updating Department</h2>
			</div>
			<div class="name">
				<label for="department">Department</label>
				<input class="input1 state" type="text" name="title" placeholder="Department" required="" id="newContactName" maxlength="26">
			</div>
			
			<div class="signup">
			<input type="submit" id="Save" value = "Save">
			</div><br><br>
			<div class="signup">
			<a href="logout.php"><input type="button" class="loggingout" value="Logout"></a>
			</div>
			</div>
		</form>
	</div>
</div>

<footer>&copy; 2018 AddressBook | Design by Nora Anazia </footer>
</body>
</html>