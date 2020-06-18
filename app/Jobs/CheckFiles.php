<?php

namespace App\Jobs;

use App\Filestore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class CheckFiles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */


    public function handle()
    {
        $files = Filestore::all();
        //dd($files);

        $today = time();
        //echo 'Today : ' . $today . "<br><br>";
        $document_root =  $_SERVER['DOCUMENT_ROOT'] . "/storage/";

        foreach ($files as $file )
        {
            if(strtotime($file->FileDateErase) <= $today)
            {
                // Проверям только активные (!)
                if($file->FileActive == "Y")
                {
                    $messageToDel =  "Файл " . $file->FileName . " с датой удаления  " . date('d.m.Y', strtotime($file->FileDateErase))  . " был удалён " . date('d.m.Y H:i:s');
                    // Меняем статус
                    $file->FileActive="N";
                    $file -> save();
                    // echo $messageToDel . "<br>";
                    // Данный в лог
                    info($messageToDel);

                    // Удаляем файл (!)
                    // Laravel
                    Storage::delete( $document_root . $file->FileLink);
                    // PHP (для верности)
                    unlink($document_root . $file->FileLink);
                }
            }
        }
        //return view('home');
    }
}
