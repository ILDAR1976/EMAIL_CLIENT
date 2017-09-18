¬ файле .\components\sender.php, в переменных класса Sender, укажите 
параметры транспорта дл€ почтовой рассылки: 


ѕример:

	// "ѕочтовый транспорт www.mail.ru"

	private $smtp_host = 'smtp.mail.ru';       // smtp протокол транспорта
	private $smtp_port = '465';                // SSL порт транспорта
	private $user      = "ivanovii";           // им€ пользовател€ трастпорта
	private $pass      = "123456";             // пароль пользовател€ транспорта
        private $path_cert = ROOT."./cacert.pem";  // путь к файлу сертификата OpenSSL
	private $domain    = "www.mail.ru";        // домен транспорта
