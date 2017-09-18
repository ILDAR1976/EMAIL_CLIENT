<?php
define('ROOT',dirname(__FILE__));
include(ROOT.'/sender.php');

if ( isset( $_POST['sendMail'] ) ) {
	$email_from	 = substr( $_POST['email_from'], 0, 64 );
	$name	         = substr( $_POST['name'], 0, 64 );
	$email_to	 = substr( $_POST['email_to'], 0, 64 );
	$message         = substr( $_POST['message'], 0, 250 );

	if($_FILES)
	{
		$filepath = array();
		$filename = array();
		$file2    = array();
		$i = 0;
		foreach($_FILES["file"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$filename[$i][0] = $_FILES["file"]["tmp_name"][$key];
				$filename[$i][1] = $_FILES["file"]["name"][$key];
				$i++;
			}
		}
	}
 	
	$body = "Имя:\r\n".$name."\r\n\r\n";
	$body .= "E-mail:\r\n".$email_from."\r\n\r\n";
	$body .= "Текст сообщения:\r\n".$message; 
	send_mail($email_to, $body, $email_from, $filename);
}

function send_mail($to, $body, $email, $filename)
{
	$subject = 'Тестирование формы с прикреплением файла с адреса: '.$email;
	$boundary = "--".md5(uniqid(time())); 
	$headers = "From:".$email."\r\n";	 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .="Content-Type: multipart/mixed; boundary=\"".$boundary."\"\r\n";
	$multipart = "--".$boundary."\r\n";
	$multipart .= "Content-type: text/plain; charset=\"utf-8\"\r\n";
	$multipart .= "Content-Transfer-Encoding: quoted-printable\r\n\r\n";

	$body = $body."\r\n\r\n";
        $file = "";
	$multipart .= $body;
	foreach ($filename as $key => $value) {
		$fp = fopen($value[0], "r"); 
		$content = fread($fp, filesize($value[0]));
		fclose($fp);
		$file .= "--".$boundary."\r\n";
		$file .= "Content-Type: application/octet-stream\r\n";
		$file .= "Content-Transfer-Encoding: base64\r\n";
		$file .= "Content-Disposition: attachment; filename=\"".$value[1]."\"\r\n\r\n";
		$file .= chunk_split(base64_encode($content))."\r\n";
	}
	$multipart .= $file."--".$boundary."--\r\n";

        $mail = new Sender();
	$mail->smtp_mail($email, $to, $subject, $multipart, $headers);
}
?>