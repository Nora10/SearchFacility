<?php 
include_once('inc/dbConnection.php');
$status='';
if(isset($_POST['email'])){
	$email = mysqli_real_escape_string($dbc, $_POST['email']);
	$password = mysqli_real_escape_string($dbc, $_POST['password']);
	
	if($email=='' || $password=='')
	{$status = '<div class="alert alert-danger">All details are compulsory</div>';}
	else{
		$hashPass = md5($password);
	$sql="SELECT id,email,password FROM workers WHERE email='$email' AND password='$hashPass' LIMIT 1"; 
	$query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
	if(mysqli_num_rows($query)<1){$status='<div class="alert alert-danger">Invalid Login Details</div>';}
	else{
		
		 while($row = mysqli_fetch_array($query)){
		$memberID = $row[0];
		$memberEmail = $row[1];
		$memberPassword = $row[2];
		
		session_start();
		$_SESSION['member_id']=$memberID;
		$_SESSION['member_email']=$memberEmail;
		$_SESSION['member_password']=$memberPassword;
		header('location: userupdates.php'); exit();
  }
	}
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
<link href="//fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
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
<h1>Nora's Community</h1>
	<div class="form-content">
		<form action="#" method="post" enctype="multipart/form-data">
			<div class="form-info">
				<h2>Login Page</h2>
				
			</div>
			<?php echo $status;?>
			<div class="name">
				<label for="newContactEmail">Email</label>
				<input class="input1 state" type="email" name="email" placeholder="Email" required  id="newContactEmail" >
			</div>
			<div class="name">
				<label for="newContactEmail">Password</label>
			   <input class="input1 state" type="password" name="password" placeholder="Password" required  id="newContactpassword" >
			   </div>
						
			<div class="signup">
			<input type="submit" id="Save" value = "Login">
			</div><br><br>
			
		</form>
	</div>
</div>

<footer>&copy; 2018 AddressBook | Design by Nora Anazia </footer>
</body>
</html>