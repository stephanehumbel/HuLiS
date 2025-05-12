<?php
require_once 'util.php';
header('Content-Type: text/html; charset=utf-8');

if (!isset($_GET["key"]) || $_GET["key"]!="ctomism2hulis") 
	die("paramètres incorrects");

connectBDD();

$sql="SELECT id, prenom, nom, email,
		fonction,institution,accepteContact, dateTelechargement FROM contact";

$res1=mysql_query($sql);

header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"contacts_". date("Y-m-d H-i-s") . ".xls\"");
if ($res1) {
	echo "id\tprénom\tnom\temail\tfonction\tinstitution\taccepte contact\tdate telechargement\n";
	while($row = mysql_fetch_array($res1)) {
		echo $row["id"] ."\t" .$row["prenom"]."\t" .$row["nom"]."\t" .$row["email"]."\t" .
		$row["fonction"]."\t" .$row["institution"]."\t" .$row["accepteContact"]
		."\t" .$row["dateTelechargement"]."\n";
	}

}
else {
	echo mysql_error();
}
?>