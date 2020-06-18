
// Индикация загрузки

function DisplayUpload ()

{
	let element = document.getElementById('result');
	let file_value = document.getElementById('userfile').value;
	if (file_value != '')
    {
	element.innerHTML = "<b><font size='2' color='#4285F4'>Ждите! Производится загрузка файла... </font></b><img src='../img/loading.gif' width='35px'>";
    }
}


// Сброс полей формы

function ResetMyForm() {

	document.getElementById('userfile').value='';
	document.getElementById('email').value='';
	let element = document.getElementById('result');
	element.innerHTML = "";

}


// jQuery JSON for email

function Domain_Check ()
		{
			let str = document.getElementById('email').value;
			let from = str.search('@');		// находим символ @
			from++;
			if (from == 0)
				{
					swal ( "Неверный адрес!" ,  "Проверьте правильность ввода E-mail..." ,  "error" )
					// alert ("Проверьте правильность ввода E-mail!");
				}
			else
			{
				var to = str.length;							// длина поля e-mail
				$domain = str.substring(from,to);				// выризаем значение домена - после @
				// alert($domain);

                $.ajax({
                    type: 'GET',
                    url: '/domain_find/' + $domain,
                    //data: $domain,
                    success: function(result){
                        //alert(result);
                        if (result == -1) {
                            swal ( "Неверно указан домен!" ,  "Сообщение не может быть отправлено на этот почтовый домен! Обратитесь к администратору..." ,  "error" )
                            $("#submit").setAttribute(disabled); // Блокируем кнопку оправки !
                        }
                        else
                        {
                            $('#submit').removeAttr("disabled"); // Разбокируем кнопку отправки !
                        }
                    }
                });


			}
		}






