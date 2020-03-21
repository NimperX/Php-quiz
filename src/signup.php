<?php
session_start();
include_once('db.php');
$code=NULL;$alert='';$_SESSION['codecheck']=NULL;$school='';$row='';$res='';$_SESSION['school']=NULL;

/*$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Sign Up Here</title><script>';
$head = '</script><link rel="stylesheet" type="text/css" href="../style/style.css"><link rel="icon" type="favicon" href="../logos/ACICTS.png"></head><body><center><div id="login-form"><form method="post"><table width="50%" border="0">';
$foot = '</table></form></div></center></body></html>';
if(isset($_SESSION)*/


if(isset($_GET['2kwIYsxj0keFlh5OJa3n8s1SctShix'])){
	$_SESSION['codecheck']=false;
	
	if(isset($_POST['check-code'])){
		$code=$_POST['code'];
		if((strlen($code)!=10)||($code==NULL)){
			$alert='alert("Invalid Code found! Check your code and Try again!");';
		}else{
			$res=mysql_query("Select * from codes where code='$code'");
			$row=mysql_fetch_array($res);
			if($row==NULL){
				$alert='alert("The code you entered is not in Database. \nCheck your code and Try again!");';
			}else{
				$_SESSION['school']=$row['schoolname'];
				$_SESSION['codecheck']=true;
				
				header("location:MIC.php?2kw1Ysxj0keFlh5OJa3n8s1SctShix");
			}
		}
	}
	
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" type="favicon" href="../logos/ACICTS.png">
	<title>Sign Up Here</title>
	<script>'.$alert.'</script>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<link rel="icon" type="favicon" href="../logos/ACICTS.png">
	
	<!--link href="../assets/css/bootstrap.min.css" rel="stylesheet" /-->
    <link href="../assets/css/material-kit.css" rel="stylesheet"/>
	<link href="../assets/css/demo.css" rel="stylesheet" />
	<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js"></script>
	<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="../assets/js/material-kit.js" type="text/javascript"></script>
	
	</head><body style="background:#eeeeee;font-size:18px;"><center><div id="login-form"><form method="post">
	<div class="card card-nav-tabs" style="width:50%">
		<div class="header header-info" style="font-weight:bold;">Code Check</div>
		<div class="content"><div class="tab-content text-center"><div class="form-group">
			<input type="text" name="code" style="width:100%" value="" placeholder="Code of Your School" class="form-control">
		<span class="material-input"></span></div><button name="check-code" class="btn btn-raised btn-primary" style="width:100%">Check My Code<div class="ripple-container"></div></button></div>
	</div> </div></form></div></center></body></html>';
}else{
	$alert='alert("Error of GET code (0x0008600), Try again!");';
	echo $html.$alert.'</script></head>'.$foot;
	header("refresh:0;url=../index.php");
}
?>