<?php
session_start();
include_once('db.php');
$uid='';$comq='';$ca='';$wa='';$tb='';$tot='';$blnk='';$query='';$main='';$row='';$userrow='';$query='';$find='';
$com=NULL;$random=NULL;$qu=NULL;$an1=NULL;$an2=NULL;$an3=NULL;$an4=NULL;$blank=NULL;$correct=NULL;$wrong=NULL;
$bonus=NULL;$score=NULL;$qno=0;$query='';$query1='';$_SESSION['command']=NULL;$_SESSION['complete']=NULL;
$uid=$_SESSION['userid1c40199c7754da766e'];$pill=NULL;

if(!isset($_SESSION['userid1c40199c7754da766e'])){
	header("Location:index.php");
}
if(isset($_SESSION['complete'])==True){
	header("Location:online-quiz.php");
}

if(isset($_GET['2aee1c40199c7754da766e61452612cc'])){
	header('Refresh:20;url=check.php?GFfj43wekhi42hn9dbfhh');
	
	echo '<html>
		<head>
		<link rel="stylesheet" type="text/css" href="../style/ph2.css" />
		<link rel="stylesheet" type="text/css" href="../style/sponsor.css" />
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
		<style>ul.pagination.pagination-primary{margin:0;}*{marign:0;} .radio{margin:0;} #onq-head{margin-top:40px;}</style>
		<title>Online Quiz</title>
		</head>
		<body oncontextmenu="return false" style="padding:10px;">
		<div id="dv" style="background-color:#FFF; width:29%; float:right;"><img src="../dv/ad.gif" style="width:100%" /></div>
		<center><div id="t1" style=" position:absolute; bottom:0px;width:100%; background-color:#FFF;">
		<table style="width:100%">
		<tr align="center">
    	<td colspan="1">
        <b>Platinum Sponsor</b>
        </td>
        <td colspan="1">
        <b>Gold Sponsor</b>
        </td>
        <td colspan="1">
        <b>Silver Sponsor</b>
        </td>
        <td colspan="3">
        <b>Associate Sponsors</b>
        </td>    
    </tr>';
	echo "<tr align='center'>
        <td colspan='1' >
            <a class='link' href='http://www.w3schools.com' target='new'>
            
            <div id='us' class='img-raised'></div></a>
        </td>
        <td colspan='1'>
            <a class='link' href='http://www.w3schools.com' target='new'>
            
            <div id='vs' class='img-raised'></div></a>
        </td>
        <td colspan='1' >
            <a class='link' href='http://www.w3schools.com' target='new'>
            
            <div id='ws' class='img-raised'></div>
            </a>
        </td>
        <td colspan='1' >
            <a class='link' href='http://www.w3schools.com' target='new'>
            <div id='xs' class='img-raised'></div>
            </a>
        </td>
        <td colspan='1'>
            <a class='link' href='http://www.w3schools.com' target='new'>
            <div id='ys' class='img-raised'></div>
            </a>
        </td>
        <td colspan='1'>
            <a class='link' href='http://www.w3schools.com' target='new'>
            <div id='zs' class='img-raised'></div>
            </a>
        </td>
		</tr>
		</table>
		</div></center>";
		echo '<div id="onq-head">
		<div class="card card-nav-tabs" style="width:69%;margin-top:0;">
		<div class="header header-info" style="font-weight:bold;text-align:center;"><font size="+6">Online Quiz</font></div>
		<div class="content"><div class="tab-content text-center"><table style="width:100%;">';
	
	$update="y";//Successfully Completed!,Start Now
	$show=mysql_query("Select * from sqd where id='$uid'") or die(mysql_error());
	$show1=mysql_query("Select * from qhistory where id='$uid'") or die(mysql_error());
	while ($row=mysql_fetch_array($show)){
		$com=$row['complete'];
		$blank=$row['blank'];
		$correct=$row['correct'];
		$wrong=$row['wrong'];
		$bonus=$row['bonus'];
		$score=$row['score'];
	}
	
	if ($com==NULL){
		$_SESSION['q1']=NULL;$_SESSION['q2']=NULL;$_SESSION['q3']=NULL;$_SESSION['q4']=NULL;$_SESSION['q5']=NULL;$_SESSION['q6']=NULL;$_SESSION['q7']=NULL;$_SESSION['q8']=NULL;$_SESSION['q9']=NULL;$_SESSION['q10']=NULL;$_SESSION['q11']=NULL;$_SESSION['q12']=NULL;$_SESSION['q13']=NULL;$_SESSION['q14']=NULL;$_SESSION['q15']=NULL;$_SESSION['q16']=NULL;$_SESSION['q17']=NULL;$_SESSION['q18']=NULL;$_SESSION['q19']=NULL;$_SESSION['q20']=NULL;
		mysql_query("Update status set online='$update' where id='$uid'") or die (mysql_error());
		mysql_query("Update status set ph2='yn' where id='$uid'") or die(mysql_error());
		mysql_query("INSERT INTO sqd(id) VALUES('$uid')") or die(mysql_error());
		mysql_query("INSERT INTO qhistory(id) VALUES('$uid')") or die(mysql_error());
	}
	while (true){
		$res=mysql_query("Select * from questions");
		$random=mt_rand(1 , mysql_num_rows($res));
		if ($random!=$_SESSION['q1'] && $random!=$_SESSION['q2'] && $random!=$_SESSION['q3'] && $random!=$_SESSION['q4'] && $random!=$_SESSION['q5'] && $random!=$_SESSION['q6'] && $random!=$_SESSION['q7'] && $random!=$_SESSION['q8'] && $random!=$_SESSION['q9'] && $random!=$_SESSION['q10'] && $random!=$_SESSION['q11'] && $random!=$_SESSION['q12'] && $random!=$_SESSION['q13'] && $random!=$_SESSION['q14'] && $random!=$_SESSION['q15'] && $random!=$_SESSION['q16'] && $random!=$_SESSION['q17'] && $random!=$_SESSION['q18'] && $random!=$_SESSION['q19'] && $random!=$_SESSION['q20'] ){
			$show2=mysql_query("Select * from questions where qno='$random'") or die(mysql_error());
			while ($row2=mysql_fetch_array($show2)){
				$qu=$row2['q'];
				$an1=$row2['an1'];
				$an2=$row2['an2'];
				$an3=$row2['an3'];
				$an4=$row2['an4'];
				$_SESSION['qua']=$qu;
				$_SESSION['command']=$com;
			}
			break;	
		} else {
			continue;
		}
	}
	if ($com==NULL){
		$_SESSION['q1']=$random;$pill='<ul class="pagination pagination-primary"><li class="active"><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';
		$com=1;
	} else if ($com!=NULL){
		$com++;
		//echo $_SESSION['q1'].' '.$_SESSION['q2'].' '.$_SESSION['q3'].' '.$_SESSION['q4'].' '.$_SESSION['q5'].' '.$_SESSION['q6'].' '.$_SESSION['q7'].' '.$_SESSION['q8'].' '.$_SESSION['q9'].' '.$_SESSION['q10'];
		switch ($com){
			case 1:
			break;	
			case 2:$_SESSION['q2']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li class="active"><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';				
			break;
			case 3:$_SESSION['q3']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li class="active"><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';				
			break;
			case 4:$_SESSION['q4']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li class="active"><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';				
			break;
			case 5:$_SESSION['q5']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li class="active"><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';				
			break;
			case 6:$_SESSION['q6']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li class="active"><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';				
			break;
			case 7:$_SESSION['q7']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li class="active"><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';				
			break;
			case 8:$_SESSION['q8']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li class="active"><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 9:$_SESSION['q9']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li class="active"><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 10:$_SESSION['q10']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li class="active"><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 11:$_SESSION['q11']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li class="active"><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 12:$_SESSION['q12']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li class="active"><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 13:$_SESSION['q13']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li class="active"><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 14:$_SESSION['q14']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li class="active"><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 15:$_SESSION['q15']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li class="active"><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 16:$_SESSION['q16']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li class="active"><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 17:$_SESSION['q17']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li class="active"><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 18:$_SESSION['q18']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li class="active"><a>18</a></li> <li><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 19:$_SESSION['q19']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li class="active"><a>19</a></li> <li><a>20</a></li> </ul>';					
			break;
			case 20:$_SESSION['q20']=$random;$pill='<ul class="pagination pagination-primary"><li><a>1</a></li> <li><a>2</a></li> <li><a>3</a></li> <li><a>4</a></li> <li><a>5</a></li> <li><a>6</a></li> <li><a>7</a></li> <li><a>8</a></li> <li><a>9</a></li> <li><a>10</a></li> <li><a>11</a></li> <li><a>12</a></li> <li><a>13</a></li> <li><a>14</a></li> <li><a>15</a></li> <li><a>16</a></li> <li><a>17</a></li> <li><a>18</a></li> <li><a>19</a></li> <li class="active"><a>20</a></li> </ul>';					
			break;
		}
	}
	
	if ($com!=11){
			mysql_query("Update sqd set complete='$com' where id='$uid'") or die (mysql_error());
			
			echo '<tr>
			<td><br>Question No. : </td><td align="right"><br>Time Remaining:<lable align="right" id="demo">20</lable></td></tr>
			<tr><td colspan="2">'.$pill.'<td>
			</tr><tr>
   			<td colspan="2"><hr></td>
    		</tr>
			<tr>
			<td colspan="2">
			'.$qu.'			
			</td>
			</tr>
			<tr>
			<td colspan="2">
			<table>
			<form id="q" action="check.php?GFfj43wekhi42hh9dbfhh" method="post">
			<tr>
			<td><div class="radio"><label><input type="radio" name="ans" value="a">'.$an1.'</label></div></td>
			</tr>
			<tr>
			<td><div class="radio"><label><input type="radio" name="ans" value="b">'.$an2.'</label></div></td>
			</tr>
			<tr>
			<td><div class="radio"><label><input type="radio" name="ans" value="c">'.$an3.'</label></div></td>
			</tr>
			<tr>
			<td><div class="radio"><label><input type="radio" name="ans" value="d">'.$an4.'</label></div></td>
			</tr>
			<tr>
			<td></td></tr><tr>
			<td height="50px"><input type="submit" value="Submit" id="btn" name="ans-submit">
			<input type="hidden" name="qno" value="'.$random.'">
			<input type="hidden" id="time" name="time" value="">
			</td>
			</tr>
			</form>
			</table>
			</td>
			</tr>';
			
	} else {
		$_SESSION['complete']=True;
		header("location :online-quiz.php");
	}
	echo '</table></div></div></div></div></body><script>
		var d =20;
		var myVar = setInterval(myTimer, 1000);
		function myTimer() {
			d--;
			document.getElementById("time").value=d;
			if(d<=20){ document.getElementById("demo").innerHTML = d; }
			if(d<10){ document.getElementById("demo").innerHTML = "0"+d; }
			if(d==0){ /*document.getElementById("q").submit()*/; clearInterval(myVar); }
		}
		</script></html>';

} else {
	echo '<html>
		<head>
		<link rel="stylesheet" type="text/css" href="style/ph2.css" />
		<link rel="stylesheet" type="text/css" href="style/sponsor.css" />
		<link rel="icon" type="favicon" href="../logos/ACICTS.png">
		<title>Online Quiz</title>
		<script>alert("Error while Executing the Session.Go Back and try again!");</script>
		</head>
		<body oncontextmenu="return false"></body></html>';
}
?>