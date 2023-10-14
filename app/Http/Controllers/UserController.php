<?php

namespace App\Http\Controllers;

use App\Mail\SendInvitation;
use App\Models\Access_token;
use App\Models\Photo;
use Illuminate\Contracts\Session\Session;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{


    public function login (Request $request ){
       $rules=[
            'username' => 'required',
            'password' => 'required'
        ];
            $messages = [
                'username.required'=>'فیلد نام کاربری خالی است',
                'password.required'=>'فیلد رمز عبور خالی است'
            ];


        $formFields = $this->validate($request, $rules, $messages);



        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            $user=User::where('username',$formFields['username'])->first();
            auth()->login($user);
            Access_token::where('user_id',Auth::user()->id)->delete();
            $token['token_body']=rand(1000,999999999999999);
            $token['user_id']=Auth::user()->id;
            $res= Access_token::create($token);
            if($user['type']=="doctor"){

               Auth::user()->doctor='doctor';
                return redirect('user/doctor/dashboard');
            }else if($user['type']=="radiologist"){
                auth()->login($user);
               Auth::user()->type='radiologist';
                return redirect('user/radiologist/dashboard');
            }else{
                auth()->login($user);
                Auth::user()->type='student';
                return redirect('user/student/editprofile');
            }

        }
        else{

           return redirect()->back()->withErrors('نام کاربری یا رمز عبور نادرست است');

        }


}
    public function signup(Request $request){
       $rules=
            [
            'firstname' => 'required | min:3',
            'lastname' =>'required',
            'username' =>'required | unique:users',
            'password' => 'required|confirmed|min:6',

            'email' =>'required | email | unique:users',
            'medical_code'=>'nullable',
            'invitation_id'=>'nullable',
                'phone' => [
                    'required',
                    'regex:/^[0]{1}[9]{1}[0,1,2,3,9]{1}[0-9]{8}$/',
                    'unique:users'
                ],
        ];
           $messages= [
               'email.unique'=>'ایمیل قبلا استفاده شده است',

                'firstname.required'=>'فیلد نام خالی است',
                'firstname.min'=>'نام باید شامل حداقل 3 کاراکتر باشد',
                'lastname.required'=>'فیلد نام خانوادگی خالی است',
                'username.required'=>'فیلد نام کاربری خالی است',
                'username.unique'=>'این نام کاربری قبلا استفاده شده است',
                'password.required'=>'فیلد رمز عبور خالی است',
                'password.confirmed'=>'رمز عبور به درستی تکرار نشده است',
                'password.min'=>'رمز عبور باید حداقل شامل 6 کاراکتر باشد',
                'email.required'=>'فیلد ایمیل خالی است',
                'email.email'=>'ایمیل به درستی وارد نشده است',
                'phone.required'=>'فیلد شماره موبایل خالی است',
               'phone.regex'=>'فرمت شماره موبایل نادرست است',
               'phone.unique'=>'این شماره موبایل قبلا استفاده شده است'



            ];

        $formFields = $this->validate($request, $rules, $messages);

        $formFields['password'] = bcrypt($formFields['password']);

         if($request->type == 'radiologist'){

            $formFields['type']='radiologist';
             $user = User::create($formFields);
             auth()->login($user);
             Access_token::where('user_id',Auth::user()->id)->delete();
             $token['token_body']=rand(1000,999999999999999);
             $token['user_id']=Auth::user()->id;
             $res= Access_token::create($token);
             return redirect('user/radiologist/dashboard');

        }
        elseif ($request->type== 'doctor')   {
            $formFields['type']='doctor';

            $user = User::create($formFields);
            auth()->login($user);
            Access_token::where('user_id',Auth::user()->id)->delete();
            $token['token_body']=rand(1000,999999999999999);
            $token['user_id']=Auth::user()->id;
            $res= Access_token::create($token);
            return redirect('user/doctor/dashboard');

        }else if($request->type=='student'){
             $res= Invitation::where('token_body', $request->token_body)
                 ->update(['state' => 'expired']);
             $formFields['type']='student';
             $formFields['invitation_id']=$request->invitation_id;
             $user = User::create($formFields);
             return redirect('/user/student/editprofile');

         }


    }
    public function st_signup($token_body){
        $invite = Invitation::where('token_body', '=', $token_body)->first();
        if ($invite === null) {
            return view('invalid');


        }else{
            if($invite['state']=='expired'){
                return view('invalid');
            }
            else{
                return view('user.s_signup',['token_body' => $token_body],['invitation_id'=>$invite['id']]);
            }


        }

    }
    public function view_editprofile(){
        $user=User::where("id","=",Auth::user()->id)->first();
        if(Auth::user()->type=='doctor'){
            return view('user.dr.dashboard.editprofile',compact('user'));
        }
        if(Auth::user()->type=='radiologist'){

            return view('user.ra.dashboard.editprofile',compact('user'));
        }
        if(Auth::user()->type=='student'){

            return view('user.st.dashboard.editprofile',compact('user'));
        }


    }
    function editprofile(Request $request){
        $rules=([
            'firstname'=>'required|min:3',
            'lastname'=>'required',
            'username'=>'required|unique:users,' .'id,' . Auth::user()->id,

            'phone' => [
                'required',
                'regex:/^[0]{1}[9]{1}[0,1,2,3,9]{1}[0-9]{8}$/',
                'unique:users,' .'id,' . Auth::user()->id,
            ],

        ]);
        $messages = [
            'firstname'=>'فیلد نام خالی است',
            'lastname'=>'فیلد نام خانوادگی خالی است',
            'firstname.min'=>'نام باید حداقل شامل 3 کاراکتر باشد',
            'username.required'=>'فیلد نام کاربری خالی است',
            'username.unique'=>'این نام کاربری قبلا استفاده شده است ',
            'phone.required'=>'فیلد شماره تلفن خالی است',
            'phone.unique'=>'این شماره قبلا استفاده شده است',
            'phone.regex'=>'فرمت شماره موبایل نادرست است',

        ];
        $formFields = $this->validate($request, $rules, $messages);
        $user = User::where('id', '=', Auth::user()->id)->first();


        $new_profile=User::where('id', '=', $user['id'])
            ->update([
                'firstname'=>$formFields['firstname'],
                'lastname'=>$formFields['lastname'],
                'username'=>$formFields['username'],
                'phone'=>$formFields['phone'],
            ]);
        if($request->has('profile_images')){
            foreach($request->file('profile_images')as $image) {
                $imageName = $formFields['firstname'] . '-image-' . time() . rand(1, 999999) . '.' . $image->extension();
                $image->move(public_path('profile_images'), $imageName);
                File::delete(public_path('profile_images/'. Auth::user()->photo));
                $new_profile = User::where('id', '=', $user['id'])
                    ->update([
                        'photo' => $imageName
                    ]);
            }
        }
        if(Auth::user()->type=='doctor'){
            return redirect('/user/doctor/dashboard');
        }
        if(Auth::user()->type=='radiologist'){

            return redirect('/user/radiologist/dashboard');
        }
        if(Auth::user()->type=='student'){

            return redirect('/user/student/editprofile');
        }

    }
    public  function logout(){
        auth()->logout();
        return redirect('login');
    }

    public function changepassword(Request $request){
        $rules=([
            'password' => 'required|confirmed|min:6',

        ]);
        $messages=([
            'password.required'=>'فیلد رمز عبور خالی است',
            'password.confirmed'=>'رمز عبور به درستی تکرار نشده است',
            'password.min'=>'رمز عبور باید حداقل شامل 6 کاراکتر باشد',
        ]);
        $formFields = $this->validate($request, $rules, $messages);
        $formFields['password'] = bcrypt($formFields['password']);
        $pass_res=User::where('id', '=', Auth::user()->id)
            ->update([
                'password'=>$formFields['password']
            ]);
        auth()->logout();
        return redirect('login');


    }

    public function sendinvitation(Request $request){
        $rules=[
            'email' => 'required',

        ];
        $messages = [
            'email.required'=>'فیلد ایمیل خالی است',
        ];


        $formFields = $this->validate($request, $rules, $messages);
        $invitation['token_body']=rand(1000,999999999999999);
        $invitation['email']=$request['email'];
        if(isset($request['description'])){
            $invitation['description']=$request['description'];
        }
        $invitation['doctor_id']=Auth::user()->id;
        $invitation['state']='active';
        Invitation::create($invitation);
        $res=(new MailController())->send_invitation($invitation);
        $message='لینک دعوت ارسال شد';
        return view('user.dr.dashboard.sendinvite',compact('message'));

    }
    public function send_fpasslink(Request $request){
        $rules=[
            'email' => 'required',

        ];
        $messages = [
            'email.required'=>'فیلد ایمیل خالی است',
        ];


        $formFields = $this->validate($request, $rules, $messages);
        $token_body=rand(1000,999999999999999);
        $res1 = User::where('email', '=', $request['email'])
            ->update([
                'fpass_token' => $token_body
            ]);
        $link['email']=$request['email'];
        $link['token_body']=$token_body;

        $res2=(new MailController())->send_forgetpasslink($link);
         if($res1){
             $message='لینک تغییر رمز عبورارسال  شد';
             return view('user.forgetpassword',compact('message'));
         }else{

             $message='ایمیل یافت نشد';
             return view('user.forgetpassword',compact('message'));
         }






    }
    public function change_fpassword($token_body){
        $user = User::where('fpass_token', '=', $token_body)->first();
        if ($user == null) {
            return view('invalid');
        }else{

                return view('user.forgetpasswordpage',compact('token_body'));
        }
    }
    public function changing_fpass(Request $request){
        $rules=([
            'password' => 'required|confirmed|min:6',

        ]);
        $messages=([
            'password.required'=>'فیلد رمز عبور خالی است',
            'password.confirmed'=>'رمز عبور به درستی تکرار نشده است',
            'password.min'=>'رمز عبور باید حداقل شامل 6 کاراکتر باشد',
        ]);
        $formFields = $this->validate($request, $rules, $messages);
        $formFields['password'] = bcrypt($formFields['password']);
        $pass_res=User::where('fpass_token', '=', $request['token_body'])
            ->update([
                'password'=>$formFields['password'],
                'fpass_token'=>""
            ]);
           if($pass_res){
               return redirect('login');
           }

    }

}
