<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Sign Up Here</title>
		<!--link rel="stylesheet" type="text/css" href="../style/style.css"-->
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
		</head><body style="background:#eeeeee;"><center>
		

<?php
session_start();
include_once('db.php');
$school=NULL;$alert=NULL;$query=NULL;$res=NULL;$name=NULL;$tel=NULL;$name1=NULL;$name2=NULL;$name3=NULL;$name4=NULL;
$dob1=NULL;$dob2=NULL;$dob3=NULL;$dob4=NULL;$address1=NULL;$address2=NULL;$address3=NULL;$address4=NULL;$telno1=NULL;
$telno2=NULL;$telno3=NULL;$telno4=NULL;$email1=NULL;$email2=NULL;$email3=NULL;$email4=NULL;
$school=$_SESSION['school'];$_SESSION['teamid']=NULL;

if(isset($_GET['2kw1Ysxj0keFlh5OJa3n8s1SctShix'])){
	if($school==""){header("location:signup.php?2kwIYsxj0keFlh5OJa3n8s1SctShix");}
	$query=mysql_query("Select * from mic where school='$school'");
	if($query!=""){
		$res=mysql_fetch_array($query);
	}
	if($res['name']=="" || $query==""){
		if(isset($_POST['tic-check'])){
			$name=$_POST['in-charge'];
			$tel=$_POST['telno'];
			
			if(strlen($tel)==12){
				mysql_query("Insert into mic(school,name,telno) values('$school','$name','$tel')") or die(mysql_error());
				header("location:MIC.php?2kw1Ysxj0keFlh5OJa3n8sISctShix");
			}else{
				$alert='alert("Invalid Contact Number, Please try again!");';
			}
		}
		
		echo '<div id="login-form"><form method="post" name="form" onSubmit="return check()">
		<div class="card card-nav-tabs" style="width:50%">
		<div class="header header-info" style="font-weight:bold;">Master-In-Charge Info</div>
		<div class="content"><div class="tab-content text-center"><div class="form-group"><div class="form-group"><input type="text" style="width:100%" class="form-control" name="school" value="'.$school.'"required readonly /></div>
		<div class="form-group"><input type="text" style="width:100%" class="form-control" name="in-charge" placeholder="Name Of Teacher In-charge" required autofocus="true" autocomplete="off" /></div>
		<div class="form-group"><input type="text" style="width:100%" class="form-control" maxlength="12" onfocus="this.value='.chr(39).'+94'.chr(39).';this.setAttribute('.chr(39).'onfocus'.chr(39).','.chr(39).chr(39).');this.blur();this.focus();" name="telno" placeholder="Contact Number" required autocomplete="off" /></div>
		<div class="form-group"><button style="width:100%" class="btn btn-raised btn-primary" type="submit" name="tic-check">Submit</button></div>
		</form></div></div></div></div></div></body><script>function check(){ var input = document.forms["form"]["telno"].value; var no = /^\(+?([0-9]{12})$/; if(input.value.match(no)){ return true } else { alert("Not a valid Contact Number.");return false;} }</script><script>'.$alert.'</script></html>';
	}else{
		header("location:MIC.php?2kw1Ysxj0keFlh5OJa3n8sISctShix");
	}
	
} elseif(isset($_GET['2kw1Ysxj0keFlh5OJa3n8sISctShix'])){
	if($school==""){header("location:signup.php?2kwIYsxj0keFlh5OJa3n8s1SctShix");}
	if(isset($_SESSION['codecheck'])==true){
		if(isset($_POST['btn-reg'])){
			$name1=$_POST['name1'];$name2=$_POST['name2'];$name3=$_POST['name3'];$name4=$_POST['name4'];
			$dob1=$_POST['dob1'];$dob2=$_POST['dob2'];$dob3=$_POST['dob3'];$dob4=$_POST['dob4'];
			$address1=$_POST['address1'];$address2=$_POST['address2'];$address3=$_POST['address3'];$address4=$_POST['address4'];
			$telno1=$_POST['telno1'];$telno2=$_POST['telno2'];$telno3=$_POST['telno3'];$telno4=$_POST['telno4'];
			$email1=$_POST['email1'];$email2=$_POST['email2'];$email3=$_POST['email3'];$email4=$_POST['email4'];
			
			if(strlen($telno1)==12 && strlen($telno2)==12 && strlen($telno3)==12 && strlen($telno4)==12){
				
				mysql_query("Insert into teams(school,team_name,leader,address1,telno1,mem2,address2,telno2,mem3,address3,telno3,mem4,address4,telno4) values('$school','".time()."','$name1','$address1','$telno1','$name2','$address2','$telno2','$name3','$address3','$telno3','$name4','$address4','$telno4')") or die(mysql_error());
				
				mysql_query("Insert into users(name,dob,school,address,telno,email) values('$name1','$dob1','$school','$address1','$telno1','$email1')") or die(mysql_error());
				mysql_query("Insert into users(name,dob,school,address,telno,email) values('$name2','$dob2','$school','$address2','$telno2','$email2')") or die(mysql_error());
				mysql_query("Insert into users(name,dob,school,address,telno,email) values('$name3','$dob3','$school','$address3','$telno3','$email3')") or die(mysql_error());
				mysql_query("Insert into users(name,dob,school,address,telno,email) values('$name4','$dob4','$school','$address4','$telno4','$email4')") or die(mysql_error());
				
				$res=mysql_query("Select * from teams where leader='$name1'");
				$row=mysql_fetch_array($res);
				$_SESSION['teamid']=$row['team_id'];
				echo $_SESSION['teamid'];
				
				header("location:teams.php?2kw1Ysxj0keF1h5OJa3n8sISctShix");
			}else{
				$alert='alert("Not a valid contact number!");';
			}
		}
		
		echo '
		<div id="login-form" style="margin-top:0px;margin-bottom:20px;"><form name="form" method="post" onSubmit="return validateForm()">
		<div class="card card-nav-tabs" style="width:95%;padding:10px;">
		<div class="header header-info" style="font-weight:bold;">Team Members'.chr(39).' Info</div>
		<table style="width:100%">
		<tr><td colspan="5" align="left" style="padding-bottom:0px;"><h4 class="text-primary" style="margin:10px 0 0 0;">Team Leader/Member 1</h4></td></tr>
		<tr><td><div class="form-group"><input type="text" class="form-control" name="name1" placeholder="Name" required autofocus="true" autocomplete="off" /></div></td><td><div class="form-group"><input type="text" class="datepicker form-control" name="dob1" placeholder="Date of Birth" required autocomplete="off"  /></div></td><td><div class="form-group"><input type="text" class="form-control" name="address1" placeholder="Address" required autocomplete="off" /></div></td><td><div class="form-group"><input type="text" class="form-control" name="telno1" onfocus="this.value='.chr(39).'+94'.chr(39).';this.setAttribute('.chr(39).'onfocus'.chr(39).','.chr(39).chr(39).');this.blur();this.focus();" maxlength="12" placeholder="Contact Number" required autocomplete="off" /></div></td><td><div class="form-group"><input type="email" class="form-control" name="email1" placeholder="Email Address" required autocomplete="off" /></div></td></tr>
		<tr><td colspan="5" align="left" style="padding-bottom:0px;"><h4 class="text-primary" style="margin:10px 0 0 0;">Member 2</h4></td></tr>
		<tr><td><div class="form-group"><input type="text" class="form-control" name="name2" placeholder="Name" required autocomplete="off" /></div></td><td><div class="form-group"><input type="text" class="datepicker form-control" name="dob2" placeholder="Date of Birth" required autocomplete="off"  /></div></td><td><div class="form-group"><input type="text" class="form-control" name="address2" placeholder="Address" required autocomplete="off" /></div></td><td><div class="form-group"><input type="text" name="telno2" class="form-control" onfocus="this.value='.chr(39).'+94'.chr(39).';this.setAttribute('.chr(39).'onfocus'.chr(39).','.chr(39).chr(39).');this.blur();this.focus();" maxlength="12" placeholder="Contact Number" required autocomplete="off" /></div></td><td><div class="form-group"><input type="email" class="form-control" name="email2" placeholder="Email Address" required autocomplete="off" /></div></td></tr>
		<tr><td colspan="5" align="left" style="padding-bottom:0px;"><h4 class="text-primary" style="margin:10px 0 0 0;">Member 3</h4></td></tr>
		<tr><td><div class="form-group"><input type="text" class="form-control" name="name3" placeholder="Name" required autocomplete="off" /></div></td><td><div class="form-group"><input type="text" class="datepicker form-control" name="dob3" placeholder="Date of Birth" required autocomplete="off"  /></div></td><td><div class="form-group"><input type="text" class="form-control" name="address3" placeholder="Address" required autocomplete="off" /></div></td><td><div class="form-group"><input type="text" name="telno3" class="form-control" onfocus="this.value='.chr(39).'+94'.chr(39).';this.setAttribute('.chr(39).'onfocus'.chr(39).','.chr(39).chr(39).');this.blur();this.focus();" maxlength="12" placeholder="Contact Number" required autocomplete="off" /></div></td><td><div class="form-group"><input type="email" class="form-control" name="email3" placeholder="Email Address" required autocomplete="off" /></div></td></tr>
		<tr><td colspan="5" align="left" style="padding-bottom:0px;"><h4 class="text-primary" style="margin:10px 0 0 0;">Member 4</h4></td></tr>
		<tr><td><div class="form-group"><input type="text" class="form-control" name="name4" placeholder="Name" required autocomplete="off" /></div></td><td><div class="form-group"><input type="text" class="datepicker form-control" name="dob4" placeholder="Date of Birth" required autocomplete="off"  /></div></td><td><div class="form-group"><input type="text" class="form-control" name="address4" placeholder="Address" required autocomplete="off" /></div></td><td><div class="form-group"><input type="text" name="telno4" class="form-control" onfocus="this.value='.chr(39).'+94'.chr(39).';this.setAttribute('.chr(39).'onfocus'.chr(39).','.chr(39).chr(39).');this.blur();this.focus();" maxlength="12" placeholder="Contact Number" required autocomplete="off" /></div></td><td><div class="form-group"><input type="email" class="form-control" name="email4" placeholder="Email Address" required autocomplete="off" /></div></td></tr>
		<tr><td colspan="5"><div class="form-group"><button class="btn btn-raised btn-primary" style="width:100%" type="submit" name="btn-reg">Enroll the Team Members</button></div></td></tr>
		</table></form></div></div></center><style>.form-group{margin:0;}td{padding:10px;}</style>
		</body><script>'.$alert.'</script></html>';
	}else{
		header("location:signup.php?2kwIYsxj0keFlh5OJa3n8s1SctShix");
	}
	
} else {
	echo '<script>alert("Error of GET code (0x0008600), Try again!");</script>';
	header("refresh:0;url=../index.php");
}

?>