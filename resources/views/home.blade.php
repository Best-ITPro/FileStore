<?php

// MyApp - settings
use App\MyApp;
$day_save = MyApp::DAY_SAVE;

?>
@include('include.header')

@include('include.messages')

<center>

    <div class="row justify-content-md-center mb-3">
    <form id="file-send" class="form-signin" enctype="multipart/form-data" action="{{ route('file-send') }}" method="POST" >

            @csrf
            <input type="hidden" name="ip_downloader" value="<?= $_SERVER['REMOTE_ADDR']  ?>">
            <input type="hidden" name="info_downloader" value="<?= $_SERVER['HTTP_USER_AGENT']  ?>">
            <div class="form-group mb-3">
                <input type="email" required class="form-control form-control-lg" id="email" name="email" placeholder="Введите E-mail получателя" onchange="Domain_Check();" />
            </div>
            <div class="form-group mb-3">
                <input type="file" required class="form-control form-control-lg" id="userfile" name="userfile" placeholder="Выберете файл для отправки..."  />
            </div>
            <div class="form-group">
                <textarea class="form-control form-control-lg mb-3" id="message" name="message" rows="3" placeholder="Сопроводительное письмо..."></textarea>
            </div>

            <input type="submit" id="submit" class="btn btn-primary" value="Отправить ссылку получателю"  disabled="disabled" onclick="DisplayUpload ();">
            <input type="cancel" class="btn btn-danger" value="Отмена" onclick="ResetMyForm();">


    <center>
        <div id="result" style="height: 35px;"><br></div>

        <div id="text_p">
            <p>Внимание!  Вы можете одновременно отправить только один файл. В целях ускорения отправки - файл (или набор файлов) перед отправкой лучше поместить в архив. Размер отправляемого файла не должен превышать <b>1Gb</b>.</p>
            <center><b>Срок хранения файлов (в днях): <font color="#EA4335"><?php print $day_save; ?></font> с момента отправки!</b></center>
        </div>

    </center>
    </form>

    <center>
        <br>
        @isset($path)
            <b>Ваш файл: </b><a href="{{ asset( '/storage/' . $path ) }}"> {{  asset( '/storage/' . $path )  }}</a>
            <br>
            Оригинальное имя файла: <b> {{  $filename  }} </b>
            <br>
            IP: <b> {{  $ip_downloader }} </b>
            <br>
            Info: <b> {{  $info_downloader }} </b>
        @endisset
    </center>

    </div>

@include('include.footer')


<?php

//best_debug($_SERVER);

?>

