function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerFacturaCompra.php',
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
			url: '/ProyectoDB/Controller/ControllerFacturaCompra.php',
			data : {tipo : 'listarCc'},
			type : 'POST',
			success: function(res){
				if(res == 'No hay datos'){
					$('.selectUsuario').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectUsuario').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFacturaCompra.php',
			data : {tipo : 'listarProvedores'},
			type : 'POST',
			success: function(res){
				if(res == 'No hay datos'){
					$('.selectProvedor').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectProvedor').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})

	})
	
	$('#add-form').submit(function(e){
		e.preventDefault();
		var fechaFacturaCompra = $('input[name="fecha_factura"]').val();
		var idUsuario = $('#tipoC').val();
		var idProvedor = $('#tipoP').val();

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFacturaCompra.php',
			data : {tipo : 'agregar',fechaFacturaCompra:fechaFacturaCompra,idUsuario:idUsuario,idProvedor: idProvedor},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar la nueva factura');
				}else{
					 Materialize.toast('Factura creado exitosamente!', 2000) 
					 reload();
					 $('#modal1').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$('#edit-form').submit(function(e){
		e.preventDefault();
		var nuevaFecha = $('input[name="fecha_facturaEditar"]').val();
		var idUsuario = $('#tipoTE').val();
		var idProvedor = $('#tipoPE').val();

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFacturaCompra.php',
			data : {tipo : 'editar', idFacturaCompra: pk1 , nuevaFecha: nuevaFecha,idUsuario:idUsuario,idProvedor:idProvedor},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar la nuevo factura');
				}else{
					 Materialize.toast('Factura editada exitosamente!', 2000) 
					 reload();
					 $('#modal2').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$(document).on('click', '.borrar' ,function(){	
		var idFacturaCompra = $(this).closest('tr').find('#idFacturaCompra').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFacturaCompra.php',
			data : {tipo : 'eliminar',idFacturaCompra: idFacturaCompra},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					Materialize.toast('Error al eliminar la factura, Verifica que no este siendo usado!', 2000);
				}else{
					Materialize.toast('Factura eliminado exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#idFacturaCompra').html();
		    pk2 = $(this).closest('tr').find('#fecha').html();


			$('input[name="fecha_facturaEditar"]').val(pk2);


			$.ajax({
				url: '/ProyectoDB/Controller/ControllerFacturaCompra.php',
				data : {tipo : 'listarCcEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectUsuarioEditar').html(res);
			   		$('select').material_select();
				}
			})

			$.ajax({
				url: '/ProyectoDB/Controller/ControllerFacturaCompra.php',
				data : {tipo : 'listarProvedoresEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectProvedorEditar').html(res);
			   		$('select').material_select();
				}
			})
	});










});