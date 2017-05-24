<?php 

	include 'Conexion.php';

	class DetalleFacDAO extends Conexion{

		public function DetalleFacDAO(){
			$this->db=parent::Conexion();
		}



		public function listarDetalleFacDAO(){
			$sql = "SELECT *,detallefac.cantidad as cantidadD, producto.idProducto as idProducto
					FROM detallefac
					INNER JOIN producto ON detallefac.producto = producto.idproducto
                    INNER JOIN factura ON detallefac.Factura = factura.idFactura";
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
		}

			public function listarProductoEditar(){
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
			$sql = "SELECT idFactura FROM factura";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute();
			$clientes = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($clientes == true){
				return $clientes;
			}else{
				return 0;
			}
		}

		public function listarFacturaCompraEditar(){
			$sql = "SELECT idFactura FROM factura";
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

	

		public function editarDetallefacCompra($idProducto, $factura, $producto, $cantidad, $valor){
			try{
				$sql = "UPDATE detallefac SET Producto = ? , cantidad = ?, valor = ?  WHERE Producto = ? and factura = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($producto, $cantidad, $valor, $idProducto, $factura));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarDetalleFacCompra($idProducto,$factura){
			try{
				$sql = "DELETE FROM detallefac WHERE producto = ? and factura = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idProducto,$factura));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearDetalleFacCompra($producto, $factura, $cantidad,$valor){
			try{
				$sql = "INSERT INTO detallefac VALUES(?,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($factura,$producto, $cantidad,$valor));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

	}

 ?>