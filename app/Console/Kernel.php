<?php

namespace App\Console;

use App\Filestore;
use App\Jobs\CheckFiles;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        //$schedule->job(new CheckFiles)->daily();

        $schedule->call(function () {

            $files = Filestore::all();
            //dd($files);

            $today = time();
            $document_root =  $_SERVER['DOCUMENT_ROOT'] . "storage/";

            $deleteFlag = 0;
            $messageToDel = '';

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

                        // Удаляем файл (!)
                        // Laravel
                        Storage::delete( $document_root . $file->FileLink);
                        // PHP (для верности)
                        unlink($document_root . $file->FileLink);
                        $deleteFlag = 1;
                    }
                }

            }

            if ($deleteFlag == 0)
            {
                $messageToDel =  date('d.m.Y H:i:s') . " не было файлов для удаления!";
            }

            // Данный в лог
            info($messageToDel);

        })->daily();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
