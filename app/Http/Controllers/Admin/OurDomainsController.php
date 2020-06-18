<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\OurDomains;

class OurDomainsController extends Controller
{
    public function Index()
    {
        return view('admin.domains');
    }

    public function domainsVeiwes()
    {
        $domain = new OurDomains;
        return view('admin.domains', ['data' => $domain -> all()]);
    }

    public function domainOne($id)
    {
        $domain = OurDomains::find($id);
        return view('admin.domainone', ['domain' => $domain]);
    }


    public function domainUpdate($id)
    {
        $domain = new OurDomains;
        return view('admin.domainupdate', ['domain' => $domain->find($id)]);
    }

    public function domainUpdateSubmit($id, Request $request)
    {
        $domain = OurDomains::find($id);
        $domain -> domain = $request -> input('domain');

        $domain -> save();

        $success_message = 'Запись домена <b>'. $domain -> domain . '</b> успешно обновлена!';
        return view('admin.domains', ['data' => $domain -> all(), 'success' => $success_message]);
    }

    public function domainDelete($id)
    {
        $domain = OurDomains::find($id);
        $domain -> delete();

        $delete_message = 'Запись домена <b>'. $domain -> domain . '</b> успешно удалена!';
        return view('admin.domains', ['data' => $domain -> all(), 'delete' => $delete_message]);
    }


    public function domainAdd()
    {
        return view('admin.domain-add');
    }


    public function domainAddSubmit(Request $request)
    {
        $domain = new OurDomains;
        $domain -> domain = $request -> input('domain');

        $domain -> save();

        $add_message = 'Запись с доменом <b>'. $domain -> domain . '</b> успешно добавлена!';
        return view('admin.domains', ['data' => $domain -> all(), 'add_message' => $add_message]);
    }

    public function domain_find($domain_name)
    {
        $domain = DB::select(['taЫe' => 'our_domains', 'where' => ['domain' => $domain_name]]);
        dd($domain);

    }

}
