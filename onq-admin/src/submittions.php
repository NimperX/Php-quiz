<?php
session_start();
include_once('codegen/db.php');
if(isset($_POST['update'])){
	$id=$_POST['school'];
	mysql_query("update status set other='y' where id='$id'") or die(mysql_error());
}

echo '<html>
		<head><title>ICT Symposium | Paper Submission</title>
		<link rel="stylesheet" href="style.css">
		<link rel="icon" href="img/icon.png" type="favicon">
		</head>
		<body bgcolor="#333">
		<center><form method="post">
		<select style="width:60%;margin-top:100px;" name="school">';
for($i=0;$i<mysql_num_rows(mysql_query("select * from teams"));$i++){
	$j=$i+1;
	$query=mysql_query("select * from teams where team_id='$j'");
	$row=mysql_fetch_array($query);
	$query1=mysql_query("select * from status where id='$j'");
	$row1=mysql_fetch_array($query1);
	if($row1['ph2']=='y' && $row1['other']!='y'){
		echo '<option value="'.$j.'">'.$row['team_name'].'</option>';
	}
}
echo $row['team_name'];
echo '</select>
		<button style="width:40%;margin-top:30px;"  type="submit" name="update">Update Database</button>
		</form>
		</center>
		</body>
		</html>';
?>