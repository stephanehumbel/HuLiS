<?php
	require_once "../jsonwrapper/jsonwrapper.php";
	require_once "../geoLocalisation/GeoLocalisation.class.php";
	require_once "util.php";
	
	//echo ("debut" . date("H:i") ."<br>"  );
	//echo ("detectcountry" . date("H:i") ."<br>"  );

	$geolocalisation = new GeoLocalisation();
	//echo ("fin detectcountry" . date("H:i") ."<br>"  );

	$hulis_type_of_use ="";
	if (isset($_GET["hulis_type_of_use"]))
		$hulis_type_of_use = $_GET["hulis_type_of_use"];
	if (isset($_GET["hulisusage"])) // ancienne version
		$hulis_type_of_use = $_GET["hulisusage"];
	
	$total_use =0;
	if (isset($_GET["total_use"]))
		$total_use = $_GET["total_use"];
		
	$jvm_localisation ="";
	if (isset($_GET["jvm_localisation"]))
		$jvm_localisation = $_GET["jvm_localisation"];
	
	if (isset($_GET["jvm_lang"])) // ancienne version
		$jvm_localisation.=  $_GET["jvm_lang"];
	if (isset($_GET["jvm_country"])) // ancienne version
		$jvm_localisation .= "_".$_GET["jvm_country"];
	
	$java_version="";
	if (isset($_GET["java_version"]))
		$java_version = $_GET["java_version"];
	if (isset($_GET["java"])) // ancienne version
		$java_version = $_GET["java"];
	
	$operating_system ="";
	if (isset($_GET["operating_system"]))
		$operating_system = $_GET["operating_system"];
	if (isset($_GET["jvm_system"])) // ancienne version
		$operating_system = $_GET["jvm_system"];
	
	$browser="";
	if (isset($_GET["browser"]))
		$browser = $_GET["browser"];
	
		
	$hulis_version="";
	if (isset($_GET["hulis_version"]))
		$hulis_version = $_GET["hulis_version"];
	if (isset($_GET["version"]))  // ancienne version
		$hulis_version = $_GET["version"];
	

	$ms_start=0;
	if (isset($_GET["ms_start"]))
		$ms_start = $_GET["ms_start"];
	if (isset($_GET["ms_demarrage"]))
		$ms_start = $_GET["ms_demarrage"];
	
	
	connectBDD();
	
	$sql="INSERT INTO `hulisusers` (probably_connected_from, ip2locationcity, ip2locationcountry,
	hostip,iptocountry,countrybydomain,
	hulis_type_of_use, total_use, jvm_localisation, java_version, operating_system, browser, hulis_version, ms_start) 
	VALUES ('"._addslashes($geolocalisation->paysProbable)."'
	, '"._addslashes($geolocalisation->methodIP2LocationCity)."'
	, '"._addslashes($geolocalisation->methodIP2LocationCountry)."'
	, '"._addslashes($geolocalisation->methodHostIP)."'
	, '"._addslashes($geolocalisation->methodIPtoCountry)."'
	, '"._addslashes($geolocalisation->methodCountryByDomain)."'
	, '".$hulis_type_of_use."'
	, '".$total_use."'
	, '".$jvm_localisation."'
	,'"._addslashes($java_version)."'
	,'"._addslashes($operating_system)."'
	,'"._addslashes($browser)."'
	,'"._addslashes($hulis_version)."'
	,'".$ms_start."'
	);";

	//echo ("insert sql" . date("H:i") ."<br>"  );

	$res1=mysql_query($sql);
	
	if (!$res1) {
    		die('Requ&ecirc;te invalide : ' . mysql_error(). "<br>".$sql);
	}
	
	//echo ("fin insert sql" . date("H:i") ."<br>"  );
	
	// TRICHE 
	if ($hulis_type_of_use != "5")
		print(mysql_insert_id());
	else {
		header('Content-Type: application/json');
		echo json_encode(array("id"=>mysql_insert_id()));
	}	
	
	//echo ("fin" . date("H:i") ."<br>"  );
						
?>