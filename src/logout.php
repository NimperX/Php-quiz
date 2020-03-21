<?php
session_start();

if(!isset($_SESSION['userid1c40199c7754da766e'])){
	header("Location: index.php");
} else if(isset($_SESSION['userid1c40199c7754da766e'])!=""){
	header("Location: home.php");
}

if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['userid1c40199c7754da766e']);
	header("Location: index.php");
}
?>