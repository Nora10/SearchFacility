<?php 
session_start();
include('dbConnection.php');
if(isset($_SESSION['member_email']) && isset($_SESSION['member_password']) &&isset($_SESSION['member_id'])){
	

//Get Database Connection from Classs
//Rescreen session for harmful manipulation by hackers.
$memberID = mysqli_real_escape_string($dbc,$_SESSION['member_id']);
$memberEmail = mysqli_real_escape_string($dbc,$_SESSION['member_email']);
$memberPassword = mysqli_real_escape_string($dbc,$_SESSION['member_password']);

	
	$sql = "SELECT firstname,lastname,phone,photo FROM workers WHERE email='$memberEmail' AND password='$memberPassword' AND id='$memberID' LIMIT 1";
	$query = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
	$checkExist = mysqli_num_rows($query);
	
	if($checkExist<1){header('location: login.php');exit();}
	else if($checkExist==1){
		while($row = mysqli_fetch_array($query)){
			$memberFirstname = $row[0];
			$memberLastname = $row[1];
			$memberphone = $row[2];
			$memberPhoto = $row[3];
			
			if($memberPhoto==''){$memberPhoto='default.png';}
			
			
			}
		}
	
	
	}else{
		header('location: login.php'); exit();
		}
?>
