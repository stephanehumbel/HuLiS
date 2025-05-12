<?php
/*
 * remplit le formulaire de contact de hulis
 * attentino les mails doublons ne sont pas autorisés
 *
 */
require_once "../jsonwrapper/jsonwrapper.php";
require_once "util.php";

$errors= array();

$prenom="";
$nom="";
$email ="";
$fonction ="";
$institution="";
$accepteContact="";

if (isset($_POST["prenom"]) && !empty($_POST["prenom"]))
	$prenom = $_POST["prenom"];
else
	$errors["prenom"] = "Veuillez renseigner votre prénom";

if (isset($_POST["nom"])  && !empty($_POST["nom"]))
	$nom = $_POST["nom"];
else
	$errors["nom"] = "Veuillez renseigner votre nom";

if (isset($_POST["email"])  && !empty($_POST["email"]))
	$email = $_POST["email"];
else
	$errors["email"] = "Veuillez renseigner votre mail";

if (isset($_POST["fonction"])  && !empty($_POST["fonction"]))
	$fonction = $_POST["fonction"];
else
	$errors["fonction"] = "Veuillez renseigner votre fonction";

if (isset($_POST["institution"])  && !empty($_POST["institution"]))
	$institution = $_POST["institution"];
else
	$errors["institution"] = "Veuillez renseigner votre institution";

if (isset($_POST["accepteContact"])  && !empty($_POST["accepteContact"]))
	$accepteContact = $_POST["accepteContact"];
else
	$errors["accepteContact"] = "Veuillez indiquer si vous souhaitez être contacter";


if (empty($errors) ) {
	connectBDD();

	
	$sql="INSERT INTO `contact` (prenom, nom, email,
		fonction,institution,accepteContact)
		VALUES ('"._addslashes($prenom)."'
		, '"._addslashes($nom)."'
		, '"._addslashes($email)."'
		, '"._addslashes($fonction)."'
		, '"._addslashes($institution)."'
		, '"._addslashes($accepteContact)."');";
	
	$res1=mysql_query($sql);
	
	/*
	 * !!! si requete invalide renvoie un succes car on prend l'hypothese qu'a ce niveau il n'y a pas d'erreur possible
	 * et que la requete invalide serait un doublon de mail
	 */
	if (!$res1) 
		echo json_encode(array("success"=> true, "errors"=>array("sql"=>"requête invalide " . mysql_error ()) ));
	else 
		echo json_encode(array("success"=> true));
		
}
else
	echo json_encode(array("success"=> false, "errors"=>$errors));




?>