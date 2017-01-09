<?php

define('BD_SERVIDOR', 'localhost');
define('BD_NOMBRE', 'gesgos2016');
define('BD_USUARIO', 'root');
define('BD_PASSWORD', '');

function getConexion() {
	try {

		$connection = new PDO('mysql:host=' . BD_SERVIDOR . ';dbname=' . BD_NOMBRE . ';charset=utf8', BD_USUARIO, BD_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
	return $connection;
}