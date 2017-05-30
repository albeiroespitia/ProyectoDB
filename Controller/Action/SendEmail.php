<?php
// the message
include('../../Model/DAO/ProyectoDAO.php');
require "phpmailer/class.phpmailer.php";

if(isset($_POST['tipo'])){
	$idProyectoSelected = $_POST['idProyectoSelected'];
	$habitacionObject = new ProyectoDAO();
	$array_id = $habitacionObject->listarProyectosCatalogoEspecifico($idProyectoSelected);
	$emailC = $_POST['emailCliente'];
	$nombreC = $_POST['nombreCliente'];

	foreach ($array_id as $row) {
		$descripcionP = $row['descripcionP'];
		$empresaP = $row['empresa'];
	}


	$msg = "Hola ".$nombreC." <br/><br/> Contrataste el siguiente proyecto: <br/>Descripcion: ".$descripcionP."<br/>Empresa: ".$empresaP."<br/><br/> Si no contrato ningun proyecto porfavor haga caso omiso a este correo";

	// use wordwrap() if lines are longer than 70 characters
	$mail = new PHPMailer;

	$mail->IsSMTP();
		  
          //permite modo debug para ver mensajes de las cosas que van ocurriendo
          //$mail->SMTPDebug = 2;

		  //Debo de hacer autenticación SMTP
          $mail->SMTPAuth = true;

		  //indico el servidor de Gmail para SMTP
          $mail->Host = "smtp.gmail.com";

          
          $mail->SMTPSecure = "ssl";
		  //indico el puerto que usa Gmail
          $mail->Port = 465;

		  //indico un usuario / clave de un usuario de gmail
          $mail->Username = "albeiroespitiasierra@gmail.com";
          $mail->Password = "DEVELOPisamazingg";
       
          $mail->From = "albeiroespitiasierra@gmail.com";
        
          $mail->FromName = "Proyecto Nuevo";
        
          $mail->Subject = 'Proyecto Nuevo';
        
          $mail->addAddress($emailC,'Proyecto Nuevo');
        
          $mail->MsgHTML($msg);
        

    
        if($mail->Send()){
          	echo "Exito";
    	}else{
    		echo "Error";
   	 	}
	
}

?>