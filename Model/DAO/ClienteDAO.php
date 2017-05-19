<?php 

	include 'Conexion.php';

	class ClienteDAO extends Conexion{

		public function ClienteDAO(){
			$this->db=parent::Conexion();
		}



		public function listarClientes(){
			$sql = "SELECT *, Cliente.nombre as nombreCliente, Ciudad.nombre as nombreCiudad FROM Cliente INNER JOIN Ciudad ON Ciudad.idCiudad = Cliente.Ciudad";
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

		public function listarCiudadCliente(){
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

		public function editarCliente($idCliente,$nombre,$telefono,$email,$ciudad){
			try{
				$sql = "UPDATE cliente SET nombre = ?, telefono = ?, email = ?, ciudad = ? WHERE idCliente = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombre,$telefono,$email,$ciudad,$idCliente));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarCliente($idCliente){
			try{
				$sql = "DELETE FROM cliente WHERE idCliente = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idCliente));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearCliente($nombre,$telefono,$email,$ciudad){
			try{
				$sql = "INSERT INTO cliente VALUES(NULL,?,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombre,$telefono,$email,$ciudad));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}



	}

 ?>