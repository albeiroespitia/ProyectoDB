function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerCliente.php',
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
			url: '/ProyectoDB/Controller/ControllerCliente.php',
			data : {tipo : 'listarCiudad'},
			type : 'POST',
			success: function(res){
				console.log(res);
		   		$('.selectCiudad').html(res);
		   		$('select').material_select();
			}
		})

	})
	
	$('#add-form').submit(function(e){
		e.preventDefault();
		var nombreCliente = $('input[name="nombreCliente"]').val();
		var telefonoCliente = $('input[name="telefonoCliente"]').val();
		var emailCliente = $('input[name="emailCliente"]').val();
		var ciudadCliente = $("#tipoC").val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerCliente.php',
			data : {tipo : 'agregar',nombreCliente: nombreCliente, telefonoCliente: telefonoCliente, emailCliente: emailCliente, ciudadCliente: ciudadCliente},
			type : 'POST',
			success: function(res){
				console.log(res);
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el nuevo cliente');
				}else{
					 Materialize.toast('Cliente creado exitosamente!', 2000) 
					 reload();
					 $('#modal1').modal('close');
					 $('.error-create').html('');
					 $('input[name="nombreCliente"]').val(' ');
				     $('input[name="telefonoCliente"]').val(' ');
					 $('input[name="emailCliente"]').val(' ');
				}

			}
		})
	})

	$('#edit-form').submit(function(e){
		e.preventDefault();
		var nuevoNombreCliente = $('input[name="nuevoNombre"]').val();
		var nuevoTelefonoCliente = $('input[name="nuevoTelefono"]').val();
		var nuevoEmailCliente = $('input[name="nuevoEmail"]').val();
		var nuevaCiudadCliente = $("#tipoCE").val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerCliente.php',
			data : {tipo : 'editar', idCliente: pk1 , nuevoNombreCliente: nuevoNombreCliente,nuevoTelefonoCliente: nuevoTelefonoCliente,nuevoEmailCliente: nuevoEmailCliente,nuevaCiudadCliente: nuevaCiudadCliente},
			type : 'POST',
			success: function(res){
				console.log(res);
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el nuevo cliente');
				}else{
					 Materialize.toast('Cliente editado exitosamente!', 2000) 
					 reload();
					 $('#modal2').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$(document).on('click', '.borrar' ,function(){	
		var idCliente = $(this).closest('tr').find('#idCliente').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerCliente.php',
			data : {tipo : 'eliminar',idCliente: idCliente},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					Materialize.toast('Error al eliminar el cliente, Verifica que no este siendo usado!', 2000);
				}else{
					Materialize.toast('Cliente eliminado exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#idCliente').html();
		    pk2 = $(this).closest('tr').find('#nombre').html();
		    pk3 = $(this).closest('tr').find('#telefono').html();
		    pk4 = $(this).closest('tr').find('#email').html();
		    pk5 = $(this).closest('tr').find('#ciudad').html();

			$('input[name="nuevoNombre"]').val(pk2);
			$('input[name="nuevoTelefono"]').val(pk3);
			$('input[name="nuevoEmail"]').val(pk4);

			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCliente.php',
				data : {tipo : 'listarCiudadEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectCiudadEditar').html(res);
			   		$('select').material_select();
				}
			})
	});










});