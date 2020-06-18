<?php

    // MyApp - settings
    use App\MyApp;
    $day_save = MyApp::DAY_SAVE;

    // Полная ссылка для скачивания файла
    $file_link_download = './../storage/' . $file->FileLink;

    $file_link_download = substr ($file -> FileLink, 8, strlen($file->FileLink));
    $file_link_download = './../download/' . $file_link_download;

    // При скачивании подставляем настоящее имя файл
    // download="{{ $file -> FileName }}"
?>

@include('include.header')

<center>
    <br>
    <b>

        <a href="<?=$file_link_download ?>" >
        <font color="#4285F4">Ссылка на скачивание файла...</font></a>
        <br><br>
        <font color="black">Имя файла:</font><br><font color="red">{{ $file -> FileName }}</font>
        </b><br/><br/>

    <a href="<?=$file_link_download ?>" class="btn btn-primary"><i class="fas fa-download"></i> Скачать файл</a>
    <br/><br/>
</center>

@include('include.footer')

