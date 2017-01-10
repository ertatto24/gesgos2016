<?php

require '../sys/conexion.php';
$db = getConexion();

$stmt = $db->prepare("SELECT id, nombre FROM categoria_riesgo");
$stmt->execute();
$categoria = $stmt->fetchAll();

$mensaje = "";

foreach ($categoria as $c) {
	$mensaje .= "<option value='".$c['id']."'>".$c['nombre']."</option>";
}

echo $mensaje;