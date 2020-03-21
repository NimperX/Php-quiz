<?php
session_start();
$p=NULL;$u=NULL;$error=NULL;
if(isset($_SESSION['user'])=='g&^%gf%^$$fgdY^&%rjf*&587ytg7856Tjyt*&GFuyr5yt65rTYRt877Y568'){
		header("Location: src/home.php");
}

if(isset($_POST['btn-login'])){
		$u=$_POST['u'];
		$p=$_POST['p'];
		if($u=='Acicts2k16' && $p=='platinumpulz'.chr(39).'16'){
			$_SESSION['user'] = 'g&^%gf%^$$fgdY^&%rjf*&587ytg7856Tjyt*&GFuyr5yt65rTYRt877Y568';
			header("Location: src/home.php");
		} else {
			$error = 'alert("Login failed! Try again.");';
		}
}

   echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Online Quiz | Admin | Login</title>
	<link rel="stylesheet" href="src/style.css" type="text/css">
	<link rel="icon" href="src/img/icon.png" type="favicon">
	<script>'.$error.'</script>
	</head>
	<body bgcolor="#333" oncontextmenu="return false">
	<center>
	<div id="login-form">
	<form method="post">
	<table width="30%" border="0">
	<tr><td><input type="text" name="u" placeholder="User Name" required /></td></tr>
	<tr><td><input type="password" name="p" placeholder="Password" required /></td></tr>
	<tr><td><button type="submit" name="btn-login">Sign in</button></td></tr>
	</table>
	</form>
	</div>
	</center>
	</body>
	</html>';
?>