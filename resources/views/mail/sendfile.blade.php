<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Внимание! Для Вас есть новый файл!</title>
</head>
<body>

<p>Здравствуйте!<br><br>Для Вас есть новый файл! Файл помещён на обменник: <?= date('d.m.Y H:s:i', time()) ?>
<br><br><b><a href='{{ $file_link }}' download >Ссылка для скачивания файла...</a></b><br><br>
Сообщение отправителя: <b>{{ $sender_message }}</b>
<br><br>
Внимание! Файл будет хранится в обменнике до: <b>{{ $date_erase  }}</b><br>
</p>

</body>
</html>
