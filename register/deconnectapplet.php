<?php
	require_once "util.php";

	$error =0;
	if (isset($_GET["error"]))
		$error = $_GET["error"];

	connectBDD();
	$res=mysql_query("UPDATE `hulisusers` SET duration = TIMEDIFF(CURRENT_TIMESTAMP, date_applet), error=$error WHERE id_hulis_user = ". $_GET["id_site_user"]." AND error IS NULL;");

?>