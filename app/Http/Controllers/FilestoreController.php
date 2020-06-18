<?php

namespace App\Http\Controllers;

use App\Filestore;
use App\FileDownloaders;

use Illuminate\Support\Facades\Storage;


class FilestoreController extends Controller
{

    public function index($file_link)
    {

        $file_link = 'uploads/' . $file_link;
        return view('go', ['file' => Filestore::where('FileLink', $file_link)->first()]);
    }

    // Проверяем файлы в хранилище и удаляем старые (FileDateErase)

    public function CheckFiles()
    {
        $files = Filestore::all();
        //dd($files);

        $today = time();
        $document_root =  $_SERVER['DOCUMENT_ROOT'] . "storage/";
        $messageToDel = "";

        foreach ($files as $file )
        {
            if(strtotime($file->FileDateErase) <= $today)
            {
                // Проверям только активные (!)
                if($file->FileActive == "Y")
                {
                    $messageToDel = $messageToDel . "Path: " .  $document_root . $file->FileName . "<br>";
                    $messageToDel =  $messageToDel . "Файл " . $file->FileName . " с датой удаления  " . date('d.m.Y', strtotime($file->FileDateErase))  . " был удалён " . date('d.m.Y H:i:s');
                    // Меняем статус
                    $file->FileActive="N";
                    $file -> save();
                    echo $messageToDel . "<br>";

                    // Удаляем файл (!)
                    // Laravel
                    Storage::delete( $document_root . $file->FileLink);
                    // PHP (для верности)
                    unlink($document_root . $file->FileLink);

                }

            }
        }
        // Данный в лог
        info($messageToDel);
    }


    public function CheckFilesInterface()
    {
        $files = Filestore::all();
        //dd($files);

        $today = time();
        $document_root =  $_SERVER['DOCUMENT_ROOT'] . "storage/";
        $messageToDel = '';

        foreach ($files as $file )
        {

            $file->FileActive == 'Y' ? $status = "<font color='red'><b>Активен</b></font>" : $status = "<font color='blue'><b>Удалён</b></font>";
            $messageToDel = $messageToDel . "<a href='/storage/". $file->FileLink. "' target='_blank'>" .$file->FileName . "</a>, дата удаления: " .  $file->FileDateErase . ", статус: " .  $status . "<br>";

            if(strtotime($file->FileDateErase) <= $today)
            {

                // Проверям только активные (!)
                if($file->FileActive == "Y")
                {
                    $messageToDel = "<b>". $messageToDel . $file->FileName . ' предназначен для удаления (!)</b><br>';

                    $messageToDel =  $messageToDel . "Path: " .  $document_root . $file->FileName . "<br>";
                    $messageToDel =  $messageToDel . "Файл " . $file->FileName . " с датой удаления  " . date('d.m.Y', strtotime($file->FileDateErase))  . " был удалён " . date('d.m.Y H:i:s') . "<br>";
                    // Меняем статус
                    $file->FileActive="N";
                    $file -> save();

                    // Удаляем файл (!)
                    $messageToDel =  $messageToDel . "Удаляем:  " . $document_root . $file->FileLink ."<br><br>";
                    // Laravel
                    Storage::delete( $document_root . $file->FileLink);
                    // PHP (для верности)
                    unlink($document_root . $file->FileLink);

                }
            }
        }

        // Данный в лог
        // info($messageToDel);

        return view('admin.dashboard_chekfiles', [
            'message' => $messageToDel,
        ]);

    }


    public function download($file_link)
    {

        $file_link = 'uploads/' . $file_link;

        $file = Filestore::where('FileLink', $file_link)->first();
        $file -> FileDownloads++;
        $file -> save();

        $filedownloader = new FileDownloaders();

        $filedownloader -> file_id = $file -> id;
        $filedownloader -> DownLoaderIP = $_SERVER['REMOTE_ADDR'];
        $filedownloader -> DownLoaderInfo = $_SERVER['HTTP_USER_AGENT'];

        $filedownloader -> save();

        $file = Filestore::where('FileLink', $file_link)->first();
        return Storage::download($file->FileLink, $file->FileName);
    }



}
