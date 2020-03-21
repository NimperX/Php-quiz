<html>
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		 <link rel="icon" type="favicon" href="../logos/ACICTS.png">
		 <link rel="stylesheet" href="../style/paper.css">
        <title>ICT Symposium</title>
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/css/material-kit.css" rel="stylesheet"/>
		<link href="../assets/css/demo.css" rel="stylesheet" />
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../assets/js/material.min.js"></script>
		<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>
		<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="../assets/js/material-kit.js" type="text/javascript"></script>
    </head>

<style>

p{
font-size:18px;
}

tr,td{padding:5px;}

.button {
    border-radius: 10px;
    padding: 10px;
    font-family: inherit;
    font-weight: bolder;
    text-transform: uppercase;
    width: 390px;
    height: 100%;
    
    background-repeat: no-repeat;
    /* background-repeat-x: inherit; */
    border: 0px;
    font-size: 20px;
    background-position: center;
    background-size: initial;
}

a#a{color: rgb(169, 65, 65);;font-weight:bolder;}
a:hover{color: rgb(138, 141, 146);}
a{text-decoration:none;}
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
$uid=$_SESSION['userid1c40199c7754da766e'];$ph2=NULL;$other=NULL;
if(!isset($_SESSION['userid1c40199c7754da766e'])){
	header("Location:index.php");
}

$uid=$_SESSION['userid1c40199c7754da766e'];
$query=mysql_query("Select * from status where id='$uid'") or die(mysql_error());;
$row=mysql_fetch_array($query) or die(mysql_error());
$ph2=$row['ph2'];$other=$row['other'];

if(isset($_POST['download'])){
	header("location:../res/Admission.docx");
}
if(isset($_POST['upload'])){
	header("location:upload.php");
}

if($ph2=='yn'){
	echo '<style>body{color:#fff;font-family:Verdana;font-size:13px;background-color:#28b779;}</style><div class="wait"><center><h1 style="font-weight:bold">Wait Until the Contest Start!</h1><br><img src="../img/ppr.png"><br><br><p>In this phase,ICT Symposium<br>You can submit the Soft Copy of your paper,completed by Your Team to our Cloud Storage.<br>We will review it After the end of Phase #2 and Select 10 teams to the Final Phase</p></div>';
}elseif($ph2=='y'){
	echo '<style>body{color:#fff;font-family:Verdana;font-size:13px;background-color:#E8E8E8;}a,a:hover,a:focus{text-decoration:none;color:rgb(8, 112, 241);}</style><center><div class="card card-nav-tabs" style="width:90%;padding-bottom:20px;">
		<div class="header header-info" style="background:#28b779;font-weight:bold;"><font size="+3">You have qualified to Phase #2!</font></div>
		<div class="row"><form method="post"><div class="col-sm-6"><button style="background-color:#28b779;height: 390px;background-image: url(../img/download.png);background-size:300px;" class="btn btn-raised btn-success btn-lg button" type="submit" name="download"></button></div><div class="col-sm-6"><button style="background-color:#28b779;height: 390px;background-image: url(../img/upload.png);background-size:300px;" class="btn btn-raised btn-success btn-lg button" type="submit" name="upload"></button></div></form></div></div></center>';
}elseif($ph2=='n'){
	echo '<style>body{color:#fff;font-family:Verdana;font-size:13px;background-color:#28b779;}</style><div class="wait"><center><h1 style="font-weight:bold">You have not qulified to Phase #2!</h1><br><img src="../img/ppr.png"><br><br><p>In this phase,ICT Symposium<br>You can submit the Soft Copy of your paper,completed by Your Team to our Cloud Storage.<br>We will review it After the end of Phase #2 and Select 10 teams to the Final Phase</p></div>';
}else{
	echo '<style>body{color:#fff;font-family:Verdana;font-size:13px;background-color:#28b779;}</style><br><br><div class="error">Invalid Data Found 0x00e000f3<br>Missing Data from the Database 0x0000000f<br>Check your Login Again Contact Us <a href="mailto:acicts2k16@gmail.com" id="a">ACICTS 2016</a></div>';
}

?>

</body>
</html>
