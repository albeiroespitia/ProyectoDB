function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerProducto.php',
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

	})
	
	$('#add-form').submit(function(e){
		e.preventDefault();
		var nombreProducto = $('input[name="nombreProducto"]').val();
		var descripcionProducto = $('input[name="descripcionProducto"]').val();
		var cantidadProducto = $('input[name="cantidadProducto"]').val();
		var idProvedor = $('#tipoC').val();

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProducto.php',
			data : {tipo : 'agregar',nombreProducto: nombreProducto,descripcionProducto: descripcionProducto,cantidadProducto: cantidadProducto,idProvedor: idProvedor},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el nuevo producto');
				}else{
					 Materialize.toast('Producto creado exitosamente!', 2000) 
					 reload();
					 $('#modal1').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$('#edit-form').submit(function(e){
		e.preventDefault();
		var nombreProducto = $('input[name="nuevonombreProducto"]').val();
		var descripcionProducto = $('input[name="nuevadescripcionProducto"]').val();
		var cantidadProducto = $('input[name="nuevacantidadProducto"]').val();
		var idProvedor = $('#tipoTE').val();

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProducto.php',
			data : {tipo : 'editar', idProducto: pk1 , nombreProducto: nombreProducto,descripcionProducto:descripcionProducto,cantidadProducto:cantidadProducto,idProvedor:idProvedor},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar el nuevo producto');
				}else{
					 Materialize.toast('producto editada exitosamente!', 2000) 
					 reload();
					 $('#modal2').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$(document).on('click', '.borrar' ,function(){	
		var idProducto = $(this).closest('tr').find('#idProducto').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProducto.php',
			data : {tipo : 'eliminar',idProducto: idProducto},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					Materialize.toast('Error al eliminar el producto, Verifica que no este siendo usado!', 2000);
				}else{
					Materialize.toast('Producto eliminado exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#idProducto').html();
		    pk2 = $(this).closest('tr').find('#nombre').html();
		    pk3 = $(this).closest('tr').find('#descripcion').html();
		    pk4 = $(this).closest('tr').find('#cantidad').html();

			$('input[name="nuevonombreProducto"]').val(pk2);
			$('input[name="nuevadescripcionProducto"]').val(pk3);
			$('input[name="nuevacantidadProducto"]').val(pk4);

	});










});