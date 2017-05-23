function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerFactura.php',
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
			url: '/ProyectoDB/Controller/ControllerFactura.php',
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
			url: '/ProyectoDB/Controller/ControllerFactura.php',
			data : {tipo : 'listarClientes'},
			type : 'POST',
			success: function(res){
				if(res == 'No hay datos'){
					$('.selectCliente').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectCliente').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFactura.php',
			data : {tipo : 'listarFormaPago'},
			type : 'POST',
			success: function(res){
				if(res == 'No hay datos'){
					$('.selectFormaPago').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectFormaPago').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})

	})
	
	$('#add-form').submit(function(e){
		e.preventDefault();
		var fechaFactura = $('input[name="fecha_factura"]').val();
		var idUsuario = $('#tipoC').val();
		var idCliente = $('#tipoP').val();
		var idFormaPago = $('#tipoF').val();

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFactura.php',
			data : {tipo : 'agregar',fechaFactura:fechaFactura,idUsuario:idUsuario,idCliente: idCliente,idFormaPago:idFormaPago},
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
		var idCliente = $('#tipoPE').val();
		var idFormaPago = $('#tipoFE').val();

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFactura.php',
			data : {tipo : 'editar',idFactura: pk1 , nuevaFecha: nuevaFecha,idUsuario:idUsuario,idCliente:idCliente, idFormaPago:idFormaPago},
			type : 'POST',
			success: function(res){
				console.log(res);
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
		var idFactura = $(this).closest('tr').find('#idFactura').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFactura.php',
			data : {tipo : 'eliminar',idFactura: idFactura},
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
		    pk1 = $(this).closest('tr').find('#idFactura').html();
		    pk2 = $(this).closest('tr').find('#fecha').html();


			$('input[name="fecha_facturaEditar"]').val(pk2);


			$.ajax({
				url: '/ProyectoDB/Controller/ControllerFactura.php',
				data : {tipo : 'listarCcEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectUsuarioEditar').html(res);
			   		$('select').material_select();
				}
			})

			$.ajax({
				url: '/ProyectoDB/Controller/ControllerFactura.php',
				data : {tipo : 'listarClientesEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectClientesEditar').html(res);
			   		$('select').material_select();
				}
			})

			$.ajax({
				url: '/ProyectoDB/Controller/ControllerFactura.php',
				data : {tipo : 'listarFormaPagoEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectFormaPagoEditar').html(res);
			   		$('select').material_select();
				}
			})
	});










});