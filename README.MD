� ����� .\components\sender.php, � ���������� ������ Sender, ������� 
��������� ���������� ��� �������� ��������: 


������:

	// "�������� ��������� www.mail.ru"

	private $smtp_host = 'smtp.mail.ru';       // smtp �������� ����������
	private $smtp_port = '465';                // SSL ���� ����������
	private $user      = "ivanovii";           // ��� ������������ ����������
	private $pass      = "123456";             // ������ ������������ ����������
        private $path_cert = ROOT."./cacert.pem";  // ���� � ����� ����������� OpenSSL
	private $domain    = "www.mail.ru";        // ����� ����������