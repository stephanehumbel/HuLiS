<?php
require_once 'util.php';
connectBDD();
$res=mysql_query("SELECT minimal_major, minimal_minor, minimal_corr FROM `version` WHERE idversion = 1;");

if  ($res) {
	while ($row = mysql_fetch_row($res)) {
		if($row[0])
			echo($row[0]);
		else
			echo("0");

		echo("\n");
			
		if($row[1])
			echo($row[1]);
		else
			echo("0");
		echo("\n");
		
		if($row[2])
			echo($row[2]);
		else
			echo("0");
		break;
	}
}
else {
	echo("0");
	echo("\n");
	echo("0");
	echo("\n");
	echo("0");
}
	

mysql_free_result($res);
		
?>
