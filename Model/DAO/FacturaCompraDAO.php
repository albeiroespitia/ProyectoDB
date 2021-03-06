<?php 

	include 'Conexion.php';

	class FacturaCompraDAO extends Conexion{

		public function FacturaCompraDAO(){
			$this->db=parent::Conexion();
		}



		public function listarFacturaCompra(){
			$sql = "SELECT *,usuario.nombre AS nombreU, proovedor.nombre AS nombreP,formapago.descripcion AS descripcionF
					FROM FacturaCompra
					INNER JOIN usuario on FacturaCompra.usuario_cc = usuario.cc
					INNER JOIN proovedor ON  FacturaCompra.Proovedor = proovedor.idProovedor
					INNER JOIN formapago ON  FacturaCompra.FormaPago = formapago.idFormaPago;";
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

		public function listarFormaPago(){
			$sql = "SELECT * from formapago";
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

	

		public function editarFacturaCompra($fecha,$idFacturaCompra, $idProovedor, $idUsuario,$idFormaPago){
			try{
				$sql = "UPDATE FacturaCompra SET fecha = ?,  Usuario_cc = ?, Proovedor = ? , FormaPago = ? WHERE idFacturaCompra = ?";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($fecha, $idUsuario, $idProovedor, $idFormaPago, $idFacturaCompra));
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

		public function crearFacturaCompra($fecha, $idUsuario, $idProovedor,$idFormaPago){
			try{
				$sql = "INSERT INTO FacturaCompra VALUES(NULL,?,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($fecha, $idUsuario, $idProovedor,$idFormaPago));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

	}

 ?>