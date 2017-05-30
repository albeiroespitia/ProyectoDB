<?php 

	include 'Conexion.php';

	class FacturaDAO extends Conexion{

		public function FacturaDAO(){
			$this->db=parent::Conexion();
		}



	
		public function listarFacturas(){
			$sql = "SELECT *,Cliente.nombre AS Cliente,formapago.descripcion AS FormaPago FROM factura
  					INNER JOIN Cliente ON factura.Cliente = cliente.idCliente 
  					INNER JOIN FormaPago ON factura.FormaPago = FormaPago.idFormaPago";
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

		public function listarUsuario(){
			$sql = "SELECT * FROM Usuario";
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

		public function editarFactura($idFacturaServicio, $cliente, $usuarioCC, 
				$formaPago,$fecha){
			try{
				$sql = "UPDATE factura SET Cliente = ?, Usuario_cc = ?, FormaPago = ?, fecha = ? WHERE idFactura = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($cliente,$usuarioCC,$formaPago, $fecha, $idFacturaServicio));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarFactura($idFacturaServicio){
			try{
				$sql = "DELETE FROM factura WHERE idFactura = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idFacturaServicio));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearFactura($cliente, $usuarioCC, $formaPago, $fecha){
			try{
				$sql = "INSERT INTO factura VALUES(NULL,?,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($cliente, $usuarioCC, $formaPago, $fecha));
				$sql2 = "SELECT MAX( idFactura ) as idFactura FROM factura";
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