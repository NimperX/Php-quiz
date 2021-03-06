<html>
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		 <link rel="icon" type="favicon" href="../logos/ACICTS.png">
		 <link rel="stylesheet" href="../style/paper.css">
		 <link rel="stylesheet" href="../style/style.css">
		 <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/css/material-kit.css" rel="stylesheet"/>
		<link href="../assets/css/demo.css" rel="stylesheet" />
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../assets/js/material.min.js"></script>
		<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="../assets/js/material-kit.js" type="text/javascript"></script>
        <title>Individual Projects</title>
    </head>

<style>
h1{margin:0px;font-weight:bold}
body{font-family:Verdana;font-size:13px;background-color:#852b99;}
p{font-size:18px;}
a#a{color: rgb(169, 65, 65);;font-weight:bolder;}
a#a:hover{color: rgb(104, 5, 5);;font-weight:bolder;}
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
.form-group{margin-top:0px;}
</style>
<body>
<a href="home.php"><button style="top:10px;left:10px;"class="btn btn-default btn-raised btn-fab btn-fab-mini btn-round">
	<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
</svg>
</button></a></button>
<?php
session_start();
include_once 'db.php';
$query=NULL;$query1=NULL;$query2=NULL;$row=NULL;$row1=NULL;$row=NULL;$row2=NULL;$f=NULL;$leader=NULL;
$uid=$_SESSION['userid1c40199c7754da766e'];$other=NULL;$from=NULL;$dscr=NULL;$f_name=NULL;

if(!isset($_SESSION['userid1c40199c7754da766e'])){
	header("Location:index.php");
}

$query=mysql_query("Select * from status where id='$uid'") or die(mysql_error().'1' );
$row=mysql_fetch_array($query) or die(mysql_error());
$ph2=$row['ph2'];

$query1=mysql_query("Select * from teams where team_id='$uid'") or die(mysql_error().'2');
$row1=mysql_fetch_array($query1) or die(mysql_error());
$leader=$row1['leader'];



if (isset($_POST['upload'])) {
	require_once '../phpmailer/class.phpmailer.php';
	
	$f=$_FILES['file']['tmp_name'];
	$f_name=$_FILES['file']['name'];
	$name=$_POST['name'];
	$dscr=$_POST['dscr'];
	$query2=mysql_query("Select * from users where name='$name'") or die(mysql_error().'3');
	$row2=mysql_fetch_array($query2);
	$from=$row2['email'];
	move_uploaded_file($f, "uploads/".basename($f_name));
	$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch
	
	if(!empty($f)){
		try {
		  $mail->AddAddress('Acicts2016@gmail.com', 'ACICTS');
		  $mail->SetFrom($from, 'Individual Project - '.$row1['school'].' - '.$name);
		  $mail->AddReplyTo($from, 'Individual Project - '.$row1['school'].' - '.$name);
		  $mail->Subject = 'Individual Project';
		  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
		  $mail->MsgHTML('<b>Individual Project @Online_quiz_2016</b><br>
							School : '.$row1['school'].'<br>
							Team ID : '.$uid.'<br>
							Team Name : '.$row1['team_name'].'<br>
							Member Name : '.$name.'<br>
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

if($ph2=='yn'){
	echo '<div class="wait"><center><h1>Wait Until the Contest Start!</h1><br><img src="../img/ind.png"><br><br><p>In the Individual Project Section,<br>You can submit the Soft Copy of your paper,completed by Team members of Your Team to our Cloud Storage.<br>We will review it After the end of Phase #2 and Best projects will bonus marks to their Team<br></p></div>';
}elseif($ph2=='y'){
	echo '<div class="wait" style="height:100%;"><center><h1>You have qualified to Phase #2!</h1><br><img src="../img/ind.png"><br><br><p>In the Individual Project Section,<br>You can submit the Soft Copy of your paper,completed by Team members of Your Team to our Cloud Storage.<br>We will review it After the end of Phase #2 and Best projects will bonus marks to their Team<br></p><br><br><div class="card card-nav-tabs" style="width:50%;padding:0 20px 10px 20px;">
				<div class="header header-info" style="font-weight:bold;background:#AB47BC;"><font size="+3">Submit Your Paper</font></div>
				<form method="POST" enctype="multipart/form-data" >
				<input class="btn btn-raised" style="width:100%" type="file" name="file" />
				<table style="width:100%;"><tr><td style="color:#000">Member Name :</td><td><select style="width:100%" name="name"><option value="'.$row1['leader'].'">'.$row1['leader'].'</option><option value="'.$row1['mem2'].'">'.$row1['mem2'].'</option><option value="'.$row1['mem3'].'">'.$row1['mem3'].'</option><option value="'.$row1['mem4'].'">'.$row1['mem4'].'</option></select></td></tr></table>
				<tr><td colspan="2"><div class="form-group"><textarea class="form-control" name="dscr" rows="5" style="width:100%;" placeholder="A Description about your Project..."></textarea></div>
				<br><button class="btn btn-raised" type="submit" name="upload" style="width:100%;font-family: verdana,sans-serif,arial;text-transform: UPPERCASE;font-weight: bolder;">Upload the file to Cloud Storage</button>
				<!--<input style="display:none" type="text" name="dest" value="shared" />-->
				<input type = "hidden" name="order" value="as04sdad"/>
			</div><br><br></center></div>';
}elseif($ph2=='n'){
	echo '<div class="wait"><center><h1>You have not qulified to Phase #2!</h1><br><img src="../img/ind.png"><br><br><p>In the Individual Project Section,<br>You can submit the Soft Copy of your paper,completed by Team members of Your Team to our Cloud Storage.<br>We will review it After the end of Phase #2 and Best projects will bonus marks to their Team<br></p></div>';
}else{
	echo '<div class="error">Invalid Data Found 0x00e000f3<br>Missing Data from the Database 0x0000000f<br>Check your Login Again Contact Us <a href="mailto:acicts2k16@gmail.com" id="a">ACICTS 2016</a></div>';
}
?>