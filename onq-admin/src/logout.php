<?php
session_start();

if(isset($_SESSION['user'])=='g&^%gf%^$$fgdY^&%rjf*&587ytg7856Tjyt*&GFuyr5yt65rTYRt877Y568'){
		header("Location: home.php");
} else if(isset($_SESSION['user'])!='g&^%gf%^$$fgdY^&%rjf*&587ytg7856Tjyt*&GFuyr5yt65rTYRt877Y568'){
	header("Location : index.php");
}

if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['user']);
	header("Location: ../");
}
?>