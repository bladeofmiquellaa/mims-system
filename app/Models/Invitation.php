<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invitation extends Model
{
    protected $guarded = [];
    public function send(Request $request){
        $invitation['doctor_id']=$request['id'];
        $invitation['description']=$request['description'];
        $invitation['email']=$request['email'];
        $token =Str::random(64);
        $invitation['token_body']=$request['token_body'];
        $res=Invitation::create($invitation);
        $link ="http://http://127.0.0.1:8000/student/register/".$token;
    }
    use HasFactory;
}
