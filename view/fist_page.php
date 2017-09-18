<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />

		<title>The test project</title>

		<link rel="stylesheet" href="template/css/style.css">
	</head>        

	<body>
<form action="#" method="post" id="sendform" enctype="multipart/form-data">
  <fieldset>
    <h3>Форма заказа</h3>
    <p>
      <label>E-mail Отаправителя*:</label>
      <input name="email_from" value="" size="40" type="email_from" />
    </p>

    <p>
      <label>Имя*:</label>
      <input name="name" value="" size="40" type="text" class="required" />
    </p>

    <p>
      <label>E-mail Получателя*:</label>
      <input name="email_to" value="" size="40" type="email_to" />
    </p>
    
    <p>
      <label>Текстовое сообщение:</label>
      <textarea name="message" cols="40" rows="10" /> </textarea>
    </p>

    <p>
      <label>Прикрепить файл:</label>
      <input id="files_store" name="file[]" value="1" size="40" type="file" multiple />
    </p>

    <div name="drop_files" align="left" id="dropZone">
        Для загрузки, перетащите файл сюда.
    </div>
    
    <input value="Отправить" name="sendMail" type="submit" />
   </fieldset>
</form>
	<script type="text/javascript" src="template/libs/jquery-2.2.4.js"></script>
        <script type="text/javascript" src="template/libs/jquery.validate.js"></script>
        <script type="text/javascript" src="template/js/common.js"></script>

</body>

</html>