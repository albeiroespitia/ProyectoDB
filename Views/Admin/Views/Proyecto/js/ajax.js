function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerProyecto.php',
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
			url: '/ProyectoDB/Controller/ControllerProyecto.php',
			data : {tipo : 'listarCc'},
			type : 'POST',
			success: function(res){
		   		$('.selectCiudad').html(res);
		   		$('select').material_select();
			}
		})

	})
	
	$('#add-form').submit(function(e){
		e.preventDefault();
		var descripcionProyecto = $('input[name="descpcionProyecto"]').val();
		var empresaProyecto = $('input[name="empresaProyecto"]').val();
		var usuarioCc = $('#tipoC').val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProyecto.php',
			data : {tipo : 'agregar',descripcionProyecto: descripcionProyecto,empresaProyecto: empresaProyecto,usuarioCc: usuarioCc},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el nuevo proyecto');
				}else{
					 Materialize.toast('Proyecto creado exitosamente!', 2000) 
					 reload();
					 $('#modal1').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$('#edit-form').submit(function(e){
		e.preventDefault();
		var descpcionProyecto = $('input[name="nuevaDescripcion"]').val();
		var empresaProyecto = $('input[name="nuevoNombreEmpresa"]').val();
		var usuarioCc = $('#tipoTE').val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProyecto.php',
			data : {tipo : 'editar', idProyecto: pk1 , descripcionProyecto: descpcionProyecto,empresaProyecto: empresaProyecto,tipoTE: usuarioCc},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al editar el proyecto');
				}else{
					 Materialize.toast('Proyecto editado exitosamente!', 2000) 
					 reload();
					 $('#modal2').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$(document).on('click', '.borrar' ,function(){	
		var idProyecto = $(this).closest('tr').find('#idProyecto').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProyecto.php',
			data : {tipo : 'eliminar',idProyecto: idProyecto},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					Materialize.toast('Error al eliminar el proyecto, Verifica que no este siendo usada!', 2000);
				}else{
					Materialize.toast('Proyecto eliminada exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#idProyecto').html();
		    pk2 = $(this).closest('tr').find('#descripcion').html();
		    pk3 = $(this).closest('tr').find('#empresa').html();
		    pk4 = $(this).closest('tr').find('#cc').html();

			$('input[name="nuevaDescripcion"]').val(pk2);
			$('input[name="nuevoNombreEmpresa"]').val(pk3);
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