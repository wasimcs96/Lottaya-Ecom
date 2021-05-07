<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contactus;
use Mail;
use App\User;
use App\Mail\SupportMailManager;
class ContactusController extends Controller
{
    public function store(Request $request)
    {
        Contactus::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'messege'=>$request->messege,
            // 'mobile'=>$request->mobile,
        ]);
        
        $array['view'] = 'emails.contactus';
        $array['subject'] = 'Mail from'. $request->name;
        $array['from'] = $request->email;
        $array['content'] = $request->subject ;

        // $array['link'] = 'lot.demolinks.tech';
        $array['sender'] = $request->name ;
        
        // $array['details'] = $request->messege;
        // dd(User::where('user_type', 'admin')->first()->email);
        
            mail::to(User::where('user_type', 'admin')->first()->email)->queue(new SupportMailManager($array));
       
        return view('frontend.index');
    }
}
