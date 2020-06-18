<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Filestore;

use App\OurDomains;
use App\User;

Use \DB;

// files
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    // Dashboard First
    public function dashboard () {

        // 1. Без сортировки
        //$file = new Filestore();
        //return view('admin.dashboard', ['data' => $file ->paginate(100)]);

        // 2. С сортировкой DB
        $fileFromBase = DB::table('filestores')->orderBy('created_at', 'desc')->paginate(100);

        $count_all = Filestore::all()->count();
        $count_active = Filestore::where('FileActive', 'Y')->count();
        $count_del = Filestore::where('FileActive', 'N')->count();

        $files = Filestore::all();
        $downloads = 0;
        foreach ($files as $file)
        {
            $downloads = $downloads + $file->FileDownloads;
        }

        $last_file = Filestore::orderby('id', 'desc')->first()->created_at;
        $last_file = strtotime($last_file);
        $last_file = date('d.m.Y H:i:s', $last_file);

        $first_file = Filestore::orderby('id', 'asc')->first()->created_at;
        $first_file = strtotime($first_file);
        $first_file = date ('d.m.Y H:i:s', $first_file);

        return view('admin.dashboard', [
            'data' => $fileFromBase,
            'count_all' => $count_all,
            'count_active' => $count_active,
            'count_del' => $count_del,
            'downloads' => $downloads,
            'last_file' => $last_file,
            'first_file' => $first_file,
        ]);

    }

    public function dashboard_onefile($id) {

        $file = new Filestore();
        return view('admin.dashboard_onefile', ['file' => $file->find($id)]);
    }


    public function dashboard_filedir() {
        $files = Storage::files('/uploads');
        return view('admin.dashboard_filesdir', ['files' => $files]);
    }

    public function dashboard_settings() {

        $domains = new OurDomains();
        $admins = new User();
        return view('admin.dashboard_settings', ['domains' => $domains->all() , 'admins' => $admins->all()]);
    }


}
