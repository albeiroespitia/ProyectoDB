function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerProducto.php',
		data : {tipo : 'listar'},
		type : 'POST',
		success: function(res){
			$('.cuerpoTabla').html(res);
		}
	})
}

$.holdReady(true);
reload();
$.holdReady(false);

$(document).ready(function() {

	$('.agregarButton').click(function(){
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProducto.php',
			data : {tipo : 'listarCc'},
			type : 'POST',
			success: function(res){
				if(res == 'No hay datos'){
					$('.selectCiudad').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectCiudad').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})

	})
	
	$('#add-form').submit(function(e){
		e.preventDefault();
		var nombreProducto = $('input[name="nombreProducto"]').val();
		var descripcionProducto = $('input[name="descripcionProducto"]').val();
		var cantidadProducto = $('input[name="cantidadProducto"]').val();
		var usuarioCc = $('#tipoC').val();

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProducto.php',
			data : {tipo : 'agregar',nombreProducto: nombreProducto,descripcionProducto: descripcionProducto,cantidadProducto: cantidadProducto,usuarioCc: usuarioCc},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el nuevo producto');
				}else{
					 Materialize.toast('Producto creado exitosamente!', 2000) 
					 reload();
					 $('#modal1').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$('#edit-form').submit(function(e){
		e.preventDefault();
		var nuevoNombreCiudad = $('input[name="nuevoNombreCiudad"]').val();
		console.log(nuevoNombreCiudad);
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerCiudad.php',
			data : {tipo : 'editar', idCiudad: pk1 , nombreCiudad: nuevoNombreCiudad},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar la nueva ciudad');
				}else{
					 Materialize.toast('Ciudad editada exitosamente!', 2000) 
					 reload();
					 $('#modal2').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$(document).on('click', '.borrar' ,function(){	
		var idCiudad = $(this).closest('tr').find('#idCiudad').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerCiudad.php',
			data : {tipo : 'eliminar',idCiudad: idCiudad},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					Materialize.toast('Error al eliminar la ciudad, Verifica que no este siendo usada!', 2000);
				}else{
					Materialize.toast('Ciudad eliminada exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#idCiudad').html();
		    pk2 = $(this).closest('tr').find('#nombre').html();

			$('input[name="nuevoNombreCiudad"]').val(pk2);

			$.ajax({
				url: '/ProyectoDB/Controller/ControllerProyecto.php',
				data : {tipo : 'listarCcEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectCiudadEditar').html(res);
			   		$('select').material_select();
				}
			})
	});










});