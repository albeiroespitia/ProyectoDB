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

	$('#addProduct').click(function(){
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerDetalleFacCompra.php',
			data: {tipo:'agregarProductoCatalogo',idUser:idUser},
			type: 'POST',
			success: function(res){
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


	$('#addProject').click(function(){
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProyecto.php',
			data: {tipo:'agregarProyectoCatalogo',idUser:idUser},
			type: 'POST',
			success: function(res){
				$('.selectProyecto').html(res);
				$('select').material_select();
			}
		})
	})

	$('#addCatalogoProjectForm').submit(function(e){
		e.preventDefault();
		var idProyecto = $('#tipoPR').val();

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProyecto.php',
			data: {tipo:'AgregarActivo',idProyecto:idProyecto},
			type: 'POST',
			success: function(res){
				$('#modal3').modal('close');
				Materialize.toast('Agregado satisfactoriamente!', 3000)
				$.ajax({
					url: '/ProyectoDB/Controller/ControllerProyecto.php',
					data: {tipo:'listarPrincipal'},
					type: 'POST',
					success: function(res){
						$('.proyectos').html(res);
					}
				})
			}
		})
	})

	$('#deleteProject').click(function(){
		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProyecto.php',
			data: {tipo:'borrarProyectoCatalogo',idUser:idUser},
			type: 'POST',
			success: function(res){
				$('.selectProyectoDelete').html(res);
				$('select').material_select();
			}
		})
	})

	$('#deleteCatalogoProjectForm').submit(function(e){
		e.preventDefault();
		var idProyecto = $('#tipoPRD').val();

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProyecto.php',
			data: {tipo:'BorrarActivo',idProyecto:idProyecto},
			type: 'POST',
			success: function(res){
				$('#modal4').modal('close');
				Materialize.toast('Borrado satisfactoriamente!', 3000)
				$.ajax({
					url: '/ProyectoDB/Controller/ControllerProyecto.php',
					data: {tipo:'listarPrincipal'},
					type: 'POST',
					success: function(res){
						$('.proyectos').html(res);
					}
				})
			}
		})
	})





	////////////////////////////////////////////////////////////////////////

	$(document).on('click', '.productBox img' ,function(e){	
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
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCiudad.php',
				data: {tipo:'listarCiudadComprar'},
				type: 'POST',
				success: function(res){
					$('.selectCiudad').html(res);
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
			var idProyecto = e.target.id;
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCiudad.php',
				data: {tipo:'listarCiudadComprarPR'},
				type: 'POST',
				success: function(res){
					$('.selectCiudadP').html(res);
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
			$.ajax({
				url: '/ProyectoDB/Controller/ControllerCliente.php',
				data: {tipo:'agregar',nombreCliente:nombreCliente,telefonoCliente:telefonoCliente,emailCliente:emailCliente,ciudadCliente:ciudadCliente},
				type: 'POST',
				success: function(res){
					 $('#modal7').modal('close');
					 $('#modal8').modal('close');
					 Materialize.toast('Proyecto Adquirido !', 2000);
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
					console.log(res);
					var idCliente = res;
					$.ajax({
						url: '/ProyectoDB/Controller/ControllerFacturaServicio.php',
						data: {tipo:'agregar',cliente:idCliente,formaPago:formaPago,fecha:fechaServicio},
						type: 'POST',
						success: function(res){
							console.log(res);
							var idFacturaServicio = res;
							$.ajax({
								url: '/ProyectoDB/Controller/ControllerDetalleFacVenta.php',
								data: {tipo:'agregar',facturaServicio:idFacturaServicio,servicio:servicioActual,horas:horasCompradas},
								type: 'POST',
								success: function(res){
									$('#modal9').modal('close');
									$('#modal10').modal('close');
									Materialize.toast('Servicio Adquirido, Porfavor revise su correo !', 2000);
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