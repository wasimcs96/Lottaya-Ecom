<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactus;
class ContactusController extends Controller
{
    public function store(Request $request)
    {
        Contactus::create([
            'f_name'=>$request->name,
            'email'=>$request->email,
            'sur_name'=>$request->surname,
            'mobile'=>$request->mobile,
        ]);
        return view('frontend.index');
    }
}
