<?php 
	
	require_once '../Model/DAO/ProyectoDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$proyectoDAO = new ProyectoDAO();
			$array_proyecto = $proyectoDAO->listarProyecto();
			$html = "";
			if($array_proyecto != 0){

				foreach ($array_proyecto as $row) {
				$html .= '<tr>
				            <td id="idProyecto">'.$row['idProyecto'].' </td>
				            <td id="descripcion">'.$row['descripcion'].'</td>
				            <td id="empresa">'.$row['empresa'].' </td>
				            <td id="cc">'.$row['cc'].'</td>
				            <td id="nombre">'.$row['nombre'].' </td>				    
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'agregarProyectoCatalogo'){
			$ProvedorDAO = new ProyectoDAO();
			$idUser = $_POST['idUser'];
			$array_provedores = $ProvedorDAO->listarProyectoAgregarCatalogo($idUser);
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">local_grocery_store</i>
					<select  id="tipoPR" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idProyecto'].'" data-icon="../../Galeria/ImagenesProyecto/'.$row['imagen'].'" class="left circle">'.$row['descripcionP'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Proyectos en su propiedad</label>';

				echo $html;
			}else{
				echo 'No tiene proyectos para agregar al catalogo';
			}
		}

		if($_POST['tipo'] == 'borrarProyectoCatalogo'){
			$ProvedorDAO = new ProyectoDAO();
			$idUser = $_POST['idUser'];
			$array_provedores = $ProvedorDAO->listarProyectoBorrarCatalogo($idUser);
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">local_grocery_store</i>
					<select  id="tipoPRD" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idProyecto'].'" data-icon="../../Galeria/ImagenesProyecto/'.$row['imagen'].'" class="left circle">'.$row['descripcionP'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Proyectos en el catalogo</label>';

				echo $html;
			}else{
				echo 'No tiene proyectos en el catalogo';
			}
		}

		if($_POST['tipo'] == 'AgregarActivo'){
			$ProvedorDAO = new ProyectoDAO();
			$idProyecto = $_POST['idProyecto'];
			$array_provedores = $ProvedorDAO->agregarAlCatalogo($idProyecto);
			
		}

		if($_POST['tipo'] == 'BorrarActivo'){
			$ProvedorDAO = new ProyectoDAO();
			$idProyecto = $_POST['idProyecto'];
			$array_provedores = $ProvedorDAO->BorrarDelCatalogo($idProyecto);
			
		}

		if($_POST['tipo'] == 'listarPrincipal'){
			$proyectoDAO = new ProyectoDAO();
			$array_proyecto = $proyectoDAO->listarProyectosCatalogo();
			if($array_proyecto != 0){
				$html = '<span class="titulo">Proyectos</span>
							<div class="row">';
				$contador = 0;
				foreach ($array_proyecto as $row) {
				$html .= '<div class="col m4">
                        <div class="caja projectBox">
                            <img id="'.$row['idProyecto'].'" class="imagenProducto" src="../../Galeria/ImagenesProyecto/'.$row['imagen'].'" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">'.$row['empresa'].'</p>
                                <p class="descripcionProducto">'.$row['descripcionP'].'</p>
                            </div>
                        </div>
                    </div>';
                    $contador++;
                    if($contador == 4 || $contador == 8 || $contador == 12 || $contador == 16 ){
                    	$html .= '</div><div class="row">';
                    }
				
				}

				$html .= '</div>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listaDetalles'){
			$proyectoDAO = new ProyectoDAO();
			$project = $_POST['idProyecto'];
			$array_proyecto = $proyectoDAO->listarProyectosCatalogoEspecifico($project);
			if($array_proyecto != 0){
				$html = '';
				$contador = 0;
				foreach ($array_proyecto as $row) {
				$html .= '<h4>'.$row['empresa'].'</h4>
					      <img class ="imgdetail" src="../../Galeria/ImagenesProyecto/'.$row['imagen'].'" width="300px" height="300px">
					      <div class="detalles">
					          <p>Descripcion: '.$row['descripcionP'].'</p>
					          <a class="btn-floating btn-large waves-effect waves-light red right getProject"><i id="'.$row['idProyecto'].'" class="material-icons">add_shopping_cart</i></a>
					      </div>';
				
				}

				$html .= '</div>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}


		if($_POST['tipo'] == 'listarCc'){
			$proyectoDAO =    new ProyectoDAO();
			$array_proyecto = $proyectoDAO->listarCcUsuario();
			$html = " ";
			if($array_proyecto != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoC" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_proyecto as $row){
					$html .= '<option value="'.$row['cc'].'">'.$row['cc'].' - '.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Cedula - Usuario</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		

		if($_POST['tipo'] == 'listarCcEditar'){
			$proyectoDAO = new ProyectoDAO();
			$array_provedores = $proyectoDAO->listarCcUsuario();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoTE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['cc'].'">'.$row['cc'].' - '.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Cedula - Usuario</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		

		if($_POST['tipo'] == 'agregar'){
			$proyectoDAO = new ProyectoDAO ();
			$descripcion = $_POST['descripcionProyecto'];
			$empresa = $_POST['empresaProyecto'];
			$usuarioCc = $_POST['usuarioCc'];
			$errores = $proyectoDAO->crearProyecto($descripcion, $empresa, $usuarioCc);
			if($errores == 0){
				echo 'Error';
			}

			$array_idProducto = $proyectoDAO->lastRecord();
			foreach ($array_idProducto as $row) {
				$lastIdProyecto = $row['idProyecto'];
			}

			$proyectoDAO->crearImagen($lastIdProyecto);
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$proyectoDAO = new ProyectoDAO();
			$idProyecto = $_POST['idProyecto'];
			$errores = $proyectoDAO->borrarProyecto($idProyecto);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$provedorDAO = new ProyectoDAO();
			$idProyecto = $_POST['idProyecto'];
			$descripcion = $_POST['descripcionProyecto'];
			$empresa = $_POST['empresaProyecto'];
			$usuarioCc = $_POST['tipoTE'];
			$errores = $provedorDAO->editarProyecto($idProyecto,$descripcion,$empresa, $usuarioCc);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>