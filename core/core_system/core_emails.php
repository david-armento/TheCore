<?php
//Enviamos 1 email
function send_email($destinatario,$asunto,$mensaje,$header='')
{
	require_once(_PATH_."core/core_clases/class.phpmailer.php");
	
	$destinatario = $destinatario; //Prueba
	
	$mail = new PHPMailer();
	$mail->IsSMTP();                       					
	$mail->Host = _SMTP_SERVER_;     		
	$mail->SMTPAuth = true;  
	
	$puerto[0] = 25;
	$puerto[1] = 587;
	   		   					
	$mail->Port = _SMTP_PORT_;
	$mail->SetFrom(_SMTP_USER_, _TITULO_);             					
	$mail->Username = _SMTP_USER_;  
	$mail->Password = _SMTP_PASSWORD_; 							
	$mail->SetLanguage("es");
	$mail->CharSet ="utf-8";
	$mail->WordWrap = 50;     								
	$mail->IsHTML(true);      	
	$mail->AltBody = "";
	$mail->AddAddress($destinatario, _TITULO_);
	$mail->Subject = $asunto;
	$mail->Body = $mensaje;
	$mail->From = _SMTP_USER_;
	$mail->FromName = _TITULO_;
	
	if( !$mail->Send() ) {
		return false;
	}
	else {
		return true;	
	}
}
?>