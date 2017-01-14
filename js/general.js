//init
getCategoriaRiesgo();
getTipoRiesgo();
getImpactoRiesgo();

function getCategoriaRiesgo() {
	$.ajax ({
		url: "ctl/ctl.getCategoriaRiesgo.php",
		type: "html",
		success: function (data) { 
			$('#categoriaRiesgo').html(data);
		},
		error: function (data) {
			//div error
		},
		timeout: 300000
	});
}

function getTipoRiesgo() {
	$.ajax ({
		url: "ctl/ctl.getTipoRiesgo.php",
		type: "html",
		success: function (data) { 
			$('#tipoRiesgo').html(data);
		},
		error: function (data) {
			//div error
		},
		timeout: 300000
	});
}

function getImpactoRiesgo() {
	$.ajax ({
		url: "ctl/ctl.getImpactoRiesgo.php",
		type: "html",
		success: function (data) { 
			$('#impactoRiesgo').html(data);
		},
		error: function (data) {
			//div error
		},
		timeout: 300000
	});
}

$('#categoriaRiesgo-js').click(function(){
	
	var nuevaCategoriaRiesgo = $('#nuevaCategoriaRiesgo').val();
	var datos = "nuevaCategoriaRiesgo="+nuevaCategoriaRiesgo;

	if (nuevaCategoriaRiesgo == "" || nuevaCategoriaRiesgo.lenght == 0) {
		$('#errorNCR').show();
	} else {
		$('#errorNCR').hide();
		$.ajax ({
			url: "ctl/ctl.postCategoriaRiesgo.php",
			data: datos,
			type: "POST",
			success: function (data) { 
				getCategoriaRiesgo();
				$('#nuevaCategoriaRiesgo').val("");
				$('#nuevoCategoriaRiesgo').modal('hide');
			},
			error: function (data) {
				//div error
			},
			timeout: 300000
		});
	}
});

$('#tipoRiesgo-js').click(function(){
	
	var nuevaTipoRiesgo = $('#nuevaTipoRiesgo').val();
	var datos = "nuevaTipoRiesgo="+nuevaTipoRiesgo;

	if (nuevaTipoRiesgo == "" || nuevaTipoRiesgo.lenght == 0) {
		$('#errorNTR').show();
	} else {
		$('#errorNTR').hide();
		$.ajax ({
			url: "ctl/ctl.postTipoRiesgo.php",
			data: datos,
			type: "POST",
			success: function (data) { 
				getTipoRiesgo();
				$('#nuevaTipoRiesgo').val("");
				$('#nuevoTipoRiesgo').modal('hide');
			},
			error: function (data) {
				//div error
			},
			timeout: 300000
		});
	}
});

$('#impactoRiesgo-js').click(function(){
	
	var nuevaImpactoRiesgo = $('#nuevaImpactoRiesgo').val();
	var datos = "nuevaImpactoRiesgo="+nuevaImpactoRiesgo;

	if (nuevaImpactoRiesgo == "" || nuevaImpactoRiesgo.lenght == 0) {
		$('#errorNIR').show();
	} else {
		$('#errorNIR').hide();
		$.ajax ({
			url: "ctl/ctl.postImpactoRiesgo.php",
			data: datos,
			type: "POST",
			success: function (data) { 
				getImpactoRiesgo();
				$('#nuevaImpactoRiesgo').val("");
				$('#nuevoImpactoRiesgo').modal('hide');
			},
			error: function (data) {
				//div error
			},
			timeout: 300000
		});
	}
});

var prob = $('#probabilidad').val();
$('#valueProb').html(prob+"%");
$('#probabilidad').change(function(){
	var prob = $('#probabilidad').val();
	$('#valueProb').html(prob+"%");
});

$('#enviarCrearRiesgo').submit(function(e){
	e.preventDefault();

	var nombreRiesgo = $('#nombreRiesgo').val();
	var categoriaRiesgo = $('#categoriaRiesgo').val();
	var tipoRiesgo = $('#tipoRiesgo').val();
	var impactoRiesgo = $('#impactoRiesgo').val();
	var probabilidad = $('#probabilidad').val();
	var descripcionRiesgo = $('#descripcionRiesgo').val();
	var factores = $('#factores').val();
	var reduccion = $('#reduccion').val();
	var supervision = $('#supervision').val();
	var datos = $('#enviarCrearRiesgo').serialize();

	if (nombreRiesgo == "" || categoriaRiesgo == "" || tipoRiesgo == "" || impactoRiesgo == "" || probabilidad == "" || descripcionRiesgo == "" || factores == "" || reduccion == "" || supervision == "") {
		$('#errorNRiesgo').show();
		$('#errorNRiesgo').focus();
	} else {
		$('#errorNRiesgo').hide();
		$.ajax ({
			url: "ctl/ctl.postRiesgoProyecto.php",
			data: datos,
			type: "POST",
			success: function (data) { 
				$('.qcierra').hide();
				$('.qabre').show();
			},
			error: function (data) {
				$('#errorNRiesgo').show();
			},
			timeout: 300000
		});
	}
});

$('#dd').click(function(e){
	e.preventDefault();

	var nombreProyecto = $('#nombreProyecto').val();
	var tipoProyecto = $('#tipoProyecto').val();
	var descripcion = $('#descripcion').val();
	var fechaInicio = $('#fechaInicio').val();
	var fechaFin = $('#fechaFin').val();
	var datos = $('#formNuevoProyecto').serialize();

	if (nombreProyecto == "" || tipoProyecto == "" || descripcion == "" || fechaInicio == "" || fechaFin == "") {
		$('#errorNProyecto').show();
		$('#errorNProyecto').focus();
	} else {
		$('#errorNProyecto').hide();
		$.ajax ({
			url: "ctl/ctl.postCrearProyecto.php",
			data: datos,
			type: "POST",
			success: function (data) { 
				window.location.href = "listar-proyectos.php";
			},
			error: function (data) {
				$('#errorNProyecto').show();
			},
			timeout: 300000
		});
	}
});

$('[data-toggle="tooltip"]').tooltip();

$("#sortable2").sortable();
$('#lineaCorte').click(function(){
	var datos = $("#sortable2").sortable("toArray");

//var kaka = jQuery.makeArray(datos);

	var pepe = "{";

	$.each(datos, function( index, value ) {
		pepe += '"'+index+'":"'+value+'",';
	});

	pepe += "}";

	var ji = pepe.substr(-2);
	var tt = pepe.replace(ji,'}');

	console.log(tt);

	$.ajax ({
		url: "ctl/ctl.postAsignarLinea.php",
		data: tt,
		type: "POST",
		success: function (data) { console.log(data);
			//window.location.href = "listar-proyectos.php";
		},
		error: function (data) {
			//$('#errorNProyecto').show();
		},
		timeout: 300000
	});

	//console.log(pepe);
	$("#sortable2").sortable({ disabled: true });
});