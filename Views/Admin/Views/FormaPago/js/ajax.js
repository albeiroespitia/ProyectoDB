function reload(){
	$.ajax({
		url: '/ProyectoDB/Controller/ControllerFormaPago.php',
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
	
	$('#add-form').submit(function(e){
		e.preventDefault();
		var descripcionFormaPago = $('input[name="descripcionFormaPago"]').val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFormaPago.php',
			data : {tipo : 'agregar',descripcionFormaPago: descripcionFormaPago},
			type : 'POST',
			success: function(res){
				console.log(res);
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar la nueva forma de pago');
				}else{
					 Materialize.toast('Forma de pago creada exitosamente!', 2000) 
					 reload();
					 $('#modal1').modal('close');
					 $('.error-create').html('');
					 $('input[name="descripcionFormaPago"]').val(' ');
				}

			}
		})
	})

	$('#edit-form').submit(function(e){
		e.preventDefault();
		var nuevaDescripcionFormaPago = $('input[name="nuevaDescripcionFormaPago"]').val();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFormaPago.php',
			data : {tipo : 'editar', idFormaPago: pk1 , descripcionFormaPago: nuevaDescripcionFormaPago},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					$('.error-create').html('Hubo un error al ingresar la nueva forma de pago');
				}else{
					 Materialize.toast('Forma de pago editada exitosamente!', 2000) 
					 reload();
					 $('#modal2').modal('close');
					 $('.error-create').html('');
				}

			}
		})
	})

	$(document).on('click', '.borrar' ,function(){	
		var idFormaPago = $(this).closest('tr').find('#idFormaPago').html();
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerFormaPago.php',
			data : {tipo : 'eliminar',idFormaPago: idFormaPago},
			type : 'POST',
			success: function(res){
				if(res == 'Error'){
					Materialize.toast('Error al eliminar la forma de pago, Verifica que no este siendo usada!', 2000);
				}else{
					Materialize.toast('Forma de pago eliminada exitosamente!', 2000);
					reload();
				}
			}
		})
	})


	$(document).on('click', '.editar' ,function(){
		    pk1 = $(this).closest('tr').find('#idFormaPago').html();
		    pk2 = $(this).closest('tr').find('#descripcion').html();

			$('input[name="nuevaDescripcionFormaPago"]').val(pk2);
	});










});