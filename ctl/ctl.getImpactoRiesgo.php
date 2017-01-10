<?php

require '../sys/conexion.php';
$db = getConexion();

$stmt = $db->prepare("SELECT id, nombre FROM impacto_riesgo");
$stmt->execute();
$impacto = $stmt->fetchAll();

$mensaje = "";

foreach ($impacto as $i) {
	$mensaje .= "<option value='".$i['id']."'>".$i['nombre']."</option>";
}

echo $mensaje;