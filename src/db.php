<?php

$host='localhost';
$user='root';
$password='';
$db='quiz';

mysql_connect($host,$user,$password) or die(mysql_error());

mysql_select_db($db) or die(mysql_error());