/*=============================================
EDITAR TRANSPORTE            
=============================================*/

$(".btnEditarTransporte").click(function(){


	var idTransporte = $(this).attr("idTransporte");

	//console.log(idTransporte);

	var datos = new FormData();
	datos.append("idTransporte", idTransporte);

	$.ajax({

		url: "ajax/transportes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){


			$("#editarTransporte").val(respuesta["nombre"]);
			$("#idTransporte").val(respuesta["id_transporte"]);

		}
	})
})


/*=============================================
ELIMINAR TRANSPORTE            
=============================================*/

$(document).on("click", ".btnEliminarTransporte", function(){


	var idTransporte = $(this).attr("idTransporte");

	swal({
		title: 'Está seguro de borrar el medio de transporte?',
		text: "Si no lo está puede cancelar la acción",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar medio de transporte'
		}).then((result)=>{

			if (result.value) {

				window.location = "index.php?ruta=transportes&idTransporte="+idTransporte;
			}
		})
})


/*=============================================
ACTIVAR TRANSPORTE            
=============================================*/

$(document).on("click", ".btnActivarTransporte", function(){

	var idTransporte = $(this).attr("idTransporte");
	var estadoTransporte = $(this).attr("estadoTransporte");
	var tabla = $(this).attr("tabla");

	//console.log(tabla);

	var datos = new FormData();
	datos.append("activarId", idTransporte);
	datos.append("activarTransporte", estadoTransporte);
	datos.append("tabla", tabla);

	$.ajax({

		url: "ajax/transportes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			if (window.matchMedia("(max-width:767px)").matches) {

				swal({
					title: "El transporte ha sido actualizado",
					type: "success",
					confirmButtonText: "Cerrar"
				}).then(function(result){

					if (result.value) {

						window.location = "transportes";
					}
				});
			}
		}
	})

	if (estadoTransporte == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoTransporte', 1);

	}else{

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoTransporte', 0);
	}
})

