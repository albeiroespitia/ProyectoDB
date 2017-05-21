<?php 

	include 'Conexion.php';

	class ProductoDAO extends Conexion{

		public function ProductoDAO(){
			$this->db=parent::Conexion();
		}



		public function listarProductos(){
			$sql = "SELECT *,usuario.nombre AS nombreU, producto.nombre AS nombreP
					FROM producto
					INNER JOIN usuario ON producto.usuario_cc = usuario.cc";
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

		public function borrarProyecto($idProyecto){
			try{
				$sql = "DELETE FROM proyecto WHERE idProyecto = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idProyecto));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearProducto($nombre, $descripcion, $cantidad, $usuario){
			try{
				$sql = "INSERT INTO producto VALUES(NULL,?,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombre, $descripcion, $cantidad, $usuario));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

	}

 ?>