<?php 

	include 'Conexion.php';

	class DetalleFacCompraDAO extends Conexion{

		public function DetalleFacCompraDAO(){
			$this->db=parent::Conexion();
		}



		public function listarDetalleFacCompra(){
			$sql = "SELECT *,usuario.nombre AS nombreU, proovedor.nombre AS nombreP
					FROM FacturaCompra
					INNER JOIN usuario on FacturaCompra.usuario_cc = usuario.cc
					INNER JOIN proovedor ON  FacturaCompra.Proovedor = proovedor.idProovedor;";
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

		public function listarCcUsuario(){
			$sql = "SELECT cc,nombre FROM usuario";
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

	

		public function editarFacturaCompra($fecha,$idFacturaCompra, $idProovedor, $idUsuario){
			try{
				$sql = "UPDATE FacturaCompra SET fecha = ?,  Usuario_cc = ?, Proovedor = ? WHERE idFacturaCompra = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($fecha, $idUsuario, $idProovedor, $idFacturaCompra));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function borrarFacturaCompra($idFacturaCompra){
			try{
				$sql = "DELETE FROM FacturaCompra WHERE idFacturaCompra = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($idFacturaCompra));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

		public function crearFacturaCompra($fecha, $idUsuario, $idProovedor){
			try{
				$sql = "INSERT INTO FacturaCompra VALUES(NULL,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($fecha, $idUsuario, $idProovedor));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

	}

 ?>