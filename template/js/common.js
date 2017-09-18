var dropZone = $('#dropZone'),
    maxFileSize = 1000000,
    files = 0; 

if (typeof(window.FileReader) == 'undefined') {
	dropZone.text('Не поддерживается браузером!');
        dropZone.addClass('error');
}

function errorMessage(){
	dropZone.text('Имеются файл(ы) не являющиеся файлами форматов jpeg, png, pdf, doc!');
	dropZone.addClass('error');
}
	
dropZone[0].ondragover = function() {
	dropZone.addClass('hover');
    	return false;
    	};
    
dropZone[0].ondragleave = function() {
    	dropZone.removeClass('hover');
	return false;
	};

dropZone[0].ondrop = function(event) {
        event.preventDefault();
        dropZone.removeClass('hover');
        dropZone.addClass('drop');
        $("#files_store").remove();

	files = event.dataTransfer.files;
        var flag = false;
	for (var i = 0; i < files.length; i++) {
 		flag = false;
		if (files[i].type == "image/png")  flag = true; 
		if (files[i].type == "image/jpeg") flag = true;
		if (files[i].type == "application/pdf") flag = true;
		if (files[i].name.indexOf(".doc") >= 0) flag = true;		
		if (flag == false ) {
			errorMessage();
			return false;
		}

		if (files[i].size > maxFileSize) {
			dropZone.text('Имеются файл(ы) слишком большого размера!');
        		dropZone.addClass('error');
        		return false;
   	 	}
 	}

	dropZone.text('Файлов готовых к передаче: ' + files.length);
}

function uploadProgress(event) {
    var percent = parseInt(event.loaded / event.total * 100);
    dropZone.text('Загрузка: ' + percent + '%');
}

window.onload = function () { 
			if(!window.FormData) {
				var div = ge('content');
				div.innerHTML = "Ваш браузер не поддерживает объект FormData";
				div.className = 'notSupport'; 
			}
	}

jQuery(document).ready(function(){
	var errorTxt = 'Ошибка отправки';
	jQuery("#sendform").validate({
		submitHandler: function(form){
			var form = document.forms.sendform,
			formData = new FormData(form),
			xhr = new XMLHttpRequest();
			
                        var CurrentFiles = formData.getAll('file[]');
			
       			var flag;

			for (var i = 0; i < CurrentFiles.length; i++) {
 				flag = false;
				if (CurrentFiles[i].type == "image/png")  flag = true; 
				if (CurrentFiles[i].type == "image/jpeg") flag = true;
				if (CurrentFiles[i].type == "application/pdf") flag = true;
				if (CurrentFiles[i].name.indexOf(".doc") >= 0) flag = true;		
				if (flag == false ) {
					errorMessage();
					return false;
				}

				if (CurrentFiles[i].size > maxFileSize) {
					dropZone.text('Имеются файл(ы) слишком большого размера!');
        				dropZone.addClass('error');
        				return false;
   	 			}
 			}
			
                        if (window.files !== undefined) {
				for (var i = 0; i < files.length; i++) {
  					formData.append('file[]', files[i]);
				}
			}
			
                        xhr.upload.addEventListener('progress', uploadProgress, false);
				
			xhr.open("POST", window.location.pathname + "components/send.php");
			
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4) {
					if(xhr.status == 200) {
						jQuery("#sendform").html('<p class="thank">Данные отправлены</p>');
					}
				} else {
					jQuery("#sendform").html('<p class="thank">' + errorTxt + '</p>');	
				}
    				
 			};
			//xhr.setRequestHeader('X-FILE-NAME', file.name);
			xhr.send(formData);
		}
	});
});

function sendSuccess(callback){
	jQuery(callback).find("form fieldset").html(thank);
	startClock();
}



