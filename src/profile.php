<html>
<head>
<title>Team Profile</title>
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
</head><style>.main.main-raised{padding:15px;} .label.label-primary{font-size:17px;} .table{margin-top:10px;}</style>
<body>
<?php
session_start();
include_once('db.php');
$userid=NULL;$show1=NULL;$show2=NULL;$show3=NULL;$row1=NULL;$row2=NULL;$row3=NULL;$school=NULL;

$userid=$_SESSION['userid1c40199c7754da766e'];
$show1=mysql_query("Select * from teams where team_id='$userid'") or die(mysql_error());
$row1=mysql_fetch_array($show1);
$school=$row1['school'];

$show2=mysql_query("Select * from users where id='$userid'") or die(mysql_error());
$row2=mysql_fetch_array($show2);

$show3=mysql_query("Select * from mic where school='$school'") or die(mysql_error());
$row3=mysql_fetch_array($show3);

echo '
<div class="wrapper">
	<div class="header header-filter" style="backgound-color:#7B7B7B;">
		<div class="container">
			<div class="row">
				<div class="col-sm-6"><a href="home.php"><button style="top:10px;"class="btn btn-default btn-raised btn-fab btn-fab-mini btn-round">
					<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
</svg>
				</button></a></div>
				<div class="col-sm-6 col-md-offset-3">
					<h1 class="title text-center">'.$school.'</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="main main-raised">
		<div class="section">
			<div class="container">
				<div class="row"><label class="label label-primary" style="margin-bottom:5px;"><b>Team Info</b></label><br></div>
				<div class="row">
					<table style="width:50%;margin-top:20px;">
						<tr><td><b>Master In Charge</b></td><td>:'.$row3['name'].'</td></tr>
						<tr><td><b>Team ID</b></td>			<td>:'.$row1['team_id'].'</td></tr>
						<tr><td><b>Team Name</b></td>		<td>:'.$row1['team_name'].'</td></tr>
						<tr><td><b>Team Leader</b></td>		<td>:'.$row1['leader'].'</td></tr>
					</table><br>
				</div>
				<div class="row" style="margin-top:30px;">
					<label class="label label-primary"><b>Team Members'.chr(39).' Info</b></label>
					<table class="table" style="width:100%">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th>Name</th>
								<th>Address</th>
								<th>Contact No.</th>
								<th>Roll</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">1</td>
								<td>'.$row1['leader'].'</td>
								<td>'.$row1['address1'].'</td>
								<td>'.$row1['telno1'].'</td>
								<td>'.$row1['roll1'].'</td>
							</tr>
							<tr>
								<td class="text-center">2</td>
								<td>'.$row1['mem2'].'</td>
								<td>'.$row1['address2'].'</td>
								<td>'.$row1['telno2'].'</td>
								<td>'.$row1['roll2'].'</td>
							</tr>
							<tr>
								<td class="text-center">3</td>
								<td>'.$row1['mem3'].'</td>
								<td>'.$row1['address3'].'</td>
								<td>'.$row1['telno3'].'</td>
								<td>'.$row1['roll3'].'</td>
							</tr>
							<tr>
								<td class="text-center">4</td>
								<td>'.$row1['mem4'].'</td>
								<td>'.$row1['address4'].'</td>
								<td>'.$row1['telno4'].'</td>
								<td>'.$row1['roll4'].'</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		        <div class="container">
		            <div class="copyright pull-right">
		                &copy; 2016 <a href="http://www.acicts.org" target="_blank">ACICTS</a>
		            </div>
		        </div>
		    </footer>
</div>
';

?>
	
</body>
</html>