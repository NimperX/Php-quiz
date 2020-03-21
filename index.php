<?php
session_start();
include_once('src/db.php');
$fname='';$lname='';$school='';$year='';$uname='';$email='';$pass='';$find='';$userrow='';$alert='';$res='';$row='';
$usn='';$pd='';$id='';

if(isset($_SESSION['userid1c40199c7754da766e'])!=""){
	header("Location:src/home.php");
}

if(isset($_POST['btn-login'])){
	$usn=mysql_real_escape_string($_POST['usn']);
	$pd=mysql_real_escape_string($_POST['pd']);
	$res=mysql_query("select * from teams where team_name='$usn'");
	if($res!=""){
		$row=mysql_fetch_array($res);
	}
	if($row=="" || $res==""){
		$alert='<div id="notif" class="row"><div class="alert alert-danger"><div class="container-fluid"><div class="alert-icon"><i class="material-icons"></i></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg></span></button><center>Team Name not found!<center></div></div></div>';//'alert("Team Name do not found!");';
	} else {
		if($row['pass']==$pd){
			$_SESSION['userid1c40199c7754da766e'] = $row['team_id'];
			header("Location: src/home.php");
		} else {
			$alert = '<div id="notif" class="row" style="width:50%"><div class="alert alert-danger"><div class="container-fluid"><div class="alert-icon"><i class="material-icons"></i></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg></span></button><center>Login failed, Try again!</center></div></div></div>';//'alert("Login failed! Try again.");';
		}
	}
}

echo '<html>
	<head><title>Online Quiz</title>
	<style>
		#foot.container{
			position:absolute;
			bottom:0px;
			right:5px;
		}
		nav.navbar.navbar-transparent{background:rgba(255, 255, 255, 0.05);padding-top:0px;padding-bottom:0px;}
		#notif.row{margin-top:100px;}
		
	</style>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
	<link href="assets/css/demo.css" rel="stylesheet" />
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="assets/js/material-kit.js" type="text/javascript"></script>
	
	<!--link rel="stylesheet" type="text/css" href="style/index1.css"-->
	<link rel="icon" type="favicon" href="logos/ACICTS.png">
	<!--script type="text/javascript">'.$alert.'</script-->
	<style>.header.header-primary{background: linear-gradient(60deg, #03a9f4, #0787C1);}  a#a.btn.btn-primary{padding-bottom: 12px;text-transform: capitalize;padding-top: 8px;} a.btn.btn-primary,a#a.btn.btn-primary{margin:0;}  a.btn.btn-primary{padding:0;} .alert.alert-danger{background-color:#d61313;color:#ffffff;border-radius:10px;}</style>
	</head><body class="signup-page">
	<nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
        		<img class="navbar-brand" src="logos/AC&ACICTS_1.png" style="height:80px;"><a class="navbar-brand" href="http://www.pulz16.com" rel="tooltip" target="_blank" title="Pulz'.chr(39).'16 Official WebSite" data-placement="bottom"><img src="logos/pulz_1.png" style="height:60px;"/></a>
        	</div>
    	</div>
    </nav>

    <div class="wrapper">
		<div class="header header-filter" style="background-image: url('.chr(39).'back/bg2.jpeg'.chr(39).'); background-size: cover; background-position: top center;">
			<div class="container"><div class="row">'.$alert.'</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="post">
								<div class="header header-primary text-center">
									<h4 style="font-weight:bold;"><font size="+2">Sign Up</font></h4>
								</div>
								<div class="content">
										<div class="input-group">
										<span class="input-group-addon">
											<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M9 11.75c-.69 0-1.25.56-1.25 1.25s.56 1.25 1.25 1.25 1.25-.56 1.25-1.25-.56-1.25-1.25-1.25zm6 0c-.69 0-1.25.56-1.25 1.25s.56 1.25 1.25 1.25 1.25-.56 1.25-1.25-.56-1.25-1.25-1.25zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8 0-.29.02-.58.05-.86 2.36-1.05 4.23-2.98 5.21-5.37C11.07 8.33 14.05 10 17.42 10c.78 0 1.53-.09 2.25-.26.21.71.33 1.47.33 2.26 0 4.41-3.59 8-8 8z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg>
										</span>
										<div class="form-group label-floating">
											<label class="control-label">Team Name</label>
											<input type="text" name="usn" class="form-control">
										</div>
										<!--input type="text" class="form-control" name="usn" placeholder="Team Name"-->
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs>
        <path d="M0 0h24v24H0V0z" id="a"/>
    </defs>
    <clipPath id="b">
        <use overflow="visible" xlink:href="#a"/>
    </clipPath>
    <path clip-path="url(#b)" d="M12 17c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm6-9h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM8.9 6c0-1.71 1.39-3.1 3.1-3.1s3.1 1.39 3.1 3.1v2H8.9V6zM18 20H6V10h12v10z"/>
</svg>
										</span>
										<div class="form-group label-floating">
											<label class="control-label">Password</label>
											<input type="Password" name="pd" class="form-control">
										</div>
										<!--input type="password" placeholder="Password" name="pd" class="form-control" /-->
									</div>
									<div class="form-group">
										<button name="btn-login" class="btn btn-raised btn-primary" type="submit" style="width:100%;font-weight:bold;font-size:20px;padding-top:2px;padding-bottom:2px;">Sign In</button>
									</div>
								</div>
								<div class="footer text-center"  style="padding:10px;">
									<div class="row" >Not yet registered? <a id="a" class="btn btn-primary" href="src/signup.php?2kwIYsxj0keFlh5OJa3n8s1SctShix">Register Now !</a></div>
									<a id="a" class="btn btn-primary" data-toggle="modal" data-target="#contact" Contact Us \n '.chr(39).');">Forgotten my password</a><br>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>

			<footer class="footer">
				<div id="foot" class="container">
					<div class="copyright pull-right" id="ccr">
						&copy; 2016 <a href="http://www.acicts.org" rel="tooltip" data-placement="top" title="ACICTS Forum" target="_blank">ACICTS</a>
					</div>
				<div class="container">
		    </footer>

		</div>

    </div>
	<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog"><div class="modal-content"><div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Contact Us!</h4></div>
	<div class="modal-body">Nimna Perera &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp; 0710155336<br>Sadeepa Thilakarathna &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp; 07********</div></div></div>
	</div>

</body></html>';
	