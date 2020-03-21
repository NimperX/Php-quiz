<?php
	session_start();
	include_once('db.php');
	$show=NULL;$row=NULL;$com=NULL;$blank=NULL;$correct=NULL;$wrong=NULL;$bonus=NULL;$score=NULL;$qno=NULL;$query=NULL;$uans=NULL;$show2=NULL;$row2=NULL;$bonus=NULL;$uid=NULL;$no=NULL;$qua=NULL;
	$No=NULL;$complt=NULL;
	$uid=$_SESSION['userid1c40199c7754da766e'];
	
	if(!isset($_SESSION['userid1c40199c7754da766e'])){
		header("Location:index.php");
	}
	
	function getNo($complt){
		switch ($complt){
			case 1:$No = $_SESSION['q1'];
			;break;
			case 2:$No = $_SESSION['q2'];				
			break;
			case 3:$No = $_SESSION['q3'];				
			break;
			case 4:$No = $_SESSION['q4'];				
			break;
			case 5:$No = $_SESSION['q5'];				
			break;
			case 6:$No = $_SESSION['q6'];				
			break;
			case 7:$No = $_SESSION['q7'];				
			break;
			case 8:$No = $_SESSION['q8'];			
			break;
			case 9:$No = $_SESSION['q9'];				
			break;
			case 10:$No = $_SESSION['q10'];					
			break;
			case 11:$No = $_SESSION['q11'];					
			break;
			case 12:$No = $_SESSION['q12'];					
			break;
			case 13:$No = $_SESSION['q13'];					
			break;
			case 14:$No = $_SESSION['q14'];					
			break;
			case 15:$No = $_SESSION['q15'];					
			break;
			case 16:$No = $_SESSION['q16'];					
			break;
			case 17:$No = $_SESSION['q17'];					
			break;
			case 18:$No = $_SESSION['q18'];					
			break;
			case 19:$No = $_SESSION['q19'];					
			break;
			case 20:$No = $_SESSION['q20'];					
			break;
		}
		return $No;
	}
		
	if ($com==11){
		header('location:online-quiz.php');	
	}
		
	if(isset($_GET['GFfj43wekhi42hn9dbfhh'])){  //if auto redirected
		$uans='none';
		$show=mysql_query("Select * from sqd where id='$uid'") or die(mysql_error());
		while ($row=mysql_fetch_array($show)){
			$com=$row['complete'];
			$blank=$row['blank'];
		}
		$no=getNo($com);
		switch($com){
			case 1:$query="Update qhistory set q1='$no' where id='$uid'";$query1="Update qhistory set a1='$uans' where id='$uid'";
			break;
			case 2:$query="Update qhistory set q2='$no' where id='$uid'";$query1="Update qhistory set a2='$uans' where id='$uid'";
			break;
			case 3:$query="Update qhistory set q3='$no' where id='$uid'";$query1="Update qhistory set a3='$uans' where id='$uid'";
			break;
			case 4:$query="Update qhistory set q4='$no' where id='$uid'";$query1="Update qhistory set a4='$uans' where id='$uid'";
			break;
			case 5:$query="Update qhistory set q5='$no' where id='$uid'";$query1="Update qhistory set a5='$uans' where id='$uid'";
			break;
			case 6:$query="Update qhistory set q6='$no' where id='$uid'";$query1="Update qhistory set a6='$uans' where id='$uid'";
			break;
			case 7:$query="Update qhistory set q7='$no' where id='$uid'";$query1="Update qhistory set a7='$uans' where id='$uid'";
			break;
			case 8:$query="Update qhistory set q8='$no' where id='$uid'";$query1="Update qhistory set a8='$uans' where id='$uid'";
			break;
			case 9:$query="Update qhistory set q9='$no' where id='$uid'";$query1="Update qhistory set a9='$uans' where id='$uid'";
			break;
			case 10:$query="Update qhistory set q10='$no' where id='$uid'";$query1="Update qhistory set a10='$uans' where id='$uid'";
			break;
			case 11:$query="Update qhistory set q11='$no' where id='$uid'";$query1="Update qhistory set a11='$uans' where id='$uid'";
			break;
			case 12:$query="Update qhistory set q12='$no' where id='$uid'";$query1="Update qhistory set a12='$uans' where id='$uid'";
			break;
			case 13:$query="Update qhistory set q13='$no' where id='$uid'";$query1="Update qhistory set a13='$uans' where id='$uid'";
			break;
			case 14:$query="Update qhistory set q14='$no' where id='$uid'";$query1="Update qhistory set a14='$uans' where id='$uid'";
			break;
			case 15:$query="Update qhistory set q15='$no' where id='$uid'";$query1="Update qhistory set a15='$uans' where id='$uid'";
			break;
			case 16:$query="Update qhistory set q16='$no' where id='$uid'";$query1="Update qhistory set a16='$uans' where id='$uid'";
			break;
			case 17:$query="Update qhistory set q17='$no' where id='$uid'";$query1="Update qhistory set a17='$uans' where id='$uid'";
			break;
			case 18:$query="Update qhistory set q18='$no' where id='$uid'";$query1="Update qhistory set a18='$uans' where id='$uid'";
			break;
			case 19:$query="Update qhistory set q19='$no' where id='$uid'";$query1="Update qhistory set a19='$uans' where id='$uid'";
			break;
			case 20:$query="Update qhistory set q20='$no' where id='$uid'";$query1="Update qhistory set a20='$uans' where id='$uid'";
			break;
		}
		
		$blank++;
		mysql_query("Update sqd set blank='$blank' where id='$uid'") or die (mysql_error());
		mysql_query($query) or die(mysql_error());
		mysql_query($query1) or die(mysql_error());
		if ($com==10){
			header('location:online-quiz.php');	
		} else {
			header("Location:onq.php?2aee1c40199c7754da766e61452612cc");
		}
		
	} elseif(isset($_GET['GFfj43wekhi42hh9dbfhh'])){	//if submitted the form
		
		$show=mysql_query("Select * from sqd where id='$uid'") or die(mysql_error());
		while ($row=mysql_fetch_array($show)){
			$com=$row['complete'];
			$blank=$row['blank'];
			$correct=$row['correct'];
			$wrong=$row['wrong'];
			$bonus=$row['bonus'];
			$score=$row['score'];
		}
		$qno=$_POST['qno'];
		$uans=$_POST['ans'];
				
		$show2=mysql_query("Select * from questions where qno='$qno'") or die(mysql_error());
		if (!isset($_POST['ans'])){
			$blank++;
			$uans='none';
			mysql_query("Update sqd set blank='$blank' where id='$uid'") or die (mysql_error());
		} else {
			while ($row2=mysql_fetch_array($show2)){
				$qa=$row2['cran'];
				if ($_POST['ans']==$qa){
					$correct++;
					$bonus=$bonus+$_POST['time'];
					$score=$score+25+$_POST['time'];
					mysql_query("Update sqd set correct='$correct' where id='$uid'") or die (mysql_error());
					mysql_query("Update sqd set bonus='$bonus' where id='$uid'") or die (mysql_error());
					mysql_query("Update sqd set score='$score' where id='$uid'") or die (mysql_error());
				} else {
					$wrong++;
					mysql_query("Update sqd set wrong='$wrong' where id='$uid'") or die (mysql_error());
				}
				if ($com==10){
					mysql_query("Update status set score='$score' where id='$uid'") or die(mysql_error());
					header('location:online-quiz.php');	
				}
			}
		}
		switch($com){
			case 1:$query="Update qhistory set q1='$qno' where id='$uid'";$query1="Update qhistory set a1='$uans' where id='$uid'";
			break;
			case 2:$query="Update qhistory set q2='$qno' where id='$uid'";$query1="Update qhistory set a2='$uans' where id='$uid'";
			break;
			case 3:$query="Update qhistory set q3='$qno' where id='$uid'";$query1="Update qhistory set a3='$uans' where id='$uid'";
			break;
			case 4:$query="Update qhistory set q4='$qno' where id='$uid'";$query1="Update qhistory set a4='$uans' where id='$uid'";
			break;
			case 5:$query="Update qhistory set q5='$qno' where id='$uid'";$query1="Update qhistory set a5='$uans' where id='$uid'";
			break;
			case 6:$query="Update qhistory set q6='$qno' where id='$uid'";$query1="Update qhistory set a6='$uans' where id='$uid'";
			break;
			case 7:$query="Update qhistory set q7='$qno' where id='$uid'";$query1="Update qhistory set a7='$uans' where id='$uid'";
			break;
			case 8:$query="Update qhistory set q8='$qno' where id='$uid'";$query1="Update qhistory set a8='$uans' where id='$uid'";
			break;
			case 9:$query="Update qhistory set q9='$qno' where id='$uid'";$query1="Update qhistory set a9='$uans' where id='$uid'";
			break;
			case 10:$query="Update qhistory set q10='$qno' where id='$uid'";$query1="Update qhistory set a10='$uans' where id='$uid'";
			break;
			case 11:$query="Update qhistory set q11='$qno' where id='$uid'";$query1="Update qhistory set a11='$uans' where id='$uid'";
			break;
			case 12:$query="Update qhistory set q12='$qno' where id='$uid'";$query1="Update qhistory set a12='$uans' where id='$uid'";
			break;
			case 13:$query="Update qhistory set q13='$qno' where id='$uid'";$query1="Update qhistory set a13='$uans' where id='$uid'";
			break;
			case 14:$query="Update qhistory set q14='$qno' where id='$uid'";$query1="Update qhistory set a14='$uans' where id='$uid'";
			break;
			case 15:$query="Update qhistory set q15='$qno' where id='$uid'";$query1="Update qhistory set a15='$uans' where id='$uid'";
			break;
			case 16:$query="Update qhistory set q16='$qno' where id='$uid'";$query1="Update qhistory set a16='$uans' where id='$uid'";
			break;
			case 17:$query="Update qhistory set q17='$qno' where id='$uid'";$query1="Update qhistory set a17='$uans' where id='$uid'";
			break;
			case 18:$query="Update qhistory set q18='$qno' where id='$uid'";$query1="Update qhistory set a18='$uans' where id='$uid'";
			break;
			case 19:$query="Update qhistory set q19='$qno' where id='$uid'";$query1="Update qhistory set a19='$uans' where id='$uid'";
			break;
			case 20:$query="Update qhistory set q20='$qno' where id='$uid'";$query1="Update qhistory set a20='$uans' where id='$uid'";
			break;
		}
		
		mysql_query($query) or die(mysql_error());
		mysql_query($query1) or die(mysql_error());
		if ($com==10){
			header('location:online-quiz.php');	
		} else {
			header("Location:onq.php?2aee1c40199c7754da766e61452612cc");
		}
		
	} else {
		header("Location:onq.php?2aee1c40199c7754da766e61452612cc");
	}
?>