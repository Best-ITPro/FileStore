<?php

    // MyApp - settings
    use App\MyApp;
    $day_save = MyApp::DAY_SAVE;

?>

@include('include.header')

<div class="container">
    <div class="row">
        <div class="col">
        <br>
        <h4>История версий программы FileStore:</h4><br>
        <ul>
            <li><b>1.0</b> - дебютная версия, реализована на чистом PHP, <b>2017</b>.</li>
        </ul>

        <ul>
            <li><b>2.0</b> - версия на чистом PHP с усиленной системой безопасности, модифицирован интерфейс пользователя и реализована новая панель администратора, <b>2018</b>.</li>
        </ul>

        <ul>
            <li><b>3.0</b> - абсолютно новая архитектура, изменён механизм загрузки файлов, новый интерфейс администратора, сам файлообменник реализован на PHP Framework Laravel 6.0, <b>апрель 2020</b>.</li>
        </ul>

        <ul>
            <li><b>3.1</b> - добавлен новый контроллер, улучше механизм работы с почтовыми доменами, <b>июнь 2020</b>.</li>
        </ul>

        </div>
    </div>
</div>


@include('include.footer')


<?php

//best_debug($_SERVER);

?>

