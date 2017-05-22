function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
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
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data : {tipo : 'listarProducto'},
			type : 'POST',
			success: function(res){
				if(res == 'No hay datos'){
					$('.selectProducto').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectProducto').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data : {tipo : 'listarFacturaCompra'},
			type : 'POST',
			success: function(res){
				console.log("hola");
				if(res == 'No hay datos'){
					$('.selectFacturaCompra').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectFacturaCompra').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})
	})


	$('#add-form').submit(function(e){
		e.preventDefault();
		var producto = $('#tipoP').val();
		var facturaCompra = $('#tipoFC').val();
		var cantidad = $('input[name="cantidad"]').val();
		var valor = $('input[name="valor"]').val();
		console.log(producto);
		console.log(facturaCompra);
		console.log(cantidad);
		console.log(valor);
		
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data : {tipo : 'agregar',producto: producto,facturaCompra: facturaCompra,cantidad: cantidad,valor:valor},
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
		var producto = $('#tipoPE').val();
		var cantidad = $('input[name="cantidadEditar"]').val();
		var valor = $('input[name="valorEditar"]').val();

		
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data : {tipo : 'editar', idProducto:pk3, facturaCompra:pk4 ,producto: producto, cantidad:cantidad, valor: valor},
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
		var idProducto = $(this).closest('tr').find('#idProducto').html();
		var facturaCompra = $(this).closest('tr').find('#facturaCompra').html();
		console.log(idProducto);
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data : {tipo : 'eliminar',idProducto: idProducto, facturaCompra:facturaCompra},
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
		    pk1 = $(this).closest('tr').find('#cantidad').html();
		    pk2 = $(this).closest('tr').find('#valor').html();
		    pk3 = $(this).closest('tr').find('#idProducto').html();
		    pk4 = $(this).closest('tr').find('#facturaCompra').html();


			$('input[name="cantidadEditar"]').val(pk1);
			$('input[name="valorEditar"]').val(pk2);
	$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data : {tipo : 'listarProductoEditar'},
			type : 'POST',
			success: function(res){
				if(res == 'No hay datos'){
					$('.selectProductoEditar').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectProductoEditar').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data : {tipo : 'listarFacturaCompraEditar'},
			type : 'POST',
			success: function(res){
				console.log("hola");
				if(res == 'No hay datos'){
					$('.selectFacturaCompraEditar').html('Esta tabla usa datos de otra tabla porfavor llene la otra tabla');
				}else{
					$('.selectFacturaCompraEditar').html(res);
				}
		   		
		   		$('select').material_select();
			}
		})
			

	});











});