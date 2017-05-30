function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerFacturaServicio.php',
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
			url: '/ProyectoDB/Controller/ControllerFacturaServicio.php',
			data : {tipo : 'listarCliente'},
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
			url: '/ProyectoDB/Controller/ControllerFacturaServicio.php',
			data : {tipo : 'listarFormaPago'},
			type : 'POST',
			success: function(res){
				console.log(res);
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
		var cliente = $('#tipoC').val();
		var usuarioCC = $('#tipoU').val();
		var formaPago = $('#tipoF').val();
		var fecha = $('input[name="Fecha"]').val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFacturaServicio.php',
			data : {tipo : 'agregar',cliente: cliente,usuarioCC:usuarioCC,formaPago:formaPago,fecha:fecha},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar la nueva Factura de servicio');
				}else{
					 Materialize.toast('factura ingresada exitosamente!', 2000) 
					 reload();
					 $('#modal1').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$('#edit-form').submit(function(e){
		e.preventDefault();
		var cliente = $('#tipoCE').val();
		var usuarioCC = $('#tipoUE').val();
		var formaPago = $('#tipoFE').val();
		var fecha = $('input[name="NuevoFecha"]').val();

		console.log(cliente, usuarioCC, formaPago, fecha);
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFacturaServicio.php',
			data : {tipo : 'editar', idFacturaServicio:pk1, cliente: cliente,usuarioCC:usuarioCC,formaPago:formaPago,fecha:fecha},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar la nueva Factura de servicio');
				}else{
					 Materialize.toast('Factura editado exitosamente!', 2000) 
					 reload();
					 $('#modal2').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$(document).on('click', '.borrar' ,function(){	
		var idFacturaServicio = $(this).closest('tr').find('#idFacturaServicio').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFacturaServicio.php',
			data : {tipo : 'eliminar',idFacturaServicio: idFacturaServicio},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					Materialize.toast('Error al eliminar la factura, Verifica que no este siendo usada!', 2000);
				}else{
					Materialize.toast('Factura eliminado exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#idFacturaServicio').html();
		    pk2 = $(this).closest('tr').find('#Cliente').html();
		    pk3 = $(this).closest('tr').find('#Usuario_cc').html();
		    pk4 = $(this).closest('tr').find('#FormaPago').html();
		    pk5 = $(this).closest('tr').find('#Fecha').html();

			$('input[name="ClienteEditar"]').val(pk2);
			$('input[name="UsuarioEditar"]').val(pk3);
			$('input[name="FormaPagoEditar"]').val(pk4);
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerFacturaServicio.php',
				data : {tipo : 'listarClienteEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectClienteEditar').html(res);
			   		$('select').material_select();
				}
			})


			$.ajax({
				url: '/ProyectoDB/Controller/ControllerFacturaServicio.php',
				data : {tipo : 'listarFormaPagoEditar'},
				type : 'POST',
				success: function(res){
			   		$('.selectFormaPagoEditar').html(res);
			   		$('select').material_select();
				}
			})
	});

});