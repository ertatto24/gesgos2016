<?php
session_start();
require '../sys/conexion.php';
$db = getConexion();

$nombreRiesgo = (string) $_POST['nombreRiesgo'];
$categoriaRiesgo = (int) $_POST['categoriaRiesgo'];
$tipoRiesgo = (int) $_POST['tipoRiesgo'];
$impactoRiesgo = (int) $_POST['impactoRiesgo'];
$probabilidad = (int) $_POST['probabilidad'];
$descripcionRiesgo = (string) $_POST['descripcionRiesgo'];
$factores = (string) $_POST['factores'];
$reduccion = (string) $_POST['reduccion'];
$supervision = (string) $_POST['supervision'];

$stmt = $db->prepare("INSERT INTO `riesgo`(`nombre`, `probabilidad`, `descripcion`, `factores`, `reduccion`, `supervision`, `categoria`, `tipo`, `impacto`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $nombreRiesgo);
$stmt->bindParam(2, $probabilidad);
$stmt->bindParam(3, $descripcionRiesgo);
$stmt->bindParam(4, $factores);
$stmt->bindParam(5, $reduccion);
$stmt->bindParam(6, $supervision);
$stmt->bindParam(7, $categoriaRiesgo);
$stmt->bindParam(8, $tipoRiesgo);
$stmt->bindParam(9, $impactoRiesgo);
$stmt->execute();
$ultimo = $db->lastInsertId();

$id = (int) $_POST['id']; var_dump($ultimo);echo $ultimo;

$stmt = $db->prepare("INSERT INTO `proyecto_riesgo`(`proyecto`, `riesgo`, `posicion`) VALUES (?, ?, 0)");
$stmt->bindParam(1, $id);
$stmt->bindParam(2, $ultimo);
$stmt->execute();