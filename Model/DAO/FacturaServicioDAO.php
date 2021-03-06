<?php 

	include 'Conexion.php';

	class FacturaServicioDAO extends Conexion{

		public function ProvedorDAO(){
			$this->db=parent::Conexion();
		}



	
		public function listarFacturas(){
			$sql = "SELECT *,Cliente.nombre AS Cliente,formapago.descripcion AS FormaPago FROM facturaservicio
  					INNER JOIN Cliente ON facturaservicio.Cliente = cliente.idCliente 
  					INNER JOIN FormaPago ON facturaservicio.FormaPago = FormaPago.idFormaPago";
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

		public function listarCliente(){
			$sql = "SELECT * FROM Cliente";
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


		public function listarFormaPago(){
			$sql = "SELECT * FROM formapago";
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

		public function editarFactura($idFacturaServicio, $cliente, 
				$formaPago,$fecha){
			try{
				$sql = "UPDATE facturaservicio SET Cliente = ?, FormaPago = ?, Fecha = ? WHERE idFacturaServicio = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($cliente,$formaPago, $fecha, $idFacturaServicio));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarFactura($idFacturaServicio){
			try{
				$sql = "DELETE FROM facturaservicio WHERE idFacturaServicio = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idFacturaServicio));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearFactura($cliente, $formaPago, $fecha){
			try{
				$sql = "INSERT INTO facturaservicio VALUES(NULL,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($cliente, $formaPago, $fecha));
				$sql2 = "SELECT MAX( idFacturaServicio ) as idFacturaServicio FROM facturaservicio";
				$consulta2 = $this->db->prepare($sql2);
				$resultado2 = $consulta2->execute();
				$clientes = $consulta2->fetchall(PDO::FETCH_ASSOC);
				return $clientes;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

	}

 ?>