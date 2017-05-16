<?php 

	include 'Conexion.php';

	class UsuarioDAO extends Conexion{

		public function UsuarioDAO(){
			$this->db=parent::Conexion();
		}



		public function Login($username,$password1){
			$sql = "SELECT nombreUsuario, password,TipoUsuario FROM usuario WHERE nombreUsuario=? AND password=?";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute(array($username,$password1));
			$usuarios = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($usuarios == true){
				return $usuarios;
			}else{
				return 0;
			}

			$consulta->closeCursor();

		}





	}

 ?>