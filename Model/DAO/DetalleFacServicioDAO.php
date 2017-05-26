<?php 

	include 'Conexion.php';

	class DetalleFacServicioDAO extends Conexion{

		public function DetalleFacServicioDAO(){
			$this->db=parent::Conexion();
		}



		public function listarDetalleFacVenta(){
			$sql = "SELECT * FROM detalleventaservicio INNER JOIN Servicio ON detalleventaservicio.Servicio = Servicio.idServicio";
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

		public function listarFacturaServicio(){
			$sql = "SELECT * FROM FacturaServicio";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute();
			$clientes = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($clientes == true){
				return $clientes;
			}else{
				return 0;
			}
		}

		public function listarServicios(){
			$sql = "SELECT * FROM servicio";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute();
			$clientes = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($clientes == true){
				return $clientes;
			}else{
				return 0;
			}
		}

			

	

		public function editarDetallefacCompra($idProducto, $facturaCompra, $producto, $cantidad, $valor){
			try{
				$sql = "UPDATE detallefaccompra SET Producto = ? , cantidad = ?, valor = ?  WHERE Producto = ? and FacturaCompra = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($producto, $cantidad, $valor, $idProducto, $facturaCompra));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarDetalleFacCompra($idProducto,$detallefactura){
			try{
				$sql = "DELETE FROM detallefaccompra WHERE producto = ? and FacturaCompra = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idProducto,$detallefactura));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearDetalleFacServicio($facturaServicio, $Servicio, $horas){
			try{
				$sql = "INSERT INTO detalleventaservicio VALUES(?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($facturaServicio, $Servicio, $horas));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}


	}

 ?>