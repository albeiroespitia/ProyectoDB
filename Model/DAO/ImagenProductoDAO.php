<?php 

	include 'Conexion.php';

	class ImagenProductoDAO extends Conexion{

		public function ImagenProductoDAO(){
			$this->db=parent::Conexion();
		}



		public function listarImagenes(){
			$sql = "SELECT idImagenProducto,imagenproducto.descripcion AS descripcionI,imagen,producto.idProducto,producto.nombre AS nombreP FROM imagenproducto INNER JOIN producto ON imagenproducto.idProducto = producto.idProducto";
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

		public function editarImagen($idImagenProducto,$imagen,$descripcion,$idProducto){
			$sql='UPDATE imagenproducto SET descripcion = ?,imagen = ?,idProducto = ? WHERE idImagenProducto = ?';
			$consulta = $this->db->prepare($sql);
			$respuesta= $consulta->execute(array($descripcion,$imagen,$idProducto,$idImagenProducto));
			$consulta->closeCursor();

			if($respuesta==true){
				echo 'EDICION EXITOSA!!';
			}else{
				echo 'ERROR AL EDITAR!!';
			}
		}

		public function borrarImagen($idImagenProducto){
			try{
				$sql = "DELETE FROM imagenproducto WHERE idImagenProducto = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idImagenProducto));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function listarProductos(){
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

		public function crearImagen($descripcion,$idProducto,$imagen){
			try{
				$sql = "INSERT INTO imagenproducto VALUES(NULL,?,?,?)";
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