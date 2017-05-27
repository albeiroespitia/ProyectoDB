function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
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
			url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
			data : {tipo : 'listarFacturaServicio'},
			type : 'POST',
			success: function(res){
				if(res == 'No hay datos'){
					$('.selectFacturaServicio').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectFacturaServicio').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
			data : {tipo : 'listarServicios'},
			type : 'POST',
			success: function(res){
				console.log("hola");
				if(res == 'No hay datos'){
					$('.selectServicio').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectServicio').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})
	})


	$('#add-form').submit(function(e){
		e.preventDefault();
		var facturaServicio = $('#tipoF').val();
		var servicio = $('#tipoS').val();
		var horas = $('input[name="Horas"]').val();
		
		
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
			data : {tipo : 'agregar',facturaServicio: facturaServicio,servicio:servicio, horas: horas},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el detalle factura');
				}else{
					 Materialize.toast('Detalle factura creado exitosamente!', 2000) 
					 reload();
					 $('#modal1').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$('#edit-form').submit(function(e){
		e.preventDefault();
		var facturaServicio = $('#tipoFE').val();
		var servicio = $('#tipoSE').val();
		var horas = $('input[name="HorasEditar"]').val();

		
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
			data : {tipo : 'editar',idServicio:pk2, facturaServicio:pk1 ,servicio:servicio, horas: horas},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al editar el detalle factura compra');
				}else{
					 Materialize.toast('Detalle factura compra editado exitosamente!', 2000) 
					 reload();
					 $('#modal2').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$(document).on('click', '.borrar' ,function(){	
		var facturaServicio = $(this).closest('tr').find('#Facturaservicio').html();
		var servicio = $(this).closest('tr').find('#Servicio').html();
		
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
			data : {tipo : 'eliminar',facturaServicio: facturaServicio, servicio:servicio},
			type : 'POST',
			success: function(res){
				
				if(res == 'Error'){
					Materialize.toast('Error al eliminar detalle factura, Verifica que no este siendo usada!', 2000);
				}else{
					Materialize.toast('Detalle factura eliminada exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#Facturaservicio').html();
		    pk2 = $(this).closest('tr').find('#Servicio').html();
		    pk3 = $(this).closest('tr').find('#Horas').html();

			$('input[name="Horas"]').val(pk3);
	$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
			data : {tipo : 'listarFacturaServicioEditar'},
			type : 'POST',
			success: function(res){
				if(res == 'No hay datos'){
					$('.selectFacturaServicioEditar').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectFacturaServicioEditar').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
			data : {tipo : 'listarServiciosEditar'},
			type : 'POST',
			success: function(res){
				console.log("hola");
				if(res == 'No hay datos'){
					$('.selectServicioEditar').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectServicioEditar').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})
			

	});



});