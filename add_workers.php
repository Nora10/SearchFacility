<?php 
 
include_once('inc/check_log.php');

$status='';
//Check if admin
$sql = "SELECT id FROM admin WHERE member_id='$memberID'";
	$query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
	$resultCount = mysqli_num_rows($query);
	if($resultCount<1){header('location: logout.php'); exit();}



if(isset($_POST['lastname'])){
	$lastname = mysqli_real_escape_string($dbc, $_POST['lastname']);
	$firstname = mysqli_real_escape_string($dbc, $_POST['firstname']);
	$phone = mysqli_real_escape_string($dbc, $_POST['phone']);
	$email = mysqli_real_escape_string($dbc, $_POST['email']);
	$levels = mysqli_real_escape_string($dbc, $_POST['levels']);
	$address = mysqli_real_escape_string($dbc, $_POST['address']);
	$maritalstatus = mysqli_real_escape_string($dbc, $_POST['marital_status']);
	$gender = mysqli_real_escape_string($dbc, $_POST['gender']);
	$salary = mysqli_real_escape_string($dbc, $_POST['salary']);
	$dob = mysqli_real_escape_string($dbc, $_POST['dob']);
	$state = mysqli_real_escape_string($dbc, $_POST['state']);
	$lga = mysqli_real_escape_string($dbc, $_POST['lga']);
	$photo = $_FILES['photo'];
	
	if($lastname=='' || $firstname=='' || $phone=='' ||$email=='' ||$levels=='' ||$address=='' || $maritalstatus==''  || 
	$gender=='' ||$salary=='' || $dob=='' || $state=='' || $lga=='' || $photo['name']=='')
	{$status = '<div class="alert alert-danger">All details are compulsory</div>';}
	else{
		
$fileName = $_FILES["photo"]["name"]; // The file name
$fileTmpLoc = $_FILES["photo"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["photo"]["type"]; // The type of file it is
$fileSize = $_FILES["photo"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["photo"]["error"]; // 0 = false | 1 = true
$xPlode  = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = strtolower(end($xPlode));
$randomName = time().rand(1,10000000).'.'.$fileExt;
$uploadAction = move_uploaded_file($fileTmpLoc, "workers/$randomName");
if($uploadAction){
	$pass = md5($phone);
	$sql = "INSERT INTO workers (lastname,firstname,phone,email,levels,address,marital_status,gender,salary,dob,state,lga, photo,password) VALUES ('$lastname','$firstname','$phone','$email','$levels','$address','$maritalstatus','$gender','$salary',
	'$dob','$state','$lga', '$randomName','$pass')";
	$query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
	if($query){$status = '<div class="alert alert-success ">Correctly Saved</div>';}else {$status = '<div class="alert alert-warning ">There was an error!</div>';}
	}
		}
	}
	
	  
    $dList='';
	$yql = "SELECT id,title FROM departments";
	$yuery = mysqli_query($dbc,$yql) or die(mysqli_error($dbc));
	while($row = mysqli_fetch_array($yuery)){
  $dID = $row[0];
  $dTitle = $row[1];
  $dList .='<option value="'.$dID.'">'.$dTitle.'</option>';
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Address Input</title>
<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="package signup Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<link href="css/style-signup.css" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
			
<div class="topnav" style="float:right;font-size: 18px; font-weight:bold; overflow:hidden;  word-spacing:10px;">
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
				<h2>Add New Staff</h2>
				<?php echo $status;?>
			</div>
			<div class="name">
				<label for="newContactName">Lastname</label>
				<input class="input1 state" type="text" name="lastname" placeholder="lastname" required id="newContactName" maxlength="26">
			</div>
				<div class="name">
				<label for="newContactName">Firstname</label>
				<input class="input1 state" type="text" name="firstname" placeholder="firstname" required id="newContactName" maxlength="26">
			</div>
			<div class="name">
				<label for="newContactPhone">Phone-No</label>
				<input class="input1 state" type="number" name="phone" placeholder="Phone-No" required id="newContactPhone">
			</div>
			<div class="name">
				<label for="newContactEmail">Email</label>
				<input class="input1 state" type="email" name="email" placeholder="Email" required  id="newContactEmail" >
			</div>
			<div class="name">
				<label for="newContactFax">Levels</label>
			   <select class="input1 state" id="newContactlevel" name= "levels" required>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			</select>
			</div>
			<div class="name">
				<label for="newContactAddress">Address</label>
				<input type="text" name="address" id="newContactAddress" placeholder="Address" class="state input1" required="">
			</div>
				<div class="name">
				<label for="newContactName">Marital status</label>
				<select class="input1 state" name="marital_status">
				<option value="single"> Single</option>
				<option value="married"> Married</option>
				<option value="divorced">Divorced</option>
				<option value="widowed"> Widowed</option>
				</select>
               </div>
				<div class="name">
				<label for="newContactName">Gender</label>
				<select class="input1 state" name="gender">
				<option value="female">Female</option>
				<option value="male"> Male</option>
				</select></div>
				<div class="name">
				<label for="newContactName">Salary</label>
				<input class="input1 state" type="text" name="salary" placeholder="Salary" required="" id="newContactName" maxlength="26">
			</div>
				<div class="name">
				<label for="newContactName">Date Of Birth</label>
				<input class="input1 state" type="text" name="dob" placeholder="DOB" required="" id="newContactName" maxlength="26">
			</div>
				<div class="name">
				<label for="newContactName">State</label>
				<input class="input1 state" type="text" name="state" placeholder="State" required="" id="newContactName" maxlength="26">
			</div>
			<div class="name">
				<label for="newContactPhoto">Photo</label>
				<input type="file" name="photo" id="newContactPhoto" class="state input1" required="" name="photo">
			</div>
				<div class="name">
				<label for="newContactName">LGA</label>
				<input class="input1 state" type="text" name="lga" placeholder="LGA" required="" id="newContactName" maxlength="26">
			</div>
			<div class="name">
				<label for="newContactName">Department</label>
				<select class="input1 state" name="department">
				<option value="">Select Department</option>
				<?php echo $dList; ?>
				</select></div>
				
				
			<div class="signup">
			<input type="submit" id="Save" value = "Save">
			</div><br><br>
			<div class="signup">
			<input type="submit" id="Discard" value= "Discard">
			</div>
		</form>
	</div>
</div>

<footer>&copy; 2018 AddressBook | Design by Nora Anazia </footer>
</body>
</html>