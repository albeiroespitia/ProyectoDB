<?php 

	include '../../Model/DAO/UsuarioDAO.php';

	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$password1 = $_POST['password'];

		$usuarioDAO = new UsuarioDAO();
		$usuarios = $usuarioDAO->Login($username,$password1);
		echo 'Usuario Correct';

	}




 ?>