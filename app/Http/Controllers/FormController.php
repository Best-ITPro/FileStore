<?php

// https://laravel.su/docs/5.4/filesystem
// https://webformyself.com/laravel-zagruzka-fajlov/

namespace App\Http\Controllers;

use App\Http\Requests\FormSendRequest;
use App\Filestore;
use App\MyApp;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendFileMail;

class FormController extends Controller
{
    public function FormSubmit(FormSendRequest $request)
    {
        // FileName
        $filename = $request->file('userfile') -> getClientOriginalName();

        // Загрузка файла на сервер (!)
        // Сгенерированное имя
        $path = $request -> file('userfile') -> store('uploads');
        // Оригинальное имя
        //$saveName = strval(rand(10, 99))."_".trim($filename);
        //$path = $request -> file('userfile') -> storeAs ('public/uploads' , $saveName);

        // Size
        $size = $request -> file('userfile') -> getSize();
        // Memtype
        $memtype = $request -> file('userfile') -> getMimeType();

        $filestore = new Filestore();

        $filestore -> FileName = $filename;

        // Сгенерированное имя
        $filestore -> FileLink = $path;
        // Оригинальное имя
        // $filestore -> FileLink = $saveName;

        $filestore -> FileEmail = $request -> email;

        if(isset($request -> message)){
        $filestore->FileMessage = $request->message;
        }
        else {
        $filestore->FileMessage = ' ';
        }

        $filestore -> FileActive = 'Y';
        $filestore -> FileSenderIP = $request -> ip_downloader;
        $filestore -> FileSenderInfo = $request -> info_downloader;
        $filestore -> FileDateErase = date ('Y-m-d', time() + (MyApp::DAY_SAVE * 24 * 60 * 60));
        $filestore -> FileDownloads = 0;

        $filestore -> FileSize = $size;
        $filestore -> FileMemType = $memtype;

        $filestore -> save();

        //dd($filestore);
        $SendFileMail = new SendFileMail($filestore -> id, $filestore -> FileEmail, $filestore->FileMessage, $filestore -> FileLink, $filestore -> FileDateErase );
        //dd($SendFileMail);

        $targetEmail = $request -> email;
        Mail::to($targetEmail)->send($SendFileMail);

        return view('home', ['success' => 'Файл успешно загружен! Ссылка отправлена получателю', 'email' => $targetEmail]);

    }

    public function Index()
    {
        return view('home');
    }

    public function Versions()
    {
        return view('versions');
    }
}
