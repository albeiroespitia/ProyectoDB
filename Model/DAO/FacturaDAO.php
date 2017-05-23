<?php 

	include 'Conexion.php';

	class FacturaDAO extends Conexion{

		public function FacturaDAO(){
			$this->db=parent::Conexion();
		}


		public function listarFactura(){
			$sql = "SELECT *,usuario.nombre AS nombreU, cliente.nombre AS nombreP,formapago.descripcion AS descripcionF
					FROM Factura
					INNER JOIN usuario on Factura.usuario_cc =- usuario.cc
					INNER JOIN cliente ON  Factura.cliente = cliente.idCliente
					INNER JOIN formapago ON  Factura.FormaPago = formapago.idFormaPago;";
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

		public function listarFormaPago(){
			$sql = "SELECT * from formapago";
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

		public function listarClientes(){
			$sql = "SELECT * FROM cliente";
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


 ?>