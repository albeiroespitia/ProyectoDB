<?php 

	include 'Conexion.php';

	class ImagenProyectoDAO extends Conexion{

		public function ImagenProyectoDAO(){
			$this->db=parent::Conexion();
		}



		public function listarImagenes(){
			$sql = "SELECT idImagenProyecto,imagenproyecto.descripcion AS descripcionI,imagen,proyecto.idProyecto,proyecto.descripcion AS nombreP FROM imagenproyecto INNER JOIN proyecto ON imagenproyecto.idProyecto = proyecto.idProyecto";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute();
			$ciudades = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($ciudades == true){
				return $ciudades;
			}else{
				return 0;
			}

			$consulta->closeCursor();

		}

		public function editarImagen($idImagenProyecto,$imagen,$descripcion,$idProducto){
			$sql='UPDATE imagenproyecto SET descripcion = ?,imagen = ?,idProyecto = ? WHERE idImagenProyecto = ?';
			$consulta = $this->db->prepare($sql);
			$respuesta= $consulta->execute(array($descripcion,$imagen,$idProducto,$idImagenProyecto));
			$consulta->closeCursor();

			if($respuesta==true){
				echo 'EDICION EXITOSA!!';
			}else{
				echo 'ERROR AL EDITAR!!';
			}
		}

		public function borrarImagen($idImagenProyecto){
			try{
				$sql = "DELETE FROM imagenproyecto WHERE idImagenProyecto = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idImagenProyecto));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function listarProductos(){
			$sql = "SELECT * FROM proyecto";
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

		public function crearImagen($descripcion,$idProducto,$imagen){
			try{
				$sql = "INSERT INTO imagenproyecto VALUES(NULL,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($descripcion,$imagen,$idProducto));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();
		}





	}

 ?>