<?php

require_once '../mdl/mdl.proyecto.php';

function getContratos () {

	$resultado = getContratosMDL();
  $contratos = json_decode($resultado, true);
  $peticion = "";

  foreach ($contratos as $contrato) {
      $peticion .= "<option value=" . $contrato['id_contrato'] . ">" . $contrato['nombre'] . "</option>";
  }

  echo $peticion;
}