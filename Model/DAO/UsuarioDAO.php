<?php 

	include 'Conexion.php';

	class UsuarioDAO extends Conexion{

		public function UsuarioDAO(){
			$this->db=parent::Conexion();
		}



		public function Login($username,$password1){
			$sql = "SELECT userName, password,TipoUsuario FROM usuario WHERE userName=? AND password=?";
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

		public function listarUsuarios(){
			$sql = "SELECT *, Usuario.nombre as nombreCliente, Ciudad.nombre as nombreCiudad FROM Usuario INNER JOIN Ciudad ON Ciudad.idCiudad = Usuario.Ciudad";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute();
			$clientes = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($clientes == true){
				return $clientes;
			}else{
				return 0;
			}

			$consulta->closeCursor();

		}

		public function listarCiudadUsuario(){
			$sql = "SELECT * FROM Ciudad";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute();
			$clientes = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($clientes == true){
				return $clientes;
			}else{
				return 0;
			}

			$consulta->closeCursor();

		}

		public function editarUsuario($cc,$nombre,$apellido,$sexo,$email,$edad,$userName,$password,$ciudad){
			try{
				$sql = "UPDATE Usuario SET nombre = ?, apellido = ?, sexo = ?, email = ?, edad = ?, userName = ?, password = ?, ciudad = ? WHERE cc = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombre,$apellido,$sexo,$email,$edad,$userName,$password,$ciudad,$cc));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarUsuario($cc){
			try{
				$sql = "DELETE FROM Usuario WHERE cc = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($cc));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearUsuario($cc,$nombre,$apellido,$sexo,$email,$edad,$userName,$password,$ciudad){
			try{
				$sql = "INSERT INTO Usuario VALUES(?,?,?,?,?,?,?,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($cc,$nombre,$apellido,$sexo,$email,$edad,$userName,$password,1,$ciudad));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}





	}

 ?>