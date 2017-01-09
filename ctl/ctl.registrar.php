<?php
session_start();

require '../sys/conexion.php';
$db = getConexion();

$usuario = (string) $_POST['usuario'];
$email = (string) $_POST['email'];
$clave = md5($_POST['clave']);

$stmt = $db->prepare("INSERT INTO usuario (usuario,password,email) VALUES (?,?,?)");
$stmt->bindParam(1, $usuario, PDO::PARAM_STR);
$stmt->bindParam(2, $clave, PDO::PARAM_STR);
$stmt->bindParam(3, $email, PDO::PARAM_STR);
$stmt->execute();
//$id = $stmt->lastInsertId();
$id=1;
$comprobacion = $stmt->rowCount();


if ($comprobacion == 1) {

	$_SESSION = array();
	session_destroy();
	session_start();
	$_SESSION['session'] = session_id();
	$_SESSION['nombre'] = $usuario;
	$_SESSION['usuario'] = $id;

	header('Location: ../index.php');
	exit;

} else {

	header('Location: ../index.php');
	exit;		
}