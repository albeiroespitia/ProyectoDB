<?php 

	include 'Conexion.php';

	class ProyectoDAO extends Conexion{

		public function ProyectoDAO(){
			$this->db=parent::Conexion();
		}



		public function listarProyecto(){
			$sql = "select *,usuario.nombre
					FROM proyecto
					inner join usuario on proyecto.usuario_cc = usuario.cc";
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

		public function crearImagen($idProyecto){
			try{
				$sql = "INSERT INTO imagenproyecto VALUES(NULL,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array('Default','default.jpg',$idProyecto));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();
		}

		public function lastRecord(){
			try{
				$sql = "SELECT idProyecto FROM proyecto ORDER BY idProyecto DESC LIMIT 1";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute();
				$provedores = $consulta->fetchall(PDO::FETCH_ASSOC);
				return $provedores;
			}catch (PDOException $e){
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

		public function crearProyecto($descripcion, $empresa, $usuario){
			try{
				$sql = "INSERT INTO proyecto VALUES(NULL,?,?,?)";
				$consulta = $this->db->prepare($sql);
				$resultado = $consulta->execute(array($descripcion, $empresa, $usuario));
				return 1;
			}catch (PDOException $e){
				return 0;
			}

			$consulta->closeCursor();

		}

	}

 ?>