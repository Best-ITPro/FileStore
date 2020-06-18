<?php

namespace App;

class MyApp
{

    // Срок хранения файлов (дни)
    const DAY_SAVE = 45;

    // Название сайта
    const TITLE = 'Drive.Modul.OOO';

    // Описание сайта
    const DESCRIPTION = 'Filestore - file exchange service, special for MODUL.OOO, created by Best-ITPro';

    // Ключевые
    const KEYWORDS = 'filestore, file, exchange, service';

    public function best_debug ($MyArray) {
        echo "<PRE>";
        print_r($MyArray);
        echo "</PRE>";
    }
}
