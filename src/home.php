<?php
session_start();
include_once('db.php');
$userid='';$show1='';$row='';$msg1='';$msg2='';

if(!isset($_SESSION['userid1c40199c7754da766e'])){
	header("Location:index.php");
}

$userid=$_SESSION['userid1c40199c7754da766e'];
$show1=mysql_query("Select * from status where id='$userid'") or die(mysql_error());
$row=mysql_fetch_array($show1);
if($row['online']=='y'){
	$msg1='Successfully<br>Completed';
	if($row['ph2']=='y'){
		$msg2='You have<br>qualified';
	} elseif($row['ph2']=='n'){
		$msg2='Not Qualified<br>to phase 2';
	} elseif($row['ph2']=='yn'){
		$msg2='Wait Until<br>Contest Start';
	}
} elseif($row['online']=='n'){
	$msg1='Start Now';
	$msg2='Wait Until<br>Contest Start';
} elseif($row['online']=='yn'){
	$msg1='Wait Until<br>Contest Start';
	$msg2='Wait Until<br>Contest Start';
}


echo '<html>
    <head>
        <title>Getting Start</title>
        <link rel="stylesheet" type="text/css" href="../style/login.css">
        <link rel="stylesheet" type="text/css" href="../style/sponsor.css">
		<link rel="icon" type="favicon" href="../logos/ACICTS.png">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/css/material-kit.css" rel="stylesheet"/>
		<link href="../assets/css/demo.css" rel="stylesheet" />
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../assets/js/material.min.js"></script>
		<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="../assets/js/material-kit.js" type="text/javascript"></script>
		<style>a,a:hover,a:focus{text-decoration:none;}</style>
    </head>
    <body oncontextmenu="return false"><nav class="navbar navbar-info navbar-fixed-top navbar-color-on-scroll">
		<div class="container"><div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-index">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" rel="tooltip" title="Pulz'.chr(39).'16 Official WebSite" data-placement="bottom" style="padding-top:0;" href="http://pulz16.com" target="_blank"><img src="../logos/pulz_1.png" style="height:60px;"></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-index">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="contact.php" rel="tooltip" title="Contact Us" data-placement="bottom"><svg fill="#fff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg></a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<svg fill="#fff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/>
</svg>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li class="dropdown-header">Settings</li>
						<li class="divider"></li>
						<li><a href="profile.php">View Profile</a></li>
						<li class="divider"></li>
						<li><a href="logout.php?logout">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div></nav><style>.navbar.navbar-info{background:#0587E4;}';
if($row['online']=='y'){
		if($row['ph2']=='yn'){
			echo '#one{background-color:#27a9e3;}#one:hover{background-color:#2295c9;}#two:hover{opacity:0.2;}#three:hover{opacity:0.2;}';
		}else{
			echo '#one{background-color:#27a9e3;}#one:hover{background-color:#2295c9;}#two{background-color:#28b779;}#two:hover{background-color:#17a669;}#three{background-color:#852b99;}#three:hover{background-color:#741d88;}';
		}
	}else{
		if($row['online']=='yn'){
			echo '#one{background-color:#777;}#one:hover{opacity:0.2;}';
		}else{
			echo '#one{background-color:#27a9e3;}#one:hover{background-color:#2295c9;}';
		}
		echo '#two:hover{opacity:0.2;}#three:hover{opacity:0.2;}';
	}
echo "</style><table style='width:800px;height:100%; background-color:#FFF;box-shadow:0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);' align='center' >
				<tr height='120px'>
					<!--code here-->
				</tr>
	
				<tr>
					<td id='a' align='center' colspan='6'>
						Welcome to PULZ'16<br>Contest Dashboard<br><hr>
					</td>
				</tr>
				
				<tr align='center'>
					<td><table style='width:70%'>
						<tr>
						<td class='1' style='padding:5px;'> ";
							if($row['online']=='yn'){echo '<a data-toggle="modal" data-target="#onq-yn"><div class="locked">';}else{echo "<a href='online-quiz.php'>";} 
							echo "<div id='one' align='center'>
									<img src='../img/onq.png' id='1' style='height:120px;'>
									<div id='msg'>".$msg1."</div>                       
								</div></div>
							</a>
						</td>
						<td class='1' style='padding:5px;'>";
							if($row['online']=='yn' || $row['ph2']=='yn'){echo '<a data-toggle="modal" data-target="#ph2-yn"><div class="locked">';}else{echo "<a href='paper.php'>";} 
							echo "
								<div id='two' align='center'>
									<img src='../img/ppr.png' style='height:120px;'>
									<div id='msg'>".$msg2."</div>  
								</div></div>
							</a> 
						</td>
						<td class='1' style='padding:5px;'>";
							if($row['online']=='yn' || $row['ph2']=='yn'){echo '<a data-toggle="modal" data-target="#ph2-yn"><div class="locked">';}else{echo "<a href='individual-project.php'>"; }
							echo "
								<div id='three' align='center'>
									<img src='../img/ind.png' style='height:120px;'>
									<div id='msg'>".$msg2."</div>  
								</div></div>
							</a>
						</td>
						</tr>
					</table></td>
				</tr>
				<tr>
				<td colspan='6'><hr></td>
				</tr>
				<tr>
				<td colspan='6'>
					<table style='width:100%'>
					<tr align='center'>
						<td colspan='2' style='width:33.3%'>
							<b>Gold Sponsor</b>
							<a class='link' href='http://www.w3schools.com' target='new'>
							<div id='v'></div></a>
						</td>
						<td colspan='2' style='width:33.3%'>
							<b>Platinum Sponsor</b>
							<a class='link' href='http://www.w3schools.com' target='new'>
							<div id='u'></div>
							</a>
						</td>
						<td colspan='2' style='width:33.3%'>
							<b>Silver Sponsor</b>
							<a class='link' href='http://www.w3schools.com' target='new'>
							<div id='w'></div>
							</a>
						</td>
					</tr>
					</table>
				</td><tr height='30px'></tr>
				</tr>
				<tr>
				<td colspan='6' align='center' >
				<b>Associate Sponsors</b>
				</td>
				</tr>
				<tr style='padding-top:50px;'>
				<td colspan='6'>
					<table style='width:100%;' >
					<tr align='center'>
						<td colspan='2' style='width:40%;'>
							<a class='link' href='http://www.w3schools.com' target='new'>
							<div id='x'></div>
							</a>
						</td>
						<td colspan='2' style='width:20%;'>
							<a class='link' href='http://www.w3schools.com' target='new'>
							<div id='y'></div>
							</a>
						</td>
						<td colspan='2' style='width:40%;'>
							<a class='link' href='http://www.w3schools.com' target='new'>
							<div id='z'></div>
							</a>
						</td>
					</tr>
					</table>
				</td>
				</tr><tr height='40px'></tr>
			</table>";
			echo '<div class="modal fade" id="onq-yn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog"><div class="modal-content"><div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Access Denied!</h4></div>
			<div class="modal-body">You are not permitted to access here until <b>Online Quiz</b> Starts.</div></div></div>
			</div>
			<div class="modal fade" id="ph2-yn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog"><div class="modal-content"><div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Access Denied!</h4></div>
			<div class="modal-body">You are not permitted to access until the <b>Phase #2</b> starts.</div></div></div>
			</div>
			
			</body></html>';
?>