<?php 
session_start();
include_once('inc/dbConnection.php');
$status='';

if(isset($_POST['sach'])){
	$searchList='';
	$sach = mysqli_real_escape_string($dbc, $_POST['sach']);
	if($sach==''){echo '<tr><td colspan="7" style="text-align:center">Oops! you cannot search an empty content</td></tr>';exit();}
	$sql="SELECT id,firstname,lastname,department_id,phone,email,levels,job_title,salary FROM workers WHERE firstname LIKE '%$sach%' OR lastname LIKE '%$sach%'  OR email LIKE '%$sach%'"; 
 $query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
  while($row = mysqli_fetch_array($query)){
  $workerID = $row[0];
  $workerFirstname = $row[1];
  $workerLastname = $row[2];
  $workerDept = $row[3];
  $workerPhone = $row[4];
  $workerEmail = $row[5];
  $workerLevel = $row[6];
  $workerJobtitle = $row[7];
  $workerSalary = $row[8];
  
  $SalaryValue='';
  		$zql="SELECT title FROM departments WHERE id='$workerDept' LIMIT 1"; 
 $zuery = mysqli_query($dbc,$zql) or die(mysqli_error($dbc));
  while($row = mysqli_fetch_array($zuery)){
  $deptTitle = $row[0];
  }
  
  if(isset($_SESSION['member_email']) && isset($_SESSION['member_password']) &&isset($_SESSION['member_id'])){
	  $memberID = $_SESSION['member_id'];
	  //Check if admin
	$yql = "SELECT id FROM admin WHERE member_id='$memberID'";
	$yuery = mysqli_query($dbc,$yql) or die(mysqli_error($dbc));
	$resultCount = mysqli_num_rows($yuery);
	if($resultCount>0){		
	  $salaryValue = $workerSalary;
	}
  }
  
  $searchList .=' <tr>
    <td>'.$workerLastname.'</td>
    <td>'.$workerFirstname.'</td>
    <td>'.$deptTitle.'</td>
	<td>'.$workerPhone.'</td>
	<td>'.$workerEmail.'</td>
	<td>'.$workerLevel.'</td>
	<td>'.$SalaryValue.'</td>
	<td><a href="#modal" class="fancybox" onclick="\pullResume('.$workerID.')">Go<i class="fa fa-user"></i></a></td>
  </tr>';
  }
	echo $searchList; exit();
	}

	//workerID
if(isset($_POST['wID'])){
	$wID = mysqli_real_escape_string($dbc, $_POST['wID']);
	$sql="SELECT id,firstname,lastname,department_id,phone,email,levels,job_title,office_room_number,degrees,biography,photo FROM workers WHERE id='$wID' LIMIT 1"; 
 $query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
 $rezult='';
 while($row = mysqli_fetch_array($query)){
  $workerID = $row[0];
  $workerFirstname = $row[1];
  $workerLastname = $row[2];
  $workerDept = $row[3];
  $workerPhone = $row[4];
  $workerEmail = $row[5];
  $workerLevel = $row[6];
  $workerJobtitle = $row[7];
  $workerOfficeNo = $row[8];
  $workerDegrees = $row[9];
  $workerBio = $row[10];
  $workerPhoto = $row[11];
  $rezult='<div class="">
<h1>'.$workerFirstname.' '.$workerLastname.'</h1>
<div class="row">
<div class="col-sm-6">
<h1><img src="workers/'.$workerPhoto.'" height="300px"></h1>
<h4>Job Title: '.$workerJobtitle.'</h4>
<h4>Room Number: '.$workerOfficeNo.'</h4>
<h4>Degrees: '.$workerDegrees.'</h4>
</div>
<div class="col-sm-6">
<h4>Bio</h4>
'.$workerBio.'
</div>
</div>
</div>';  
echo $rezult; exit();
  }
	exit();
	}	
	
if(isset($_POST['title'])){
	$title = mysqli_real_escape_string($dbc, $_POST['title']);
	
	if($title==''){$status = '<div class="alert alert-danger">Title cannot be empty</div>';}
	else{
$sql = "INSERT INTO departments (title) VALUES ('$title')";
	$query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
	if($query){$status = '<div class="alert alert-success ">Correctly Saved</div>';}else {$status = '<div class="alert alert-warning ">There was an error!</div>';}
		}
	}

$workersList='';
$sql="SELECT id,firstname,lastname,department_id,phone,email,levels,job_title,salary FROM workers"; 
 $query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
 while($row = mysqli_fetch_array($query)){
  $workerID = $row[0];
  $workerFirstname = $row[1];
  $workerLastname = $row[2];
  $workerDept = $row[3];
  $workerPhone = $row[4];
  $workerEmail = $row[5];
  $workerLevel = $row[6];
  $workerJobtitle = $row[7];
  $workerSalary = $row[8];
  
   	$zql="SELECT title FROM departments WHERE id='$workerDept' LIMIT 1"; 
 $zuery = mysqli_query($dbc,$zql) or die(mysqli_error($dbc));
  while($row = mysqli_fetch_array($zuery)){
  $deptTitle = $row[0];
  }
  $salaryValue='';
  if(isset($_SESSION['member_email']) && isset($_SESSION['member_password']) &&isset($_SESSION['member_id'])){
	  $memberID = $_SESSION['member_id'];
	  //Check if admin
	$yql = "SELECT id FROM admin WHERE member_id='$memberID'";
	$yuery = mysqli_query($dbc,$yql) or die(mysqli_error($dbc));
	$resultCount = mysqli_num_rows($yuery);
	if($resultCount>0){		
	  $salaryValue = $workerSalary;
	}
  }
  
  $workersList .=' <tr>
    <td>'.$workerLastname.'</td>
    <td>'.$workerFirstname.'</td>
    <td>'.$deptTitle.'</td>
	<td>'.$workerPhone.'</td>
	<td>'.$workerEmail.'</td>
	<td>'.$workerLevel.'</td>
	<td>'.$salaryValue.'</td>
	<td><a href="#modal" class="fancybox" onclick="pullResume('.$workerID.')">Go<i class="fa fa-user"></i></a></td>
  </tr>';
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

<link href="css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all">
<link href="css/materialdesignicons.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style-signup.css" rel="stylesheet" type="text/css" media="all">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<style>

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
.tableborder {
    border: 1px solid black;
}
</style>
</head>
<body>

			<!-- Navigation -->
<div class="topnav" style="float:right;">
      <a class="active" style="color:white;" href="index.php">Home</a>
      <a href="add_workers.php" style="color:white;" >Add-workers</a>
      <a href="login.php" style="color:white;" >Login</a>
      <a href="userupdates.php" style="color:white;" >User-Update</a>
	  <a href="departmentadmin.php" style="color:white;" >Add-Departments</a>
 	</div><br><br>
  			
<!-- //header -->


<div class="form">
<h1 style=" font-size: 52px;font-weight: 800; text-align:center; letter-spacing: 3px; padding: 37px 0px; color: #FFFFFF; font-family: 'Montserrat', sans-serif;"> Nora's Community</h1>
	<div class="form-content" style="width:60%">
		<?php echo $status; ?>
			<div class="form-info">
				<h1 style="color:white;">Staff Database</h1>
			</div>
			<div class="row">
			<div class="col-xs-10";>
			<input type="text" id="search" style="width:100%; padding:15px; border-radius:5px;"> &nbsp;
			</div>
			<div class="col-xs-2";>
			<input type="button" onclick="searchNow()" value="Search" style="border-radius:5px;height:52px;" class="search"></div></div>
			
	<table style="width:100%;color:white;">
	<thead>
<tr>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
    <th style=" font-weight:bold;">Lastname</th>
	<th style=" font-weight:bold;">Firstname</th>
    <th style=" font-weight:bold;">Assigned Primary Unit</th>
    <th style=" font-weight:bold;">Phone</th>
    <th style=" font-weight:bold;">Email</th>
	<th style=" font-weight:bold;">Level</th>
	<th style=" font-weight:bold;">Salary</th>
	<th style=" font-weight:bold;">Click to Search</th>
  </tr>
  </thead>
  <tbody id="bbd">
  
  <?php echo $workersList ?>
</tbody></table>
<br><br>

			<div class="signup">
			<?php if(isset($_SESSION['member_email']) && isset($_SESSION['member_password']) &&isset($_SESSION['member_id'])){ ?>
			<a href="logout.php"><input type="button" class="loggingout" value = "Logout"></a>
			<?php } else { ?>
			<a href="login.php"><input type="button" class="loggingout" value = "Login"></a>
				<?php } ?>
			</div>
	</div>
</div>


<footer>&copy; 2018 AddressBook | Design by Nora Anazia </footer>

<div style="width:60%; display:none; padding:20px" id="modal">

</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script>
$('.fancybox').fancybox({});

function pullResume(id){
	$.ajax({
  type: "POST",
  url: "index.php",
  data: {wID:id},
  success: function(data){
	  $("#modal").html(data);
  }
});
}

function searchNow(){
	$("#bbd").html('<tr><td colspan="7" style="text-align:center"><img src="images/loda.gif" width="100px" /><br> ... Loading</td></tr>');
	var searchValue = $("#search").val();
		$.ajax({
  type: "POST",
  url: "index.php",
  data: {sach:searchValue},
  success: function(data){
	  $("#bbd").html(data);
  }
});
}
</script>
</body>
</html>