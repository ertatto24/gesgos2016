<?php
session_start();
require '../sys/conexion.php';
$db = getConexion();

$nuevaTipoRiesgo = (string) $_POST['nuevaTipoRiesgo'];

$stmt = $db->prepare("INSERT INTO tipo_riesgo (nombre) VALUES (?)");
$stmt->bindParam(1, $nuevaTipoRiesgo);
$stmt->execute();
/*$comprobacion = $stmt->rowCount();

if ($comprobacion == 1) {

	header('Location: ../listar-proyectos.php');
	exit;

} else {

	header('Location: ../index.php');
	exit;		
}*/