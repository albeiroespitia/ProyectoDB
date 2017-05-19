<?php 
	
	require_once '../Model/DAO/UsuarioDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$usuarioDAO = new UsuarioDAO();
			$array_clientes = $usuarioDAO->listarUsuarios();
			$html = " ";
			if($array_clientes != 0){

				foreach ($array_clientes as $row) {
				$html .= '<tr>
				            <td id="cc">'.$row['cc'].' </td>
				            <td id="nombre">'.$row['nombreCliente'].'</td>
				            <td id="apellido">'.$row['apellido'].' </td>
				            <td id="sexo">'.$row['sexo'].' </td>
				            <td id="email">'.$row['email'].' </td>
				            <td id="edad">'.$row['edad'].' </td>
				            <td id="userName">'.$row['userName'].' </td>
				            <td id="password">'.$row['password'].' </td>
				            <td id="TipoUsuario"> Ingeniero </td>
				            <td id="Ciudad">'.$row['nombreCiudad'].' </td>
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarCiudad'){
			$usuarioDAO = new UsuarioDAO();
			$array_clientes = $usuarioDAO->listarCiudadUsuario();
			$html = " ";
			if($array_clientes != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoC" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_clientes as $row){
					$html .= '<option value="'.$row['idCiudad'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Ciudad</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarCiudadEditar'){
			$usuarioDAO = new UsuarioDAO();
			$array_clientes = $usuarioDAO->listarCiudadUsuario();
			$html = " ";
			if($array_clientes != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoCE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_clientes as $row){
					$html .= '<option value="'.$row['idCiudad'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Ciudad</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'agregar'){
			$usuarioDAO = new UsuarioDAO();
			$cc = $_POST['ccUsuario'];
			$nombreUsuario = $_POST['nombreUsuario'];
			$apellidoUsuario = $_POST['apellidoUsuario'];
			$sexoUsuario = $_POST['sexoUsuario'];
			$emailUsuario = $_POST['emailUsuario'];
			$edadUsuario = $_POST['edadUsuario'];
			$usernameUsuario = $_POST['usernameUsuario'];
			$passwordUsuario = $_POST['passwordUsuario'];
			$ciudadUsuario = $_POST['ciudadUsuario'];
			$errores = $usuarioDAO->crearUsuario($cc,$nombreUsuario,$apellidoUsuario,$sexoUsuario,$emailUsuario,$edadUsuario,$usernameUsuario,$passwordUsuario,$ciudadUsuario);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$usuarioDAO = new UsuarioDAO();
			$idUsuario = $_POST['idUsuario'];
			$errores = $usuarioDAO->borrarUsuario($idUsuario);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$usuarioDAO = new UsuarioDAO();
			$idUsuario = $_POST['idUsuario'];
			$nuevoNombreUsuario = $_POST['nuevoNombreUsuario'];
			$nuevoApellidoUsuario = $_POST['nuevoApellidoUsuario'];
			$nuevoSexoUsuario = $_POST['nuevoSexoUsuario'];
			$nuevoEmailUsuario = $_POST['nuevoEmailUsuario'];
			$nuevaEdadUsuario = $_POST['nuevaEdadUsuario'];
			$nuevoUsernameUsuario = $_POST['nuevoUsernameUsuario'];
			$nuevoPasswordUsuario = $_POST['nuevoPasswordUsuario'];
			$nuevaCiudadUsuario = $_POST['nuevaCiudadUsuario'];
			$errores = $usuarioDAO->editarUsuario($idUsuario,$nuevoNombreUsuario,$nuevoApellidoUsuario,$nuevoSexoUsuario,$nuevoEmailUsuario,$nuevaEdadUsuario,$nuevoUsernameUsuario,$nuevoPasswordUsuario,$nuevaCiudadUsuario);

			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>