<?php 

	include 'Conexion.php';

	class FormaPagoDAO extends Conexion{

		public function FormaPagoDAO(){
			$this->db=parent::Conexion();
		}



		public function listarFormaPago(){
			$sql = "SELECT * FROM formapago";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute();
			$formapagos = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($formapagos == true){
				return $formapagos;
			}else{
				return 0;
			}

			$consulta->closeCursor();

		}

		public function editarFormaPago($idFormaPago,$descripcion){
			try{
				$sql = "UPDATE formapago SET descripcion = ? WHERE idFormaPago = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($descripcion,$idFormaPago));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarFormaPago($idFormaPago){
			try{
				$sql = "DELETE FROM formapago WHERE idFormaPago = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idFormaPago));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearFormaPago($descripcion){
			try{
				$sql = "INSERT INTO formapago VALUES(NULL,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($descripcion));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}





	}

 ?>