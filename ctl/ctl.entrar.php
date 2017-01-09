<?php
session_start();

require '../sys/conexion.php';
$db = getConexion();

$usuario = (string) $_POST['usuario'];
$clave = md5($_POST['clave']);

$stmt = $db->prepare("SELECT id, usuario FROM usuario WHERE usuario = ? AND password = ? LIMIT 1");
$stmt->bindParam(1, $usuario, PDO::PARAM_STR);
$stmt->bindParam(2, $clave, PDO::PARAM_STR);
$stmt->execute();
$usuario = $stmt->fetchObject();
$comprobacion = $stmt->rowCount();

if ($comprobacion == 1) {

	$_SESSION = array();
	session_destroy();
	session_start();
	$_SESSION['session'] = session_id();
	$_SESSION['nombre'] = $usuario->usuario;
	$_SESSION['usuario'] = $usuario->id;

	header('Location: ../index.php');
	exit;

} else {

	header('Location: ../index.php');
	exit;		
}