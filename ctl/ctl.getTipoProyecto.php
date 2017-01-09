<?php

require '../sys/conexion.php';
$db = getConexion();

$stmt = $db->prepare("SELECT id, nombre FROM proyecto");
$stmt->execute();
$proyecto = $stmt->fetchObject();

$mensaje = "";

foreach ($proyecto as $p) {
	$mensaje .= "<option value='".$p->id."'>".$p->nombre."</option>";
}

echo $mensaje;