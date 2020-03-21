<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up Here</title>
<link rel="stylesheet" type="text/css" href="../style/style.css"-->
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
</head><body style="background:#eeeeee;"><center>
<div id="login-form" style="margin-top:30px;">
<form method="post">

<?php
session_start();
include_once('db.php');
$school=NULL;$teamid=NULL;$alert=NULL;$team=NULL;$pass=NULL;$find=NULL;$userrow=NULL;$res=NULL;$row=NULL;$id=NULL;
$mem1=NULL;$mem2=NULL;$mem3=NULL;$mem4=NULL;$roll1=NULL;$roll2=NULL;$roll3=NULL;$roll4=NULL;
$_SESSION['userid1c40199c7754da766e']=NULL;
$school=$_SESSION['school'];$teamid=$_SESSION['teamid'];

if(isset($_GET['2kw1Ysxj0keF1h5OJa3n8sISctShix'])){
	if($school==""){header("location:signup.php?2kwIYsxj0keFlh5OJa3n8s1SctShix");}
	if(isset($_SESSION['codecheck'])==true){
		if(isset($_POST['btn-update'])){
			$roll1=$_POST['roll1'];
			$roll2=$_POST['roll2'];
			$roll3=$_POST['roll3'];
			$roll4=$_POST['roll4'];
			if($roll1!=$roll2 && $roll1!=$roll3 && $roll1!=$roll4 && $roll2!=$roll3 && $roll2!=$roll4 && $roll3!=$roll4){
			mysql_query("Update teams set roll1='$roll1', roll2='$roll2', roll3='$roll3', roll4='$roll4' where team_id='$teamid'") or die(mysql_error());
			header("location:teams.php?2kw1Ysxj0keF1h5OJa3n8sISctSh1x");
			}else{
			echo "<script>alert('Duplicate member roll found!, Try again');</script>";
			}
		}
		
		$res = mysql_query("Select * from teams where team_id='$teamid'") or die(mysql_error());
		$row = mysql_fetch_array($res);
		$mem1 = $row['leader']; $mem2 = $row['mem2']; $mem3 = $row['mem3']; $mem4 = $row['mem4'];
		
		echo '<div class="card card-nav-tabs" style="width:50%">
		<div class="header header-info" style="font-weight:bold;">Roll of Team Members</div>
		<div class="content"><div class="tab-content text-center"><table style="width:100%">
		<tr><td><div class="form-group"><h4 class="text-primary">'.$mem1.'</h4></div></td><td><div class="form-group"><select name="roll1"><option value="Programmer">Programmer</option><option value="Web Designer">Web Designer</option><option value="Graphic Designer">Graphic Designer</option><option value="Presenter">Presenter</option></select></div></td></tr>
		<tr><td><div class="form-group"><h4 class="text-primary">'.$mem2.'</h4></div></td><td><div class="form-group"><select name="roll2"><option value="Programmer">Programmer</option><option value="Web Designer">Web Designer</option><option value="Graphic Designer">Graphic Designer</option><option value="Presenter">Presenter</option></select></div></td></tr>
		<tr><td><div class="form-group"><h4 class="text-primary">'.$mem3.'</h4></div></td><td><div class="form-group"><select name="roll3"><option value="Programmer">Programmer</option><option value="Web Designer">Web Designer</option><option value="Graphic Designer">Graphic Designer</option><option value="Presenter">Presenter</option></select></div></td></tr>
		<tr><td><div class="form-group"><h4 class="text-primary">'.$mem4.'</h4></div></td><td><div class="form-group"><select name="roll4"><option value="Programmer">Programmer</option><option value="Web Designer">Web Designer</option><option value="Graphic Designer">Graphic Designer</option><option value="Presenter">Presenter</option></select></div></td></tr>
		<tr><td colspan="2"><div class="form-group"><button type="submit" name="btn-update" class="btn btn-raised btn-primary" style="width:100%;">Enroll the Team</button></div></td></tr></table>
		</div></div></form></center><script>'.$alert.'</script></body></html>';
		
	}else{
		header("location:signup.php?2kwIYsxj0keFlh5OJa3n8s1SctShix");
	}
}elseif(isset($_GET['2kw1Ysxj0keF1h5OJa3n8sISctSh1x'])){
	if($school==""){header("location:signup.php?2kwIYsxj0keFlh5OJa3n8s1SctShix");}
	if(isset($_SESSION['codecheck'])==true){
		if(isset($_POST['btn-reg-team'])){
			if($_POST['pass']==$_POST['confirm']){
				$team=$_POST['team'];
				$pass=$_POST['pass'];
				
				if(strlen($pass)>8 || strlen($pass)==8){
					$find = mysql_query("SELECT * FROM teams WHERE team_name='$team'");
					if($find!=""){
						$userrow = mysql_fetch_array($find);
					}
					if ($userrow=="" || $find==""){
						if(mysql_query("Update teams set team_name='$team' where team_id='$teamid'")){
							mysql_query("Update teams set pass='$pass' where team_id='$teamid'") or die(mysql_error());
							mysql_query("Insert into status(id,ph2,online,other) VALUES('$teamid','yn','yn','n')") or die(mysql_error());
							$alert = 'alert("You have successfully registered!");';
							$res = mysql_query("SELECT * FROM teams WHERE team_id='$teamid'");
							$row = mysql_fetch_array($res);
							$id=$row['team_id'];
							$_SESSION['userid1c40199c7754da766e']=$id;
							header("Location:index.php");
						}else{
							$alert = 'alert("Error occured while registration. Please try again");';
						}
					} else {
						$alert = 'alert("Someone is using this Team Name.Try another! \n\n '.$userrow['uname'].'");';
					}
				} else {
					$alert = 'alert("Password must contain at least 8 characters!");';
				}
			} else {
				$alert = 'alert("Password confirmation failed! Please try the same");';
			}
		}
		
		echo '<div class="card card-nav-tabs" style="width:50%">
		<div class="header header-info" style="font-weight:bold;">Team Info</div>
		<div class="content"><div class="tab-content text-center">
		<div class="form-group"><input type="text" class="form-control" style="width:100%;" name="team" placeholder="Team Name" required autofocus="true" autocomplete="off" /></div>
		<div class="form-group"><input type="password" class="form-control" name="pass" style="width:100%;" placeholder="Team Password" required autocomplete="off" /></div>
		<div class="form-group"><input type="password" class="form-control" name="confirm" style="width:100%;" placeholder="Confirm Password" required autocomplete="off" /></div>
		<div class="form-group"><button class="btn btn-raised btn-primary" style="width:100%;" type="submit" name="btn-reg-team">Enroll the Team</button></div>
		</form></div></center></body><script>'.$alert.'</script></html>';
	}else{
		header("location:signup.php?2kwIYsxj0keFlh5OJa3n8s1SctShix");
	}
} else {
	echo '<script>alert("Error of GET code (0x0008600), Try again!");</script>';
	header("refresh:0;url=../index.php");
}
?>