<html>
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		 <link rel="icon" type="favicon" href="../logos/ACICTS.png">
		 <link rel="stylesheet" href="../style/paper.css">
		 <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/css/material-kit.css" rel="stylesheet"/>
		<link href="../assets/css/demo.css" rel="stylesheet" />
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../assets/js/material.min.js"></script>
		<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="../assets/js/material-kit.js" type="text/javascript"></script>
        <title>ICT Symposium</title>
    </head>

<style>
h1{margin:0px;font-weight:bold;}
body{font-family:Verdana;font-size:13px;background-color:#28b779;}
p{font-size:18px;}
a#a{color: rgb(169, 65, 65);;font-weight:bolder;}
a:hover{color: rgb(104, 5, 5);;font-weight:bolder;}
a{color:#fff;text-decoration:none;}
.message{
background-color:#FFFFE0;
border:1px solid #E6DB55;
margin:30px 0 16px 8px;
padding:12px;
width:774px;
color:#239016;
font-weight: bold;
}
.err{
background-color:#FFFFE0;
border:1px solid #E6DB55;
margin:30px 0 16px 8px;
padding:12px;
width:774px;
color:#B10404
}

</style>
<body>
<a href="paper.php"><button style="top:10px;left:10px;"class="btn btn-default btn-raised btn-fab btn-fab-mini btn-round">
	<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
</svg>
</button></a></button>
<?php
session_start();
include_once 'db.php';
$query=NULL;$query1=NULL;$query2=NULL;$row=NULL;$row1=NULL;$row=NULL;$row2=NULL;$f=NULL;$leader=NULL;
$uid=$_SESSION['userid1c40199c7754da766e'];$other=NULL;$from=NULL;$dscr=NULL;

if(!isset($_SESSION['userid1c40199c7754da766e'])){
	header("Location:index.php");
}

$query=mysql_query("Select * from status where id='$uid'") or die(mysql_error().'1' );
$row=mysql_fetch_array($query) or die(mysql_error());
$other=$row['other'];

$query1=mysql_query("Select * from teams where team_id='$uid'") or die(mysql_error().'2');
$row1=mysql_fetch_array($query1) or die(mysql_error());
$leader=$row1['leader'];

$query2=mysql_query("Select * from users where name='$leader'") or die(mysql_error().'3');
$row2=mysql_fetch_array($query2);
$from=$row2['email'];

if (isset($_POST['upload'])) {
	require_once '../phpmailer/class.phpmailer.php';
	
	$f=$_FILES['file']['tmp_name'];
	$f_name=$_FILES['file']['name'];
	$dscr=$_POST['dscr'];
	move_uploaded_file($f, "uploads/".basename($f_name));
	$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch
	
	if(!empty($f)){
		try {
		  $mail->AddAddress('Acicts2016@gmail.com', 'ACICTS');
		  $mail->SetFrom($from, 'ICT Symposium - '.$row1['school'].' '.$row1['team_name']);
		  $mail->AddReplyTo($from, 'ICT Symposium - '.$row1['school'].' '.$row1['team_name']);
		  $mail->Subject = 'ICT Symposium';
		  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
		  $mail->MsgHTML('<b>ICT Symposium @Online_quiz_2016</b><br>
							School : '.$row1['school'].'<br>
							Team ID : '.$uid.'<br>
							Team Name : '.$row1['team_name'].'<br>
							<table>
							<tr><td>Team Leader </td><td>: '.$row1['leader'].'</td></tr>
							<tr><td>Team Members </td><td>: '.$row1['mem2'].'</td></tr>
							<tr><td></td><td>: '.$row1['mem3'].'</td></tr>
							<tr><td></td><td>: '.$row1['mem4'].'</td></tr></table>
							<p>'.$dscr.'</p>');
		  $mail->AddAttachment('uploads/'.$f_name);
		  $mail->Send();
		  echo '<center><div class="message">File Uploaded Successfully!</div></center>';
		} catch (phpmailerException $e) {
		  echo $e->errorMessage(); 
		} catch (Exception $e) {
		  echo $e->getMessage();
		}
		unlink('uploads/'.$f_name);//'uploads/'.$f_name //delete File
	}else{
		echo '<center><div class="err">Source file is empty!</div></center>';
	}
}

if($row['ph2']=='y'){
		if($other=='n'){
		echo '<div class="wait" style="height:100%;"><center><h1>You have qualified to Phase #2!</h1><br><img src="../img/ppr.png"><br><br><p>In this phase,ICT Symposium<br>You can submit the Soft Copy of your paper,completed by Your Team to our Cloud Storage.<br>We will review it After the end of Phase #2 and Select 10 teams to the Final Phase</p><br><br><div class="card card-nav-tabs" style="width:50%;padding:0 20px 10px 20px;">
				<div class="header header-info" style="font-weight:bold;background:#4ACE95;"><font size="+3">Submit Your Paper</font></div>
				<form method="POST" enctype="multipart/form-data" >
				<input class="btn btn-raised" style="width:100%" type="file" name="file" />
				<textarea class="form-control" name="dscr" rows="5" style="width:100%;" placeholder="A Description about your Project..."></textarea>
				<button class="btn btn-raised btn-primary" type="submit" name="upload" style="background-color:#28b779;width:100%;font-family: verdana,sans-serif,arial;text-transform: UPPERCASE;font-weight: bolder;">Upload the file to Cloud Storage</button>
				</form></div><br><br></center></div>';
		}elseif($other=='y'){
			echo '<script>alert("You have have completed the ICT Symposium!");</script>';
			header("refresh:0;url=paper.php");
		}else{
			echo '<br><br><div class="error">Invalid Data Found 0x00e000f3<br>Missing Data from the Database 0x0000000f<br>Check your Login Or Contact Us <a href="mailto:acicts2k16@gmail.com" id="a">ACICTS 2016</a></div>';
		}
}else{
	header("location:paper.php");
}
?>