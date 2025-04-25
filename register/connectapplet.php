<?php
/**************
Ce fichier n'est utilise que pour les versions de hulis inferieues 2.2.2
**********/
require_once "util.php";

connectBDD();

$jvm_country=$_GET["jvm_country"];
$jvm_lang = $_GET["jvm_lang"];
$jvm_system  = $_GET["jvm_system"];
$allows = $_GET["allows"];
$reason = $_GET["reason"];
$id_site_user= $_GET["id_site_user"];

$res1=mysql_query("UPDATE `hulisusers` 

SET  jvm_country = '"._addslashes($jvm_country)."'
, jvm_lang = '"._addslashes($jvm_lang)."'
, jvm_system = '"._addslashes($jvm_system)."' 
, version = "._addslashes('< 2.2.2')."
, allows =".$allows."
, reason= ".$reason."
 WHERE id_hulis_user=".$id_site_user.";");


?>
