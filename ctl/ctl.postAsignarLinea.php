<?php
session_start();
require '../sys/conexion.php';
$db = getConexion();


$lol = $_POST;

//echo $lele = htmlspecialchars_decode($_POST);

//echo $pp = json_encode($lele);

foreach ($lol as $key => $value) {

	if ($key == '0') {
		$stmt1 = $db->prepare("INSERT INTO proyecto_riesgo (pocision,riesgo) VALUES (?,?)");
		$stmt1->bindParam(1, $key);
		$stmt1->bindParam(2, $value);
		$stmt1->execute();
	}

	$stmt = $db->prepare("UPDATE proyecto_riesgo SET posicion = ? WHERE riesgo = ?");
	$stmt->bindParam(1, $key);
	$stmt->bindParam(2, $value);
	$stmt->execute();
}
//echo $lele;