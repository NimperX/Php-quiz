<?php
session_start();
include_once 'db.php';
$alert='';
$msg='';
if(isset($_POST['update']))
{
	$code = mysql_real_escape_string($_POST['code']);
	$school = mysql_real_escape_string($_POST['school']);
	$claim = mysql_real_escape_string($_POST['claim']);

	if(mysql_query("INSERT INTO codes(schoolname,code,claimed_by) VALUES('$school','$code','$claim')")){
		$msg='Table Updated Successfully!';
		header("Location :index.php");
		
	}else{
		$alert='<script>alert("Invalid or duplicate key found! Table Update failed!");</script>';
		/*header("Location :index.php");*/
	}
} 	
	$characters='01234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randstr='';
	for($i = 0; $i < 10; $i++)
	{
		$randstr=$randstr.$characters[rand(0,strlen($characters)-1)];
	}

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
'.$alert.'
</head>
<body bgcolor="#000000"><center>
<form method="post"><font color="#ffffff">
<table>
<tr><td>Code</td><td><input type="text" name="code" value="'.$randstr.'" readonly required /></td></tr>
<tr><td>School Name</td><td><input type="text" name="school" value="" autofocus required /></td></tr>
<tr><td>Claimed By</td><td><input type="text" name="claim" value="" /></td></tr>
<tr><td><button type="submit" name="update">Update</button></td></tr></table></font>
<tr></tr>
<tr><td><font color="#00ff55">'.$msg.'</font></tr></td>
</form><a href="export.php">Export to Excel</a></center>
</body>
</html>'
?>