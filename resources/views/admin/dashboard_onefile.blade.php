<?php
// При скачивании подставляем настоящее имя файл
$file_link_download = substr ($file -> FileLink, 8, strlen($file->FileLink));
?>

@extends('admin.layouts.admin_header')

@section('content')

    <div class="container" style="background: #fff;">
        <br>
        <h4>Файл  <span style="color:red;">{{ $file -> FileName }}</span>:</h4><br>

        <?php
        $file_size = number_format( (int)($file -> FileSize) / 1000, 0, '.', ' ') . ' Кб';
        ?>

        <p id="file_info_p">
            Прямая ссылка на файл: <a href="../storage/{{ $file -> FileLink }}" download>{{ $file -> FileLink }}</a></br>
            Страница для получателя: <a href="../go/<?= $file_link_download ?>" target="_blank">go/<?= $file_link_download ?></a><br>
            Размер файла: <b><?= $file_size ?></b></br>
            Тип: <b>{{ $file -> FileMemType }}</b>
            </br></br>

            Получатель: <a href="mailto:{{ $file -> FileEmail  }}">{{ $file -> FileEmail  }}</a></br>
            Сообщение получателю: <b>{{ $file -> FileMessage }}</b></br></br>

            Отправитель файла: <b><a href="https://ipinfo.io/{{ $file -> FileSenderIP }}" target="_blank">{{ $file -> FileSenderIP }}</a></b></br>
            Информация об отправителе: {{ $file -> FileSenderInfo }}</br></br>

            Файл загружен: <?= date('d.m.Y H:i:s', strtotime($file -> created_at)) ?></br>
            Запись с файлом обновлена: <?= date('d.m.Y H:i:s', strtotime($file -> updated_at)) ?></br>
            Активность файла: <b>{{ $file -> FileActive }}</b></br>
            Дата удаления файла: <?= date('d.m.Y', strtotime($file -> FileDateErase)) ?></br>
            Кол-во скачиваний: <b>{{ $file -> FileDownloads }}</b></br>
            <br>
        </p>

    <br>
    </div>

    <br><br>
    <a href="{{ route('admin.index') }}"><button class="btn btn-primary"><i class="fas fa-backspace"></i> Назад</button></a>
    </div>
@endsection
