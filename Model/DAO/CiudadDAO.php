<?php 

	include 'Conexion.php';

	class CiudadDAO extends Conexion{

		public function CiudadDAO(){
			$this->db=parent::Conexion();
		}



		public function listarCiudades(){
			$sql = "SELECT * FROM ciudad";
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

		public function editarCiudad($idCiudad,$nombre){
			try{
				$sql = "UPDATE ciudad SET nombre = ? WHERE idCiudad = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombre,$idCiudad));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarCiudad($idCiudad){
			try{
				$sql = "DELETE FROM ciudad WHERE idCiudad = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idCiudad));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearCiudad($nombreCiudad){
			try{
				$sql = "INSERT INTO ciudad VALUES(NULL,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($nombreCiudad));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}





	}

 ?>