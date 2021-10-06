<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function getSes(Request $request)
    {
        $data = $request->session()->get('txt');
        return view('/contact', ['data'=>$data]);
    }
    public function postSes(Request $request)
    {
        $txt = $request->building_name;
        $request->session()->put('txt',$txt);
        return redirect('/contact');
    }
}
