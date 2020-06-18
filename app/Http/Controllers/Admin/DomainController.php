<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OurDomains;
use App\User;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domain = new OurDomains;
        return view('admin.domains.domains', ['data' => $domain -> all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.domains.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $domains = OurDomains::all();
        $admins = User::all();

        // Проверка на наличие в базе - защита от повтороного добавления
        $check_domain = OurDomains::where('domain', $request->domain)->get();
        if($check_domain->count() > 0 )
        {
            //dd($check_domain);
            return view('admin.dashboard_settings', [
                'error' => 'Домен <b>' .  $request->domain . '</b> уже есть в базе! Повторное добавление невозможно.',
                'domains' => $domains,
                'admins' => $admins,
            ]);
        }

        // Проверка на наличие точки в имени домена
        $check_domain = stripos($request->domain, '.');
        if( ($check_domain == false) OR ($check_domain == 0))
        {
            return view('admin.dashboard_settings', [
                'error' => 'Не допустимое имя домена! Запись не добавлена.',
                'domains' => $domains,
                'admins' => $admins,
            ]);
        }

        $domain = New OurDomains();
        $domain -> domain = $request -> domain;
        $success = 'Домен <b>' . $domain -> domain .  '</b> успешно добавлен в базу!';
        $domain -> save();

        // Считываем ещё раз все имена доменов после добавления нового!
        $domains = OurDomains::all();
        return view('admin.dashboard_settings', [
            'success' => $success,
            'domains' => $domains,
            'admins' => $admins,
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OurDomains  $ourDomains
     * @return \Illuminate\Http\Response
     */
    public function show(OurDomains $ourDomains)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OurDomains  $ourDomains
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $domain = OurDomains::where('id', $id) -> first();
        //dd($domain);
        return view('admin.domains.edit', [
            'domain' => $domain,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurDomains  $ourDomains
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $domain = OurDomains::where('id', $id) -> first();

        // Проверка на наличие точки в имени домена
        $check_domain = stripos($request->domain, '.');
        if( ($check_domain == false) OR ($check_domain == 0))
        {
            return view('admin.domains.edit', [
                'error' => 'Вы ввели недопустимое имя домена <b>'. $request->domain .'</b>! Запись не добавлена.',
                'domain' => $domain,
            ]);
        }
        // Если всё ок - сохраняем
        else
        {
            $domain->domain = $request ->domain;
            $domain->update();

            $domains = OurDomains::all();
            $admins = User::all();
            $success = 'Имя домена <b>' . $domain -> domain .  '</b> успешно обновлено!';

            return view('admin.dashboard_settings', [
                'success' => $success,
                'domains' => $domains,
                'admins' => $admins,
            ]);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurDomains  $ourDomains
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $domain = OurDomains::where('id', $id) -> first();

        $success = 'Домен <b>' . $domain -> domain .  '</b> успешно удалён!';
        $domain -> delete();
        // Считываем ещё раз все имена доменов после добавления нового!
        $domains = OurDomains::all();
        $admins = User::all();
        return view('admin.dashboard_settings', [
            'success' => $success,
            'domains' => $domains,
            'admins' => $admins,
        ]);

    }
}
