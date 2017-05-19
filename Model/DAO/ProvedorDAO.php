<?php 

	include 'Conexion.php';

	class ProvedorDAO extends Conexion{

		public function ProvedorDAO(){
			$this->db=parent::Conexion();
		}



		public function listarProvedores(){
			$sql = "SELECT *,ciudad.nombre AS nombreC,tipoproducto.descripcion AS descripcionT,proovedor.nombre AS nombreP FROM proovedor
  					INNER JOIN ciudad ON proovedor.Ciudad = ciudad.idCiudad 
  					INNER JOIN tipoproducto ON proovedor.TipoProducto = tipoproducto.idTipoProducto";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute();
			$provedores = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($provedores == true){
				return $provedores;
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

		public function listarTipoProductoProovedor(){
			$sql = "SELECT * FROM tipoProducto";
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

		public function editarProvedor($idProovedor, $nombreProvedor, $emailProvedor, $telefonoProvedor, $ciudadProvedor, $tipoProducto){
			try{
				$sql = "UPDATE proovedor SET nombre = ?, email = ?, telefono = ?, Ciudad = ?, tipoProducto = ? WHERE idProovedor = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombreProvedor,$emailProvedor,$telefonoProvedor, $ciudadProvedor, $tipoProducto, $idProovedor));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarProveedor($idProovedor){
			try{
				$sql = "DELETE FROM proovedor WHERE idProovedor = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idProovedor));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearProvedor($nombreProvedor, $emailProvedor, $telefonoProvedor, $ciudadProvedor,$tipoProducto){
			echo $nombreProvedor.' ';
			echo $emailProvedor.' ';
			echo $telefonoProvedor.' ';
			echo $ciudadProvedor.' ';
			echo $tipoProducto.' ';
			try{
				$sql = "INSERT INTO proovedor VALUES(NULL,?,?,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombreProvedor, $emailProvedor, $telefonoProvedor,     
					$ciudadProvedor, $tipoProducto));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

	}

 ?>