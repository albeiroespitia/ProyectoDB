<?php 
	
	require_once '../Model/DAO/DetallefacDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$detallefacDAO = new DetallefacDAO();
			$array_provedores = $detallefacDAO->listarDetalleFacDAO();
			$html = "";
			if($array_provedores != 0){

				foreach ($array_provedores as $row) {
				$html .= '<tr>
							<td id="idProducto">'.$row['idProducto'].'</td>
				            <td id="producto">'.$row['nombre'].' </td>
				            <td id="facturaCompra">'.$row['idFactura'].'</td>
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
			$ProvedorDAO = new DetallefacDAO();
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
			$ProvedorDAO = new DetalleFacDAO();
			$array_provedores = $ProvedorDAO->listarProductoEditar();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoPE" required>
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

			if($_POST['tipo'] == 'listarFactura'){
				
			$ProvedorDAO = new DetallefacDAO();
			$array_provedores = $ProvedorDAO->listarFacturaCompra();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoFC" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFactura'].'">'.$row['idFactura'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Factura </label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}
		
		if($_POST['tipo'] == 'listarFacturaEditar'){
				
			$ProvedorDAO = new DetallefacDAO();
			$array_provedores = $ProvedorDAO->listarFacturaCompra();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoFCE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFactura'].'">'.$row['idFactura'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Factura</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}


		

		if($_POST['tipo'] == 'agregar'){
			$provedorDAO = new DetalleFacDAO();
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
			$DetallefacCompraDAO = new DetallefacDAO();
			$idProducto = $_POST['idProducto'];
			$facturaCompra = $_POST['facturaCompra'];
			$errores = $DetallefacCompraDAO->borrarDetalleFacCompra($idProducto,$facturaCompra);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$provedorDAO = new DetallefacDAO();
			$idProducto = $_POST['idProducto'];
			$facturaCompra = $_POST['facturaCompra'];
			$producto = $_POST['producto'];
			$cantidad = $_POST['cantidad'];
			$valor = $_POST['valor'];
			$errores = $provedorDAO->editarDetalleFacCompra($idProducto, $facturaCompra, $producto, $cantidad, $valor);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>