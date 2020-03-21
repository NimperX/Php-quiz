<?php
if(!mysql_connect("localhost","root",""))
{
	die('Connection Error--->'.mysql_error());
}
if(!mysql_select_db("quiz"))
{
	die('connection Error--->'.mysql_error());
}
?>