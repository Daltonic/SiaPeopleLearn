<?php 
require_once "core/third_party/PHPMailer/class.phpmailer.php";
require_once "core/third_party/PHPMailer/class.phpmaileroauth.php";
require_once "core/third_party/PHPMailer/class.phpmaileroauthgoogle.php";
require_once "core/third_party/PHPMailer/class.smtp.php";
require_once "core/third_party/PHPMailer/class.pop3.php";
class mail{
	
	function __construct(){
		$this->mailer= new PHPMailer();
		$this->mailer->setFrom(DEFAULTSENDER, DEFAULTSENDERNAME);
		$this->mailer->addReplyTo(DEFAULTSENDER, DEFAULTSENDERNAME);
		$this->mailer->SMTPDebug = 0;
		$this->mailer->isHTML(true);
	}
	public function set_sender($sender,$senderName){
		$this->mailer->setFrom($sender, $senderName);
	}

	public function set_reply($sender,$senderName){
		$this->mailer->addReplyTo($sender, $senderName);
	}
	public function add_attachment($path){
		$mail->addAttachment($path);
	}

	public function set_smtp($host,$username,$password,$secure="tls",$port=587){
		$this->mailer->Host=$host;
		$this->mailer->isSMTP();

		$this->mailer->SMTPAuth=true;
		$this->mailer->Username=$username;
		$this->mailer->Password=$password;
		$this->mailer->SMTPSecure=$secure;
		$this->mailer->Port=$port;// 465 for ssl
	}

	public function send($subject,$body,$address){
		$this->mailer->Subject=$subject;
		$this->mailer->Body=$body;
		$this->mailer->addAddress($address);
		$this->mailer->send();
	}

	public function sendMulti($subject,$body,$addresses){
		$this->mailer->Subject=$subject;
		$this->mailer->Body=$body;
		
		foreach ($addresses as $address) {
			$this->mailer->addAddress($address);
		}

		$this->mailer->send();
	}

}

?>