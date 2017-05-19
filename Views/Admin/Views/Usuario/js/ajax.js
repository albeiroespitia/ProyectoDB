function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerUsuario.php',
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
			url: '/ProyectoDB/Controller/ControllerUsuario.php',
			data : {tipo : 'listarCiudad'},
			type : 'POST',
			success: function(res){
		   		$('.selectCiudad').html(res);
		   		$('select').material_select();
			}
		})

	})
	
	$('#add-form').submit(function(e){
		e.preventDefault();
		var ccUsuario = $('input[name="cedulaUsuario"]').val();
		var nombreUsuario = $('input[name="nombreUsuario"]').val();
		var apellidoUsuario = $('input[name="apellidoUsuario"]').val();
		var sexoUsuario = $('input[name="sexoUsuario"]').val();
		var emailUsuario = $('input[name="emailUsuario"]').val();
		var edadUsuario = $('input[name="edadUsuario"]').val();
		var usernameUsuario = $('input[name="usernameUsuario"]').val();
		var passwordUsuario = $('input[name="passwordUsuario"]').val();
		var ciudadUsuario = $("#tipoC").val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerUsuario.php',
			data : {tipo : 'agregar',ccUsuario: ccUsuario, nombreUsuario: nombreUsuario, apellidoUsuario: apellidoUsuario, sexoUsuario: sexoUsuario, emailUsuario: emailUsuario, edadUsuario: edadUsuario, usernameUsuario: usernameUsuario, passwordUsuario: passwordUsuario,ciudadUsuario:ciudadUsuario},
			type : 'POST',
			success: function(res){
				console.log(res);
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el nuevo usuario');
				}else{
					 Materialize.toast('Usuario creado exitosamente!', 2000) 
					 reload();
						$('#modal1').modal('close');
						$('.error-create').html('');
						$('input[name="cedulaUsuario"]').val(' ');
				   		$('input[name="nombreUsuario"]').val(' ');
						$('input[name="apellidoUsuario"]').val(' ');
						$('input[name="sexoUsuario"]').val(' ');
						$('input[name="emailUsuario"]').val(' ');
						$('input[name="edadUsuario"]').val(' ');
						$('input[name="usernameUsuario"]').val(' ');
						$('input[name="passwordUsuario"]').val(' ');
				}

			}
		})
	})

	$('#edit-form').submit(function(e){
		e.preventDefault();
		var nuevoNombreUsuario = $('input[name="nuevoNombreUsuario"]').val();
		var nuevoApellidoUsuario = $('input[name="nuevoApellidoUsuario"]').val();
		var nuevoSexoUsuario = $('input[name="nuevoSexoUsuario"]').val();
		var nuevoEmailUsuario = $('input[name="nuevoEmailUsuario"]').val();
		var nuevaEdadUsuario = $('input[name="nuevaEdadUsuario"]').val();
		var nuevoUsernameUsuario = $('input[name="nuevoUsernameUsuario"]').val();
		var nuevoPasswordUsuario = $('input[name="nuevoPasswordUsuario"]').val();
		var nuevaCiudadUsuario = $("#tipoCE").val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerUsuario.php',
			data : {tipo : 'editar', idUsuario: pk1 , nuevoNombreUsuario: nuevoNombreUsuario,nuevoApellidoUsuario: nuevoApellidoUsuario,nuevoSexoUsuario: nuevoSexoUsuario,nuevoEmailUsuario: nuevoEmailUsuario,nuevaEdadUsuario: nuevaEdadUsuario,nuevoUsernameUsuario: nuevoUsernameUsuario,nuevoPasswordUsuario: nuevoPasswordUsuario,nuevaCiudadUsuario: nuevaCiudadUsuario},
			type : 'POST',
			success: function(res){
				console.log(res);
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el nuevo usuario');
				}else{
					 Materialize.toast('Usuario editado exitosamente!', 2000) 
					 reload();
					 $('#modal2').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$(document).on('click', '.borrar' ,function(){	
		var idUsuario = $(this).closest('tr').find('#cc').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerUsuario.php',
			data : {tipo : 'eliminar',idUsuario: idUsuario},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					Materialize.toast('Error al eliminar el usuario, Verifica que no este siendo usado!', 2000);
				}else{
					Materialize.toast('Usuario eliminado exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#cc').html();
		    pk2 = $(this).closest('tr').find('#nombre').html();
		    pk3 = $(this).closest('tr').find('#apellido').html();
		    pk4 = $(this).closest('tr').find('#sexo').html();
		    pk5 = $(this).closest('tr').find('#email').html();
		    pk6 = $(this).closest('tr').find('#edad').html();
		    pk7 = $(this).closest('tr').find('#userName').html();
		    pk8 = $(this).closest('tr').find('#password').html();
		    pk9 = $(this).closest('tr').find('#ciudad').html();

			$('input[name="nuevoNombreUsuario"]').val(pk2);
			$('input[name="nuevoApellidoUsuario"]').val(pk3);
			$('input[name="nuevoSexoUsuario"]').val(pk4);
			$('input[name="nuevoEmailUsuario"]').val(pk5);
			$('input[name="nuevaEdadUsuario"]').val(pk6);
			$('input[name="nuevoUsernameUsuario"]').val(pk7);
			$('input[name="nuevoPasswordUsuario"]').val(pk8);

			$.ajax({
				url: '/ProyectoDB/Controller/ControllerUsuario.php',
				data : {tipo : 'listarCiudadEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectCiudadEditar').html(res);
			   		$('select').material_select();
				}
			})
	});










});