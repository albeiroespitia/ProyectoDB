<?php 

	include 'Conexion.php';

	class ServicioDAO extends Conexion{

		public function ServicioDAO(){
			$this->db=parent::Conexion();
		}

		public function listarServicio(){
			$sql = "SELECT *,servicio.descripcion as descripcionS FROM Servicio INNER JOIN TipoServicio ON Servicio.TipoServicio = TipoServicio.idTipoServicio";
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


		public function listarServiciosCatalogoEspecifico($idServicio){
			$sql = "SELECT *,servicio.descripcion as descripcionS FROM Servicio INNER JOIN TipoServicio ON Servicio.TipoServicio = TipoServicio.idTipoServicio WHERE servicio.idServicio = ?";
			$consulta = $this->db->prepare($sql);
			$resultado = $consulta->execute(array($idServicio));
			$provedores = $consulta->fetchall(PDO::FETCH_ASSOC);

			if($provedores == true){
				return $provedores;
			}else{
				return 0;
			}

			$consulta->closeCursor();

		}

	}

 ?>