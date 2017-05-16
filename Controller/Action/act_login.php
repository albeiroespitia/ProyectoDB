<?php 

	include '../../Model/DAO/UsuarioDAO.php';

	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password1 = $_POST['password'];

		$usuarioDAO = new UsuarioDAO();
		$usuarios = $usuarioDAO->Login($username,$password1);

		if($usuarios == 0){
			echo 'Error';

		}else{

			session_start();

			foreach ($usuarios as $u) {
				$fila=$u;		
			};

			if($fila['TipoUsuario']==1){
				$_SESSION['tipoUsuario'] = 'ingeniero';
				echo 'ingeniero';
			}else if($fila['TipoUsuario']==2){
				$_SESSION['tipoUsuario'] = 'administrador';
				echo 'administrador';
			}			

		}

	}




 ?>