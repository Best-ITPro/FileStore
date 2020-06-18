<?php

namespace App\Http\Controllers\Admin;

use App\FileDownloaders;

class FileDownloadersController extends Controller
{
    public function downloaders($file_id)
    {
        $filedownloaders = FileDownloaders::where('file_id', $file_id)->get();
        return view('admin.downloaders', ['data' => $filedownloaders]);
    }

}
