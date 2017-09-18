В файле .\components\sender.php, в переменных класса Sender, укажите 
параметры транспорта для почтовой рассылки: 


Пример:

	// "Почтовый транспорт www.mail.ru"

	private $smtp_host = 'smtp.mail.ru';       // smtp протокол транспорта
	private $smtp_port = '465';                // SSL порт транспорта
	private $user      = "ivanovii";           // имя пользователя трастпорта
	private $pass      = "123456";             // пароль пользователя транспорта
        private $path_cert = ROOT."./cacert.pem";  // путь к файлу сертификата OpenSSL
	private $domain    = "www.mail.ru";        // домен транспорта
