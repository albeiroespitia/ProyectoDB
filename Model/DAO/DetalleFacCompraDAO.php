<?php 

	include 'Conexion.php';

	class DetalleFacCompraDAO extends Conexion{

		public function DetalleFacCompraDAO(){
			$this->db=parent::Conexion();
		}



		public function listarDetalleFacCompra(){
			$sql = "SELECT *,detallefaccompra.cantidad as cantidadD, producto.idProducto as idProducto
					FROM detallefaccompra
					INNER JOIN producto ON detallefaccompra.producto = producto.idproducto
                    INNER JOIN facturacompra ON detallefaccompra.FacturaCompra = facturacompra.idFacturaCompra";
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

		public function listarProducto(){
			$sql = "SELECT * FROM producto";
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
				public function listarFacturaCompra(){
			$sql = "SELECT idFacturaCompra FROM FacturaCompra";
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

	

		public function editarProyecto($idProyecto,$descripcion, $empresa, $usuario){
			try{
				$sql = "UPDATE proyecto SET descripcion = ?, empresa = ?, usuario_cc = ? WHERE idProyecto = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($descripcion, $empresa, $usuario, $idProyecto));
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

		public function crearDetalleFacCompra($producto, $facturacompra, $cantidad,$valor){
			try{
				$sql = "INSERT INTO detallefaccompra VALUES(?,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($producto, $facturacompra, $cantidad,$valor));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

	}

 ?>