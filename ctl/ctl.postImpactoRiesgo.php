<?php
session_start();
require '../sys/conexion.php';
$db = getConexion();

$nuevaImpactoRiesgo = (string) $_POST['nuevaImpactoRiesgo'];

$stmt = $db->prepare("INSERT INTO impacto_riesgo (nombre) VALUES (?)");
$stmt->bindParam(1, $nuevaImpactoRiesgo);
$stmt->execute();
/*$comprobacion = $stmt->rowCount();

if ($comprobacion == 1) {

	header('Location: ../listar-proyectos.php');
	exit;

} else {

	header('Location: ../index.php');
	exit;		
}*/