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
			$sql = "SELECT idFacturaCompra FROM FacturaCompra";
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

		public function crearDetalleFacCompra($producto, $facturacompra, $cantidad,$valor){
			try{
				$sql = "INSERT INTO detallefaccompra VALUES(?,?,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($producto, $facturacompra, $cantidad,$valor,0));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function agregarAlCatalogo($idProducto,$idFacturaCompra){
			try{
				$sql = "UPDATE DetalleFacCompra SET activa = ? WHERE Producto = ? AND FacturaCompra = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array(1,$idProducto,$idFacturaCompra));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function eliminarDelCatalogo($idProducto,$idFacturaCompra){
			try{
				$sql = "UPDATE DetalleFacCompra SET activa = ? WHERE Producto = ? AND FacturaCompra = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array(0,$idProducto,$idFacturaCompra));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function listarProductoIngeniero($idUsuario){
			try{
				$sql = "SELECT detallefaccompra.Producto,detallefaccompra.FacturaCompra,detallefaccompra.cantidad,detallefaccompra.valor,producto.nombre,imagenproducto.imagen FROM detallefaccompra INNER JOIN producto ON detallefaccompra.producto = producto.idProducto INNER JOIN imagenproducto ON producto.idProducto = imagenproducto.idProducto INNER JOIN FacturaCompra ON detallefaccompra.FacturaCompra = FacturaCompra.idFacturaCompra WHERE Usuario_cc = ? AND activa = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idUsuario,0));
				$clientes = $consulta->fetchall(PDO::FETCH_ASSOC);
				return $clientes;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function listarProductoIngenieroBorrar($idUsuario){
			try{
				$sql = "SELECT detallefaccompra.Producto,detallefaccompra.FacturaCompra,detallefaccompra.cantidad,detallefaccompra.valor,producto.nombre,imagenproducto.imagen FROM detallefaccompra INNER JOIN producto ON detallefaccompra.producto = producto.idProducto INNER JOIN imagenproducto ON producto.idProducto = imagenproducto.idProducto INNER JOIN FacturaCompra ON detallefaccompra.FacturaCompra = FacturaCompra.idFacturaCompra WHERE Usuario_cc = ? AND activa = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idUsuario,1));
				$clientes = $consulta->fetchall(PDO::FETCH_ASSOC);
				return $clientes;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}


	}

 ?>