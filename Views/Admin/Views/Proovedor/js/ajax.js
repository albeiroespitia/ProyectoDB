function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerProvedor.php',
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
			url: '/ProyectoDB/Controller/ControllerProvedor.php',
			data : {tipo : 'listarCiudad'},
			type : 'POST',
			success: function(res){
				console.log(res);
		   		$('.selectCiudad').html(res);
		   		$('select').material_select();
			}
		})

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProvedor.php',
			data : {tipo : 'listarTipoProducto'},
			type : 'POST',
			success: function(res){
				console.log(res);
		   		$('.selectTipoProducto').html(res);
		   		$('select').material_select();
			}
		})

	})
	
	$('#add-form').submit(function(e){
		e.preventDefault();
		var nombreProvedor = $('input[name="nombreProvedor"]').val();
		var emailProvedor = $('input[name="emailProvedor"]').val();
		var telefonoProvedor = $('input[name="telefonoProvedor"]').val();
		var ciudadProvedor = $('#tipoC').val();
		var tipoProducto = $('#tipoT').val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProvedor.php',
			data : {tipo : 'agregar',nombreProvedor: nombreProvedor,emailProvedor:emailProvedor, telefonoProvedor:telefonoProvedor,ciudadProvedor:ciudadProvedor, tipoProducto:tipoProducto},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el nuevo Provedor');
				}else{
					 Materialize.toast('Provedor ingresado exitosamente!', 2000) 
					 reload();
					 $('#modal1').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$('#edit-form').submit(function(e){
		e.preventDefault();
		var nuevonombreProvedor = $('input[name="nuevoNombreProvedor"]').val();
		var nuevoemailProvedor = $('input[name="nuevoemailProvedor"]').val();
		var nuevotelefonoProvedor = $('input[name="nuevotelefonoProvedor"]').val();
		var nuevociudadProvedor = $('#tipoCE').val();
		var nuevotipoProducto = $('#tipoTE').val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProvedor.php',
			data : {tipo : 'editar', idProovedor:pk1,nuevonombreProvedor: nuevonombreProvedor,nuevoemailProvedor:nuevoemailProvedor,nuevotelefonoProvedor:nuevotelefonoProvedor,nuevociudadProvedor:nuevociudadProvedor, nuevotipoProducto:nuevotipoProducto},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el nuevo Provedor');
				}else{
					 Materialize.toast('Proovedor editado exitosamente!', 2000) 
					 reload();
					 $('#modal2').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$(document).on('click', '.borrar' ,function(){	
		var idProovedor = $(this).closest('tr').find('#idProovedor').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProvedor.php',
			data : {tipo : 'eliminar',idProovedor: idProovedor},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					Materialize.toast('Error al eliminar el proovedor, Verifica que no este siendo usada!', 2000);
				}else{
					Materialize.toast('Provedor eliminado exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#idProovedor').html();
		    pk2 = $(this).closest('tr').find('#nombre').html();
		    pk3 = $(this).closest('tr').find('#email').html();
		    pk4 = $(this).closest('tr').find('#telefono').html();
		    pk5 = $(this).closest('tr').find('#ciudad').html();
		    pk6 = $(this).closest('tr').find('#TipoProducto').html();

			$('input[name="nuevoNombreProvedor"]').val(pk2);
			$('input[name="nuevoemailProvedor"]').val(pk3);
			$('input[name="nuevotelefonoProvedor"]').val(pk4);
			$('input[name="nuevociudadProvedor"]').val(pk5);
			$('input[name="nuevoTipoProductoProvedor"]').val(pk6);
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerProvedor.php',
				data : {tipo : 'listarCiudadEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectCiudadEditar').html(res);
			   		$('select').material_select();
				}
			})

			$.ajax({
				url: '/ProyectoDB/Controller/ControllerProvedor.php',
				data : {tipo : 'listarTipoProductoEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectTipoProductoEditar').html(res);
			   		$('select').material_select();
				}
			})
	});

});