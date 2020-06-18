<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OurDomainsController extends Controller
{

    public function domain_find($domain)
    {
        $result = DB::table('our_domains')
            ->where('domain', '=', $domain)
            ->get();

        $flag = (count($result) > 0) ? 1: -1;
        return $flag;
    }

}
