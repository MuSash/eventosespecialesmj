<?php

require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

/* class contacto extends Controlador{

    public function __construct()
	{
        //Parent es para usar los metodos de la Clase Padre es decir de la Clase Principal
        //En este caso es el archivo Controlador.php
        parent::__construct();
	}   

    //Funcion que muestra el contenido de la pagina
	/* public function renderizar($vista="contacto")
	{
        //Invocamos al metodo mostrarVista del controlador
        $this->cargarModelo($vista);
	}
 */
    //Funcion para enviar correos electronicos a los correos de la empresa
    //Enviados desde un formulario
    /*public function enviarcorreo()
	{ */
       
           $res= ["msg"=>"¡Ocurrio un error inesperado!","type"=>"error"];

           if (isset($_POST["nombre"]) && isset($_POST['direccion']) && isset($_POST['email']) && isset($_POST['telefono']) && isset($_POST['asunto']) && isset($_POST['mensaje']) ) {
               $Nombre   = $_POST['nombre'];
               $Direccion  = $_POST['dirección'];
               $Email    = $_POST['email'];
               $Telefono = $_POST['telefono'];
               $Asunto = $_POST['asunto'];
               $Mensaje  = $_POST['mensaje'];

               if ($Nombre=='' || $Direccion || $Email=='' || $Telefono=='' || !is_numeric($Telefono) || strlen($Telefono)!=9 || $Mensaje==''){ 
                   $res['msg']="Datos erróneos, porfavor vuelva a llenar los campos";

               }else{
                   
                   $mail = new PHPMailer\PHPMailer\PHPMailer();
                   $mail->setFrom($Email,$Nombre);
                   $mail->addAddress('mjeventosespeciales@gmail.com'); //digi.mediamkt@gmail.com - correo a la que le llegaran los correos 
                   $mail->addReplyTo($Email,$Nombre);
               
                   // Aqui van los datos que apareceran en el correo que reciba  
                   $mail->WordWrap = 50; 
                   $mail->IsHTML(true);      
                   $mail->Subject='Enviado por '.$Nombre;
                   $mail->Body="Nombre: ". $Nombre . ".<br>
                               Correo: ". $Email .".<br>
                               Telefono: ". $Telefono . ".<br>
                               Mensaje: ". $Mensaje."<br><br>
                               <strong>Mensaje del Desarrollador</strong>: Click al boton ''Responder'' para escribir un mensaje a ". $Email.".";

                   // Datos del servidor SMTP
                   $mail->IsSMTP();
                   $mail->CharSet = 'UTF-8';
                   $mail->SMTPAuth = true;
                   $mail->SMTPSecure = "ssl";
                   $mail->Host = "smtp.gmail.com"; //box5759.bluehost.com // servidor smtp, esto lo puedes dejar igual
                   $mail->Port = 465; //puerto smtp de gmail, tambien lo puedes dejar igual
                   $mail->Username = 'mjeventosespeciales@gmail.com';//'postula@neonhouseled.com';  //tami@ghx.umd.mybluehost.me // en local, tu correo gmail // en servidor, nombre usuario
                   $mail->Password = 'exrqhkljmsrzhyom';//'n37qO#Ua7Dl%'; //%)Yj[w_z?dx$ //en local, tu contrasena gmail //en servidor, contraseña de usuario)
                   
                   if ($mail->Send()){
                   $res['msg'] = "¡Muchas gracias por contactarnos!";
                   $res['type'] = "success";
                   header('Location: https://www.eventosespecialesmj.com/');
                   exit();
                   
                   }else{
                       $res['msg'] = "¡Ocurrió un error inesperado!";
                   }
               }
               echo json_encode($res);
           }else{
               echo json_encode($res);
           }
    
        
/*     }

}
 */
?>