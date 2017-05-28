$(document).ready(function() {

	var idUser = $('input[name="idUser"]').val();

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProducto.php',
			data: {tipo:'listarPrincipal'},
			type: 'POST',
			success: function(res){
				$('.productos').html(res);
			}
		})

	$('#addProduct').click(function(){
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data: {tipo:'agregarProductoCatalogo',idUser:idUser},
			type: 'POST',
			success: function(res){
				$('select').material_select();
				$('.selectProducto').html(res);
				$('select').material_select();
			}
		})
	})

	$('#addCatalogoForm').submit(function(e){
		e.preventDefault();
		var idDetalleFacCompra = $('#tipoP').val().split('-');
		var idProductoSelected = idDetalleFacCompra[0];
		var idFacturaCompraSelected = idDetalleFacCompra[1];

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data: {tipo:'AgregarActivo',idProductoSelected:idProductoSelected,idFacturaCompraSelected:idFacturaCompraSelected},
			type: 'POST',
			success: function(res){
				$('#modal1').modal('close');
				Materialize.toast('Agregado satisfactoriamente!', 3000)
				$.ajax({
					url: '/ProyectoDB/Controller/ControllerProducto.php',
					data: {tipo:'listarPrincipal'},
					type: 'POST',
					success: function(res){
						$('.productos').html(res);
					}
				})
			}
		})
	})

	$('#deleteProduct').click(function(){
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data: {tipo:'borrarProductoCatalogo',idUser:idUser},
			type: 'POST',
			success: function(res){
				$('select').material_select();
				$('.selectProductoDelete').html(res);
				$('select').material_select();
			}
		})
	})

	$('#deleteCatalogoForm').submit(function(e){
		e.preventDefault();
		var idDetalleFacCompra = $('#tipoPD').val().split('-');
		var idProductoSelected = idDetalleFacCompra[0];
		var idFacturaCompraSelected = idDetalleFacCompra[1];

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data: {tipo:'BorrarActivo',idProductoSelected:idProductoSelected,idFacturaCompraSelected:idFacturaCompraSelected},
			type: 'POST',
			success: function(res){
				$('#modal2').modal('close');
				Materialize.toast('Borrado satisfactoriamente!', 3000)
				$.ajax({
					url: '/ProyectoDB/Controller/ControllerProducto.php',
					data: {tipo:'listarPrincipal'},
					type: 'POST',
					success: function(res){
						$('.productos').html(res);
					}
				})
			}
		})
	})
	
});