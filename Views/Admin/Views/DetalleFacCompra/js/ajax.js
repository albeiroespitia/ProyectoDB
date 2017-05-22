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
				console.log(res);
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
		var producto = $(this).closest('tr').find('#producto').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data : {tipo : 'eliminar',detallefactura: detallefactura},
			type : 'POST',
			success: function(res){
				console.log(res);
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