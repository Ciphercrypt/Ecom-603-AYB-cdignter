<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require 'PHPMailer/PHPMailerAutoload.php';

class SendMail
{

    public $mail;

    public function __construct()
    {
		$this->mail = new PHPMailer; 
		$this->mail->isSMTP(); 
		// $this->mail->SMTPDebug = 2; 
		$this->mail->Debugoutput = 'html'; 
		$this->mail->Host = 'smtp.gmail.com'; 
		$this->mail->Port = 587; 
		$this->mail->SMTPSecure = 'tls'; 
		$this->mail->SMTPAuth = true; 
		$this->mail->Username = "pawansite7559@gmail.com"; 
		$this->mail->Password = "Pawan@7559";
		$this->mail->CharSet = 'UTF-8';
    }

    public function sendTo($toEmail, $recipientName, $subject, $msg)
    {
        $this->mail->setFrom('pawansite7559@gmail.com', 'My Name');
        $this->mail->addAddress($toEmail, $recipientName);
        //$this->mail->isHTML(true); 
        $this->mail->Subject = $subject;
        $this->mail->Body = $msg;
        if (!$this->mail->send()) {
            log_message('error', 'Mailer Error: ' . $this->mail->ErrorInfo);
            return false;
        }
        return true;
    }

}
