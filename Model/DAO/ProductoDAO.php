<?php 

	include 'Conexion.php';

	class ProductoDAO extends Conexion{

		public function ProductoDAO(){
			$this->db=parent::Conexion();
		}



		public function listarProductos(){
			$sql = "SELECT *,proovedor.nombre AS nombreU, producto.nombre AS nombreP
					FROM producto
					INNER JOIN proovedor ON producto.proovedor = proovedor.idProovedor";
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

		public function listarProvedores(){
			$sql = "SELECT * FROM proovedor";
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
	

		public function editarProducto($idProducto,$nombre, $descripcion, $cantidad,$proovedor){
			try{
				$sql = "UPDATE producto SET nombre = ?, descripcion = ?, cantidad = ? , proovedor = ? WHERE idProducto = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombre, $descripcion, $cantidad, $proovedor, $idProducto));
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

		public function crearProducto($nombre, $descripcion, $cantidad, $provedor){
			try{
				$sql = "INSERT INTO producto VALUES(NULL,?,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombre, $descripcion, $cantidad, $provedor));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

	}

 ?>