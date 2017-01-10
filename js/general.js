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

$('#probabilidad').change(function(){
	var prob = $('#probabilidad').val();
	$('#valueProb').html(prob+"%");
});

