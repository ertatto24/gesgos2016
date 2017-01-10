<?php

require '../sys/conexion.php';
$db = getConexion();

$stmt = $db->prepare("SELECT id, nombre FROM tipo_riesgo");
$stmt->execute();
$tipo = $stmt->fetchAll();

$mensaje = "";

foreach ($tipo as $t) {
	$mensaje .= "<option value='".$t['id']."'>".$t['nombre']."</option>";
}

echo $mensaje;