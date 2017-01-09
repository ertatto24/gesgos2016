<?php

include_once '../sys/conexion.php';

function getContratosMDL () {

	$db = getConnection();

	$stmt = $db->prepare("SELECT id_contrato, nombre FROM contrato ORDER BY id_contrato ASC");
	$stmt->execute();
	$listarContratos = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$db = null;

	$resultado = json_encode($listarContratos);
	return $resultado;
}