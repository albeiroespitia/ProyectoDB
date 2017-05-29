$(document).ready(function() {

	$('#login-form').submit(function(e){

		var username = $('input[name="username"]').val();
		var password = $('input[name="password"]').val();
		e.preventDefault();


		$.ajax({
			url: '/ProyectoDB/Controller/Action/act_login.php',
			data: {username:username, password: password},
			type: 'POST',
			success: function(res){
				console.log(res);
				if(res == 'Error'){
					$('.error-user').html('Usuario o contraseña incorrectos');
				}else if(res == 'ingeniero'){
					window.location.href = '../EngineerView/engineer.php';
				}else if(res == 'administrador'){
					window.location.href = '../Admin/admin.php';
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		        console.log('holaaa');
		      }
		})

	})

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProducto.php',
			data: {tipo:'listarPrincipal'},
			type: 'POST',
			success: function(res){
				$('.productos').html(res);
			}
		})


		$(document).on('click', '.caja img' ,function(e){	
			var idDetalleFacCompra = e.target.id.split('-');
			var idProductoSelected = idDetalleFacCompra[0];
			var idFacturaCompraSelected = idDetalleFacCompra[1];
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerProducto.php',
				data: {tipo:'listaDetalles',idProductoSelected:idProductoSelected,idFacturaCompraSelected:idFacturaCompraSelected},
				type: 'POST',
				success: function(res){
					$('.productDetail').html(res);
				}
			})
			$('#modal3').modal('open');
		});


		$(document).on('click', '.buyItem' ,function(e){
			var temporal = e.target.id.split('-');
			var idProductoSelected = temporal[0];
			var idFacturaCompraSelected = temporal[1];
			var stock = temporal[2];
			$('input[name="stock_buy"]').attr('max',parseInt(stock));
			$('input[name="idProductoI"]').val(idProductoSelected);
			$('input[name="FacturaCompraI"]').val(idFacturaCompraSelected);
			$('input[name="cantidadI"]').val(stock);
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCiudad.php',
				data: {tipo:'listarCiudadComprar'},
				type: 'POST',
				success: function(res){
					$('.selectCiudad').html(res);
					$('select').material_select();
				}
			})
			$('#modal2').modal('open');


		})

		$('#buy-form').submit(function(e){
			e.preventDefault();
			var nombreCliente = $('input[name="nombre_buy"]').val();
			var telefonoCliente = $('input[name="telefono_buy"]').val();
			var emailCliente = $('input[name="email_buy"]').val();
			var ciudadCliente = $('#tipoCP').val();
			var cantidadComprada = $('input[name="stock_buy"]').val();
			var productoActual = $('input[name="idProductoI"]').val();
			var facturaActual = $('input[name="FacturaCompraI"]').val();
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCliente.php',
				data: {tipo:'agregar',nombreCliente:nombreCliente,telefonoCliente:telefonoCliente,emailCliente:emailCliente,ciudadCliente:ciudadCliente},
				type: 'POST',
				success: function(res){
					$.ajax({
						url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
						data: {tipo:'comprarProducto',productoActual:productoActual,facturaActual:facturaActual,cantidadComprada:cantidadComprada},
						type: 'POST',
						success: function(res){
							 $('#modal2').modal('close');
							 $('#modal3').modal('close');
							 Materialize.toast('Producto Comprado !', 2000);
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

				}
			})

		})

	
});