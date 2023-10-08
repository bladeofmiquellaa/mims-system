<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_invitation($invitation) {
        $details = [
            'title' => 'لیتک دعوت ثبت نام دانشجو',
            'body' => 'برای ثبت نام روی لینک کلیک کنید',
            'link'=> 'http://127.0.0.1:8000/student/register/'.$invitation['token_body'],
            'name'=>Auth::user()->firstname.' '.Auth::user()->lastname,
            'description'=>$invitation['description']
        ];

        Mail::to($invitation['email'])->send(new \App\Mail\SendInvitation($details));

    }
    public function send_forgetpasslink($link) {
        $details = [
            'email' => $link['email'],
            'token_body' => $link['token_body'],
            'link'=> 'http://127.0.0.1:8000/forgetpassword/'.$link['token_body'],

        ];

        Mail::to($details['email'])->send(new \App\Mail\Sendforgetpassword($details));

    }
}
