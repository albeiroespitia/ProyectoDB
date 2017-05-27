function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerImagenProyecto.php',
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
			url: '/ProyectoDB/Controller/ControllerImagenProyecto.php',
			data : {tipo : 'listarProductos'},
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

	})

	$(document).on('click', '.borrar' ,function(){	
		var idImagenProducto = $(this).closest('tr').find('#idImagenProducto').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerImagenProyecto.php',
			data : {tipo : 'eliminar',idImagenProducto: idImagenProducto},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					Materialize.toast('Error al eliminar la imagen, Verifica que no este siendo usada!', 2000);
				}else{
					Materialize.toast('Imagen eliminada exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#idImagenProducto').html();
		    pk2 = $(this).closest('tr').find('#descripcion').html();
		    $('input[name="idProducto"]').val(pk1)

			$('input[name="descripcionEditar"]').val(pk2);
	$.ajax({
			url: '/ProyectoDB/Controller/ControllerImagenProyecto.php',
			data : {tipo : 'listarProductosEditar'},
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

	});










});