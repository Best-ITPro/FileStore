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

<p>Здравствуйте!<br><br>
    Ваш e-mail: {{ $email }} был зарегистрирован в качестве аккаунта на сайте {{'/'}}<br>
    Для подтверждения решистрации Вам нужно пройти по ссылке: {{ route('register.verify') }}
</p>

</body>
</html>
