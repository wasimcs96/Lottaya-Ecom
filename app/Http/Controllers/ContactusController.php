<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactus;
class ContactusController extends Controller
{
    public function store(Request $request)
    {
        Contactus::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'messege'=>$request->messege,
        ]);
        return view('frontend.index');
    }
}
