<?php 

	include 'Conexion.php';

	class ProductoDAO extends Conexion{

		public function ProductoDAO(){
			$this->db=parent::Conexion();
		}



		public function listarProductos(){
			$sql = "SELECT *, producto.nombre AS nombreP
					FROM producto";
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

		public function listarProductosCatalogo(){
			$sql = "SELECT *,producto.descripcion as descripcionP FROM detallefaccompra INNER JOIN producto ON detallefaccompra.producto = producto.idProducto INNER JOIN imagenproducto ON producto.idProducto = imagenproducto.idProducto WHERE activa = ?";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute(array(1));
			$provedores = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($provedores == true){
				return $provedores;
			}else{
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearImagen($idProducto){
			try{
				$sql = "INSERT INTO imagenproducto VALUES(NULL,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array('Default','default.jpg',$idProducto));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();
		}

		public function lastRecord(){
			try{
				$sql = "SELECT idProducto FROM producto ORDER BY idProducto DESC LIMIT 1";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute();
				$provedores = $consulta->fetchall(PDO::FETCH_ASSOC);
				return $provedores;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();
		}
	

		public function editarProducto($idProducto,$nombre, $descripcion, $cantidad){
			try{
				$sql = "UPDATE producto SET nombre = ?, descripcion = ?, cantidad = ? WHERE idProducto = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombre, $descripcion, $cantidad, $idProducto));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarProducto($idProducto){
			try{
				$sql = "DELETE FROM producto WHERE idProducto = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idProducto));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearProducto($nombre, $descripcion, $cantidad){
			try{
				$sql = "INSERT INTO producto VALUES(NULL,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombre, $descripcion, $cantidad));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		

	}

 ?>