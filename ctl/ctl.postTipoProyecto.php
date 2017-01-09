<?php

require '../sys/conexion.php';
$db = getConexion();

$tipo = (string) $_POST['tipoProyecto'];

$stmt = $db->prepare("INSERT INTO tipo_proyecto (nombre) VALUES (?)");
$stmt->bindParam(1, $tipo, PDO::PARAM_STR);
$stmt->execute();
$comprobacion = $stmt->rowCount();

if ($comprobacion == 1) {

	header('Location: ../crear-proyecto.php');
	exit;

} else {

	header('Location: ../index.php');
	exit;		
}