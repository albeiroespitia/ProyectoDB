<?php 

	include 'Conexion.php';

	class UsuarioDAO extends Conexion{

		public function UsuarioDAO(){
			$this->db=parent::Conexion();
		}



		public function Login($username,$password1){
			$sql = "SELECT nombreUsuario, password FROM usuario WHERE nombreUsuario=?";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute(array($username,$password1));
			$usuarios = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($usuarios == true){
				return $usuarios;
			}else{
				echo 'Error';
			}

			$consulta->closeCursor();

		}





	}

 ?>