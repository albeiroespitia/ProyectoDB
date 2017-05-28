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
							<td id="idProducto">'.$row['idProducto'].'</td>
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

		if($_POST['tipo'] == 'agregarProductoCatalogo'){
			$ProvedorDAO = new DetallefacCompraDAO();
			$idUser = $_POST['idUser'];
			$array_provedores = $ProvedorDAO->listarProductoIngeniero($idUser);
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">local_grocery_store</i>
					<select  id="tipoP" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['Producto'].'-'.$row['FacturaCompra'].'" data-icon="../../Galeria/ImagenesProducto/'.$row['imagen'].'" class="left circle">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Productos en su propiedad</label>';

				echo $html;
			}else{
				echo 'No tiene productos';
			}
		}

		if($_POST['tipo'] == 'borrarProductoCatalogo'){
			$ProvedorDAO = new DetallefacCompraDAO();
			$idUser = $_POST['idUser'];
			$array_provedores = $ProvedorDAO->listarProductoIngenieroBorrar($idUser);
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">local_grocery_store</i>
					<select  id="tipoPD" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['Producto'].'-'.$row['FacturaCompra'].'" data-icon="../../Galeria/ImagenesProducto/'.$row['imagen'].'" class="left circle">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Productos en el catalogo</label>';

				echo $html;
			}else{
				echo 'No tiene productos';
			}
		}

		if($_POST['tipo'] == 'AgregarActivo'){
			$ProvedorDAO = new DetallefacCompraDAO();
			$idProductoSelected = $_POST['idProductoSelected'];
			$idFacturaCompraSelected = $_POST['idFacturaCompraSelected'];
			$array_provedores = $ProvedorDAO->agregarAlCatalogo($idProductoSelected,$idFacturaCompraSelected);
			
		}

		if($_POST['tipo'] == 'BorrarActivo'){
			$ProvedorDAO = new DetallefacCompraDAO();
			$idProductoSelected = $_POST['idProductoSelected'];
			$idFacturaCompraSelected = $_POST['idFacturaCompraSelected'];
			$array_provedores = $ProvedorDAO->eliminarDelCatalogo($idProductoSelected,$idFacturaCompraSelected);
			
		}

			if($_POST['tipo'] == 'listarProductoEditar'){
			$ProvedorDAO = new DetalleFacCompraDAO();
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
					if($_POST['tipo'] == 'listarFacturaCompraEditar'){
				
			$ProvedorDAO = new DetallefacCompraDAO();
			$array_provedores = $ProvedorDAO->listarFacturaCompra();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoFCE" required>
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
			$DetallefacCompraDAO = new DetallefacCompraDAO();
			$idProducto = $_POST['idProducto'];
			$facturaCompra = $_POST['facturaCompra'];
			console.log($idProducto);
			$errores = $DetallefacCompraDAO->borrarDetalleFacCompra($idProducto,$facturaCompra);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$provedorDAO = new DetallefacCompraDAO();
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