<?php 
	
	require_once '../Model/DAO/DetallefacCompraDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$detallefacCompraDAO = new DetallefacCompraDAO();
			$array_provedores = $detallefacCompraDAO->listarDetalleFacCompra();
			$html = "";
			if($array_provedores != 0){

				foreach ($array_provedores as $row) {
				$html .= '<tr>
				            <td id="producto">'.$row['nombre'].' </td>
				            <td id="facturaCompra">'.$row['idFacturaCompra'].'</td>
				            <td id="cantidad">'.$row['cantidadD'].' </td>
				            <td id="valor">'.$row['valor'].'</td>
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}


		if($_POST['tipo'] == 'listarProducto'){
			$ProvedorDAO = new DetallefacCompraDAO();
			$array_provedores = $ProvedorDAO->listarProducto();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoP" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idProducto'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Producto</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
		}

			if($_POST['tipo'] == 'listarProductoEditar'){
			$ProvedorDAO = new DetallefacCompraDAO();
			$array_provedores = $ProvedorDAO->listarProductoEditar();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoPE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Producto</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
		}

			if($_POST['tipo'] == 'listarFacturaCompra'){
				
			$ProvedorDAO = new DetallefacCompraDAO();
			$array_provedores = $ProvedorDAO->listarFacturaCompra();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoFC" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFacturaCompra'].'">'.$row['idFacturaCompra'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Factura Compra</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}


		

		if($_POST['tipo'] == 'agregar'){
			$provedorDAO = new DetalleFacCompraDAO();
			$producto = $_POST['producto'];
			$detalleFactura = $_POST['facturaCompra'];
			$cantidad = $_POST['cantidad'];
			$valor = $_POST['valor'];
			$errores = $provedorDAO->crearDetalleFacCompra($producto, $detalleFactura, $cantidad,$valor);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$provedorDAO = new DetallefacCompraDAO();
			$facturaCompra = $_POST['facturaCompra'];
			$errores = $provedorDAO->borrarDetalleFacCompra($facturaCompra);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$provedorDAO = new ProvedorDAO();
			$idProovedor = $_POST['idProovedor'];
			$nombreProvedor = $_POST['nuevonombreProvedor'];
			$emailProvedor = $_POST['nuevoemailProvedor'];
			$telefonoProvedor = $_POST['nuevotelefonoProvedor'];
			$ciudadProvedor = $_POST['nuevociudadProvedor'];
			$tipoProducto = $_POST['nuevotipoProducto'];
			$errores = $provedorDAO->editarProvedor($idProovedor,$nombreProvedor, $emailProvedor, $telefonoProvedor, $ciudadProvedor,$tipoProducto);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>