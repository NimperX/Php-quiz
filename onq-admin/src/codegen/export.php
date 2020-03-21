<?php
$sql = "Select * from codes";
$connect = @mysql_connect("localhost","root","") or die("Failed to connect to Mysql:<br>".mysql_error()."<br>".mysql_errno());
$db = @mysql_select_db("school",$connect) or die("Failed to connect database:<br>".mysql_error()."<br>".mysql_errno());
$result = @mysql_query($sql,$connect) or die("Failed to connect table:<br>".mysql_error()."<br>".mysql_errno());

header("Content-Type:application/xls");
header("Content-Disposition: attachment; filename=school.xls");
header("Pragma: no-cache");
header("Expires: 0");

$sep = "\t";

for($i=0;$i<mysql_num_fields($result); $i++){
	echo mysql_field_name($result, $i)."\t";
}
print("\n");

while($row=mysql_fetch_row($result)){
	$insert="";
	for($j=0;$j<mysql_num_fields($result); $j++){
		if(!isset($row[$j])){
			$insert .="NULL".$sep;
		} elseif($row[$j]!="") {
			$insert .= "$row[$j]".$sep;
		} else {
			$insert .= "".$sep;
		}
	}
	$insert = str_replace($sep."$","",$insert);
	$insert = preg_replace("/\r\n|\n\r|\n|\r/"," ",$insert);
	$insert .= "\t";
	print(trim($insert));
	print "\n";
}

?>