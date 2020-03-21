<?php
$q=NULL;$a1=NULL;$a2=NULL;$a3=NULL;$a4=NULL;$ca=NULL;$alert=NULL;
include_once('db.php');

if(isset($_POST['submit'])){
	$q=mysql_real_escape_string($_POST['quest']);
	$a1=mysql_real_escape_string($_POST['ans1']);
	$a2=mysql_real_escape_string($_POST['ans2']);
	$a3=mysql_real_escape_string($_POST['ans3']);
	$a4=mysql_real_escape_string($_POST['ans4']);
	$ca=mysql_real_escape_string($_POST['correct']);
	mysql_query("Insert into questions(q,an1,an2,an3,an4,cran) values('$q','$a1','$a2','$a3','$a4','$ca')");
	$alert='alert("Question added to table successfully");';
}

echo '<html><head><link rel="icon" href="../img/icon.png" type="favicon"><style>input{width:100%;margin:10px;height:35px;padding:10px;}button{width:100%;margin:20px 10px 0 10px;height:45px;padding:10px;background:#3F51B5;color:#fff;font-weight:bold;}</style>
	<title>Submit Questions and Answers</title><script>'.$alert.'</script></head>
	<body bgcolor="#333"><font color="white"><center><table style="width:70%"><form method="post">
	<tr><td><input type="text" name="quest" placeholder="Your Question" required /></td></tr>
	<tr><td><input type="text" name="ans1" placeholder="Answer 1" required /></td></tr>
	<tr><td><input type="text" name="ans2" placeholder="Answer 2" required /></td></tr>
	<tr><td><input type="text" name="ans3" placeholder="Answer 3" required /></td></tr>
	<tr><td><input type="text" name="ans4" placeholder="Answer 4" required /></td></tr>
	<tr><td><input type="text" name="correct" placeholder="Correct Answer" required /></td></tr>
	<tr><td><button name="submit" type="submit">SUBMIT QUESTION</button></td></tr>
	</form></table></center></font></body></html>';

?>