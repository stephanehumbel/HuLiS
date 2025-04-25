<?php	
	require_once "util.php";

	$sLastCommand ="";
	if (isset($_GET["lastCommand"]))
		$sLastCommand = ", last_command = '".$_GET["lastCommand"]."'";

	connectBDD();
	$res=mysql_query("UPDATE `hulisusers` SET duration = TIMEDIFF(CURRENT_TIMESTAMP, date_applet) ".$sLastCommand." WHERE id_hulis_user = ". $_GET["id_site_user"]." AND error IS NULL;");
?>