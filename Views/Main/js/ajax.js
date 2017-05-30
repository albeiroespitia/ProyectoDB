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

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerServicio.php',
			data: {tipo:'listarPrincipal'},
			type: 'POST',
			success: function(res){
				$('.servicios').html(res);
			}
		})

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProyecto.php',
			data: {tipo:'listarPrincipal'},
			type: 'POST',
			success: function(res){
				$('.proyectos').html(res);
			}
		})


		$(document).on('click', '.productBox img' ,function(e){	
			var idDetalleFacCompra = e.target.id.split('-');
			var idProductoSelected = idDetalleFacCompra[0];
			var idFacturaCompraSelected = idDetalleFacCompra[1];
			usuarioSelected = idDetalleFacCompra[2];
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerProducto.php',
				data: {tipo:'listaDetalles',idProductoSelected:idProductoSelected,idFacturaCompraSelected:idFacturaCompraSelected},
				type: 'POST',
				success: function(res){
					$('.productDetail').html(res);
				}
			})
			$('#modal5').modal('open');
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
			$('input[name="userSelected"]').val(usuarioSelected);
			$('input[name="valorProduct"]').val($('#productoVal').html().split(' ')[2]);
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCiudad.php',
				data: {tipo:'listarCiudadComprar'},
				type: 'POST',
				success: function(res){
					$('.selectCiudad').html(res);
					$('select').material_select();
				}
			})
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerFormaPago.php',
				data: {tipo:'listarFormaPagoComprarB'},
				type: 'POST',
				success: function(res){
					$('.formaPagoB').html(res);
					$('select').material_select();
				}
			})
			$('#modal6').modal('open');


		})

		$('#buy-form').submit(function(e){
			e.preventDefault();
			var nombreCliente = $('input[name="nombre_buy"]').val();
			var telefonoCliente = $('input[name="telefono_buy"]').val();
			var emailCliente = $('input[name="email_buy"]').val();
			var ciudadCliente = $('#tipoCP').val();
			var formaPago = $('#tipoFSB').val();
			var cantidadComprada = $('input[name="stock_buy"]').val();
			var productoActual = $('input[name="idProductoI"]').val();
			var fechaBuy = $('input[name="fecha_buy"]').val();
			var facturaActual = $('input[name="FacturaCompraI"]').val();
			var userSelected = $('input[name="userSelected"]').val();
			var productoValF = $('input[name="valorProduct"]').val() * cantidadComprada;
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCliente.php',
				data: {tipo:'agregar',nombreCliente:nombreCliente,telefonoCliente:telefonoCliente,emailCliente:emailCliente,ciudadCliente:ciudadCliente},
				type: 'POST',
				success: function(res){
					var idCliente = res;
					$.ajax({
						url: '/ProyectoDB/Controller/ControllerFactura.php',
						data: {tipo:'agregar',cliente:idCliente,usuarioCC:userSelected,formaPago:formaPago,fecha:fechaBuy},
						type: 'POST',
						success: function(res){
							var idFactura = res;
							$.ajax({
								url: '/ProyectoDB/Controller/ControllerDetalleFac.php',
								data: {tipo:'agregar',facturaCompra:idFactura,producto:productoActual,cantidad:cantidadComprada,valor:productoValF},
								type: 'POST',
								success: function(res){
									$.ajax({
										url: '/ProyectoDB/Controller/ControllerDetalleFac.php',
										data: {tipo:'generarReporte',Factura:idFactura,Producto:productoActual},
										type: 'POST',
										dataType: 'json',
										success: function(res){
											var reporteFinal = "<div class='container'><h4>Nombre del cliente: "+res[0].nombreC+"</h4></br><h4>Email del cliente: "+res[0].emailC+"</h4></br><h4>Nombre del Ingeniero: "+res[0].nombreU+"</h4></br><h4>Email del ingeniero: "+res[0].emailU+"</h4></br><h4>Descripicion del producto: "+res[0].descripcion+"</h4></br><h4>Nombre del producto: "+res[0].nombreP+"</h4></br><h4>Descripicion del producto: "+res[0].descripcion+"</h4></br><h4>Cantidad Comprada: "+res[0].cantidad+"</h4></br><h4>Valor Pagado: "+res[0].valor+"</h4></br>";
											$('input[name="pdfContent"]').val(reporteFinal);
											$('#modalPDFProduct').modal('open');
										}
									})
									$('#modal5').modal('close');
									$('#modal6').modal('close');
									$('input[name="nombre_ser"]').val('');
									$('input[name="telefono_ser"]').val('');
									$('input[name="email_ser"]').val('');
									$('input[name="hour_ser"]').val('');
									$('input[name="fecha_ser"]').val('');
									 
								}
							})
							 
						}
					})

					$.ajax({
						url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
						data: {tipo:'comprarProducto',productoActual:productoActual,facturaActual:facturaActual,cantidadComprada:cantidadComprada},
						type: 'POST',
						success: function(res){
							 $('#modal5').modal('close');
							 $('#modal6').modal('close');
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

		/////////////////////////////////////////////////////////////////////

		$(document).on('click', '.projectBox img' ,function(e){	
			var idProyecto = e.target.id;
			$('input[name="idProyectoI"]').val(idProyecto);
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerProyecto.php',
				data: {tipo:'listaDetalles',idProyecto:idProyecto},
				type: 'POST',
				success: function(res){
					$('.projectDetail').html(res);
				}
			})
			$('#modal7').modal('open');
		});


		$(document).on('click', '.getProject' ,function(e){
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCiudad.php',
				data: {tipo:'listarCiudadComprarPR'},
				type: 'POST',
				success: function(res){
					$('.selectCiudadP').html(res);
					$('select').material_select();
				}
			})
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerFormaPago.php',
				data: {tipo:'listarFormaPagoComprarG'},
				type: 'POST',
				success: function(res){
					$('.formaPagoG').html(res);
					$('select').material_select();
				}
			})
			$('#modal8').modal('open');

		})

		$('#get-form').submit(function(e){
			e.preventDefault();
			var nombreCliente = $('input[name="nombre_get"]').val();
			var telefonoCliente = $('input[name="telefono_get"]').val();
			var emailCliente = $('input[name="email_get"]').val();
			var ciudadCliente = $('#tipoCPE').val();
			var idProyectoSelected = $('input[name="idProyectoI"]').val();
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCliente.php',
				data: {tipo:'agregar',nombreCliente:nombreCliente,telefonoCliente:telefonoCliente,emailCliente:emailCliente,ciudadCliente:ciudadCliente},
				type: 'POST',
				success: function(res){
					$.ajax({
						url: '/ProyectoDB/Controller/Action/SendEmail.php',
						data: {tipo:'sendEmail',nombreCliente:nombreCliente,emailCliente:emailCliente,idProyectoSelected:idProyectoSelected},
						type: 'POST',
						success: function(res){
							
						}
					})
					$('#modal7').modal('close');
					$('#modal8').modal('close');
					Materialize.toast('Proyecto Adquirido, si su correo es valido se le enviara un email !', 2000);
					$('input[name="nombre_get"]').val('');
					$('input[name="telefono_get"]').val('');
					$('input[name="email_get"]').val('');

				}
			})

		})


		//////////////////////////////////////////////////////////////////

		$(document).on('click', '.servicioBox img' ,function(e){	
			var idServicio = e.target.id;
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerServicio.php',
				data: {tipo:'listaDetalles',idServicio:idServicio},
				type: 'POST',
				success: function(res){
					$('.serviceDetail').html(res);
				}
			})
			$('#modal9').modal('open');
		});


		$(document).on('click', '.getService' ,function(e){
			var idServicio = e.target.id;
			$('input[name="idServicioI"]').val(idServicio);
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCiudad.php',
				data: {tipo:'listarCiudadComprarS'},
				type: 'POST',
				success: function(res){
					$('.selectCiudadS').html(res);
					$('select').material_select();
				}
			})
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerFormaPago.php',
				data: {tipo:'listarFormaPagoComprar'},
				type: 'POST',
				success: function(res){
					$('.formaPagoS').html(res);
					$('select').material_select();
				}
			})
			$('#modal10').modal('open');


		})

		$('#ser-form').submit(function(e){
			e.preventDefault();
			var nombreCliente = $('input[name="nombre_ser"]').val();
			var telefonoCliente = $('input[name="telefono_ser"]').val();
			var emailCliente = $('input[name="email_ser"]').val();
			var ciudadCliente = $('#tipoCPES').val();
			var horasCompradas = $('input[name="hour_ser"]').val();
			var formaPago = $('#tipoFS').val();
			var fechaServicio = $('input[name="fecha_ser"]').val();
			var servicioActual = $('input[name="idServicioI"]').val();
			var idCliente;
			var idFacturaServicio;
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCliente.php',
				data: {tipo:'agregar',nombreCliente:nombreCliente,telefonoCliente:telefonoCliente,emailCliente:emailCliente,ciudadCliente:ciudadCliente},
				type: 'POST',
				success: function(res){
					var idCliente = res;
					$.ajax({
						url: '/ProyectoDB/Controller/ControllerFacturaServicio.php',
						data: {tipo:'agregar',cliente:idCliente,formaPago:formaPago,fecha:fechaServicio},
						type: 'POST',
						success: function(res){
							var idFacturaServicio = res;
							$.ajax({
								url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
								data: {tipo:'agregar',facturaServicio:idFacturaServicio,servicio:servicioActual,horas:horasCompradas},
								type: 'POST',
								success: function(res){
									$.ajax({
										url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
										data: {tipo:'generarReporte',FacturaServicio:idFacturaServicio,Servicio:servicioActual},
										type: 'POST',
										dataType: 'json',
										success: function(res){
											var reporteFinal = "<div class='container'><h4>Nombre del cliente: "+res[0].nombreC+"</h4></br><h4>Email del cliente: "+res[0].emailC+"</h4></br><h4>Forma de pago: "+res[0].descripcion+"</h4></br><h4>Descripicion del servicio: "+res[0].nombreP+"</h4></br><h4>Horas del servicio: "+res[0].horas+"</h4></br>";
											$('input[name="pdfContent"]').val(reporteFinal);
											$('#modalPDFService').modal('open');
										}
									})
									$('#modal9').modal('close');
									$('#modal10').modal('close');
									Materialize.toast('Servicio Adquirido!', 2000);
									$('input[name="nombre_ser"]').val('');
									$('input[name="telefono_ser"]').val('');
									$('input[name="email_ser"]').val('');
									$('input[name="hour_ser"]').val('');
									$('input[name="fecha_ser"]').val('');
									 
								}
							})
							 
						}
					})

				}
			})

		})

	
});