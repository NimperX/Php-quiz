<?php
session_start();
include_once('codegen/db.php');
if(isset($_SESSION['user'])!='g&^%gf%^$$fgdY^&%rjf*&587ytg7856Tjyt*&GFuyr5yt65rTYRt877Y568'){
	header("Location : index.php");
}

if(isset($_POST['close_sess'])){
	for($i=0;$i<mysql_num_rows(mysql_query("select * from status"));$i++){
		$j=$i+1;
		$query=mysql_query("select * from status where id='$j'");
		$res=mysql_fetch_array($query);
		if($res['online']=='n'){
			mysql_query("Update status set online='yn' where id='$j'") or die(mysql_error());
		}
	}
}

if(isset($_POST['open_sess'])){
	for($i=0;$i<mysql_num_rows(mysql_query("select * from status"));$i++){
		$j=$i+1;
		$query=mysql_query("select * from status where id='$j'");
		$res=mysql_fetch_array($query);
		if($res['online']=='yn'){
			mysql_query("Update status set online='n' where id='$j'") or die(mysql_error());
		}
	}
}

echo '<html>
		<head>
		<title>Online Quiz | Admin Panel</title>
		<link rel="stylesheet" href="style.css">
		<link rel="icon" href="img/icon.png" type="favicon">
		<style>
			a{text-decoration:none;color:#eee;}
			*{padding:0;margin:0;font-family:verdana;}
		</style>
		</head>
		<body bgcolor="#333" >
		<div id="header" style=margin-bottom:30px;background:#fff;color:#333;width:100%;height:70px;"><div id="left" style="font-size:50px;left:10px">Online Quiz | Admin Panel</div></div>
		<center><form method="post">
		<button type="submit" name="open_sess">Open Session</button><br><br>
		<button type="submit" name="close_sess">Close Session</button><br><br>
		</form>
		<a href="submittions.php"><button>ICT Symposium Paper Submittions</button></a><br><br>
		<a href="codegen"><button>Random Code Generator</button></a><br><br>
		<a href="new/Q&A.php"><button>Add Questions and Answers</button></a>
		<br><br><br><br><br>
		<a href="logout.php?logout">Logout</a>
		</center>
		</body>';
?>
