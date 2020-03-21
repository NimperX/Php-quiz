<?php
session_start();
include_once('db.php');
$uid='';$comq='';$ca='';$wa='';$tb='';$tot='';$blnk='';$query='';$main='';$row='';$userrow='';$query='';$find='';
$com=NULL;$random=NULL;$qu=NULL;$an1=NULL;$an2=NULL;$an3=NULL;$an4=NULL;$blank=NULL;$correct=NULL;$wrong=NULL;
$bonus=NULL;$score=NULL;$qno=0;
$uid=$_SESSION['userid1c40199c7754da766e'];

if(!isset($_SESSION['userid1c40199c7754da766e'])){
	header("Location:index.php");
}

	$main='<html><head>
		<link rel="stylesheet" type="text/css" href="../style/ph2.css">
		<link rel="stylesheet" type="text/css" href="../style/sponsor.css">
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
		<title>Online Quiz</title><style>#onq-head{margin-top:30px;}</style></head>
		<body oncontextmenu="return false">
		<div id="back"><a href="home.php"><button style="left:10px;"class="btn btn-default btn-raised btn-fab btn-fab-mini btn-round">
			<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
</svg>
		</button></a></div>
		<div id="t1" style="float:right; width:29%; background-color:#FFF;">
		<table style="width:100%">
			<tr align="center"><td colspan="6" style="width:100%">
				<b>Platinum Sponsor</b>
				<a class="link" href="http://www.w3schools.com" target="new">
				<div id="us" ></div></a>
			</td></tr>
			<tr align="center"><td colspan="3" style="width:50%">
				<b>Gold Sponsor</b>
				<a class="link" href="http://www.w3schools.com" target="new">
				<div id="vs" ></div></a>
			</td><td colspan="3" style="width:50%">
				<b>Silver Sponsor</b>
				<a class="link" href="http://www.w3schools.com" target="new">
				<div id="ws" ></div>
				</a>
			</td></tr>
		
			<tr align="center"><td colspan="6" style="width:100%;" align="center">
				<b>Associate Sponsors</b>
			</td></tr>
			<tr align="center"><td colspan="2" style="width:40%;">
				<a class="link" href="http://www.w3schools.com" target="new">
				<div id="xs" ></div>
				</a>
			</td><td colspan="2" style="width:20%;">
				<a class="link" href="http://www.w3schools.com" target="new">
				<div id="ys" ></div>
				</a>
			</td><td colspan="2" style="width:40%;">
				<a class="link" href="http://www.w3schools.com" target="new">
				<div id="zs" ></div>
				</a>
			</td></tr>
		</table></div><div id="onq-head">
		<div class="card card-nav-tabs" style="width:69%;margin-top:10px;">
		<div class="header header-info" style="font-weight:bold;font-size:50px;text-align:center;">Online Quiz</div>
		<div class="content"><div class="tab-content text-center">';

	$intro = '<table style="width:100%;"><tr><td><font size="+3">Introduction</font></td></tr>
			<tr><td>
				<!--introduction here-->
				<br />
			</td></tr>
			<tr><td>
				<br />
			</td></tr>
			<tr><td><font size="+3">Instructions</font></td></tr>
			<tr><td>
				1.&nbsp;<br />
				2.&nbsp;<br />
				3.&nbsp;<br />
				4.&nbsp;<br />
				<br />
			</td></tr>
			<tr><td>
				<br />
			</td></tr>
			<tr><td><font size="+3">Marking Scheme</font></td></tr>
			<tr><td>
				<!--Marking Scheme here-->
				<br />
			</td></tr>
			<tr><td align="center">
				<a href="onq.php?2aee1c40199c7754da766e61452612cc">
				<div class="btn btn-raised btn-primary" id="btn">Start Now</div>
				</a>
			</td></tr></table></div></div></div></div></body><html>';
			


	$query=mysql_query("Select * from status where id='$uid'") or die(mysql_error());
	$userrow=mysql_fetch_array($query);
	if($userrow['online']=='n'){
		echo $main.$intro;

	} elseif($userrow['online']=='y'){
		$find=mysql_query("Select * from sqd where id='$uid'") or die(mysql_error());
		while ($row=mysql_fetch_array($find)){
			$comq=$row['complete'];
			$ca=$row['correct'];
			$wa=$row['wrong'];
			$tb=$row['bonus'];
			$tot=$row['score'];
			$blnk=$comq-($ca+$wa);
		}
		$scoreboard='
		<tr><td><font size="+3">Successfully Completed!</font></td><br></tr>
		<tr><td><font size="+2"><b>Summary</b></font><br><br>
		<table><tr><td colspan="1">Completed</td><td colspan="1">:</td><td colspan="1">'.$comq.'</td></tr>
		<tr><td colspan="1">Correct</td><td colspan="1">:</td><td colspan="1">'.$ca.'</td></tr>
		<tr><td colspan="1">Wrong</td><td colspan="1">:</td><td colspan="1">'.$wa.'</td></tr>
		<tr><td colspan="1">Not Done</td><td colspan="1">:</td><td colspan="1">'.$blnk.'</td></tr>
		<tr><td colspan="1">Time Bonus</td><td colspan="1">:</td><td colspan="1">'.$tb.'</td></tr>
		<tr><td colspan="1">Total Score</td><td colspan="1">:</td><td colspan="1">'.$tot.'</td></tr>
		</table></td></tr></table></div></div></div></div><body><html>';
		
		echo $main.$scoreboard;
	}
?>