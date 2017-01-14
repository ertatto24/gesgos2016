<?php
session_start();
require '../sys/conexion.php';
$db = getConexion();

$nombreProyecto = (string) $_POST['nombreProyecto'];
$tipoProyecto = (int) $_POST['tipoProyecto'];
$descripcion = (string) $_POST['descripcion'];
$fechaInicio = (string) $_POST['fechaInicio'];
$fechaFin = (string) $_POST['fechaFin'];
$fecha = date("Y-m-d H:i:s");

$stmt = $db->prepare("INSERT INTO proyecto (nombre,descripcion,fecha_inicio,fecha_final,tipo,usuario,alta) VALUES (?,?,?,?,?,?,?)");
$stmt->bindParam(1, $nombreProyecto);
$stmt->bindParam(2, $descripcion);
$stmt->bindParam(3, $fechaInicio);
$stmt->bindParam(4, $fechaFin);
$stmt->bindParam(5, $tipoProyecto);
$stmt->bindParam(6, $_SESSION['usuario']);
$stmt->bindParam(7, $fecha);
$stmt->execute();
$comprobacion = $stmt->rowCount();

/*if ($comprobacion == 1) {

	//header('Location: ../listar-proyectos.php');
	exit;

} else {

	//header('Location: ../index.php');
	exit;		
}*/