<?php
session_start();
require '../sys/conexion.php';
$db = getConexion();

$nuevaCategoriaRiesgo = (string) $_POST['nuevaCategoriaRiesgo'];

$stmt = $db->prepare("INSERT INTO categoria_riesgo (nombre) VALUES (?)");
$stmt->bindParam(1, $nuevaCategoriaRiesgo);
$stmt->execute();
/*$comprobacion = $stmt->rowCount();

if ($comprobacion == 1) {

	header('Location: ../listar-proyectos.php');
	exit;

} else {

	header('Location: ../index.php');
	exit;		
}*/