<?php

namespace App\Http\Controllers;

use App\Models\Access_token;
use App\Models\Categorie;
use App\Models\Ccase;
use App\Models\Comment;
use App\Models\Invitation;
use App\Models\Organ;
use App\Models\Photo;
use App\Models\Subcategorie;
use App\Models\User;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Nette\Utils\Image;


class CcaseController extends Controller
{

     function ra_show_createcase(){
         $organs=Organ::all();
         return view('user.ra.dashboard.addcase',compact("organs"));
     }
    function dr_show_createcase(){
        $organs=Organ::all();
        $categories=Categorie::all();
        return view('user.dr.dashboard.addcase',compact("organs","categories"));
    }

    function ra_show_caselist(){
         $user['id']=Auth::user()->id;
        $cases=Ccase::where('radiologist_id', '=', $user['id'])->where('state', '!=' , 'dr_draft')->get();
        $doctors=User::where('type','=','doctor')->get();
        foreach ($cases as $case){
            foreach ($doctors as $doctor){
                if ($case['medical_code']==$doctor['medical_code']){
                    $case['doctor_name']=$doctor['firstname']." ".$doctor['lastname'];
                }
            }
        }
        $organs=Organ::all();
        return view('user.ra.dashboard.caselist',compact('cases','doctors','organs'));
    }

    function dr_show_caselist(){
        $user['id']=Auth::user()->id;
        $cases=Ccase::where('doctor_id', '=', $user['id'])->get();
        $doctors=User::where('type','=','doctor')->get();
        $categories=Categorie::all();
        $subcategories=Subcategorie::all();
        $organs=Organ::all();
         foreach ($cases as $case) {
             foreach ($categories as $category) {
                 if ($case['category_id'] == $category['id']) {
                     $case['category_name'] = $category['name'];
                 }
             }
             foreach ($subcategories as $subcategory) {
                 if ($case['subcategory_id'] == $subcategory['id']) {
                     $case['subcategory_name'] = $subcategory['name'];
                 }
             }
         }

        return view('user.dr.dashboard.caselist',compact('cases','organs','categories'));
    }

    function ra_viewcase($case_id){

         $case=Ccase::where('id','=',$case_id)->first();
         $photos=Photo::where('case_id','=',$case_id)->get();
         $access_token=Access_token::where('user_id','=',Auth::user()->id)->first();
        $organs=Organ::all();

            foreach ($organs as $organ){
                if ($case['organs_id']==$organ['id']){
                    $case['organs_name']=$organ['name'];
                }
            }

         return view('user.ra.dashboard.updatecase',compact('case','photos','organs','access_token'));
    }
    function dr_viewcase($case_id){
        $case=Ccase::where('id','=',$case_id)->first();
        $photos=Photo::where('case_id','=',$case_id)->get();
        $organs=Organ::all();
        $categories=Categorie::all();
        $subcategories=Subcategorie::all();
        $access_token=Access_token::where('user_id','=',Auth::user()->id)->first();
        foreach ($organs as $organ){
            if ($case['organs_id']==$organ['id']){
                $case['organs_name']=$organ['name'];
            }
        }
         foreach ($categories as $category){
             if ($case['category_id']==$category['id']){
                 $case['category_name']=$category['name'];
             }
         }
         foreach ($subcategories as $subcategory){
             if ($case['subcategory_id']==$subcategory['id']){
                 $case['subcategory_name']=$subcategory['name'];
             }
         }
        return view('user.dr.dashboard.updatecase',compact('case','photos','organs','access_token','categories','subcategories'));
    }

    function dr_updatecase(Request $request,$case_id){
        $rules=([
            'title'=>'required|min:30|max:100',
            'patient_name'=>'required',
            'location'=>'required',
            'history'=>'nullable',
            'age'=>'required|integer|min:1|max:120',
            'organs_id'=>'required',
            'state'=>'required',
            'gender'=>'required'


        ]);
        $messages = [
            'title.required'=>'فیلد عنوان خالی است',
            'title.min'=>'عنوان باید حداقل دارای 30 کاراکتر باشد',
            'title.max'=>'عنوان باید حداکثر دارای 100 کاراکتر باشد',
            'patient_name.required'=>'فیلد نام بیمار خالی است',
            'location.required'=>'فیلد مکان بیمار خالی است',
            'age.required'=>'فیلد سن خالی است',
            'age.integer'=>'ورودی سن باید عدد طبیعی باشد',
            'age.min'=>'سن باید بیشتر از 1 و کمتر از 120 باشد',
            'age.max'=>'سن باید بیشتر از 1 و کمتر از 120 باشد',
            'state.required'=>'وضعیت کیس مشخص نشده است',
            'gender.required'=>'جنسیت  مشخص نشده است'



        ];
        $formFields = $this->validate($request, $rules, $messages);
        $organ=Organ::where('name','=',$formFields['organs_id'])->first();

        if(isset($request['subcategory'])&&$request['subcategory']!="انتخاب سابکتگوری"){

            $subcategory_h=Subcategorie::select('id')->where('name','=',$request['subcategory'])->first();
            $formFields['subcategory_id']=$subcategory_h['id'];
        }else{
            $formFields['subcategory_id']=null;
        }
        if(isset($request['category'])&&$request['category']!="انتخاب کتگوری"){
            $category_h=Categorie::select('id')->where('name','=',$request['category'])->first();
         $formFields['category_id']=$category_h['id'];
        }else{
            $formFields['category_id']=null;
            $formFields['subcategory_id']=null;
        }



//        if(isset($request['findings'])&&$request['findings']!=null){
//
//        }else{
//            $request['findings']="یافته ای گزارش نشده است";
//        }
//        if(isset($request['diagnosis'])&&$request['diagnosis']!=null){
//
//        }else{
//            $request['diagnosis']="تشخیصی  گزارش نشده است";
//        }
//
//        if(isset($request['history'])&&$request['history']!=null){
//
//        }else{
//            $request['history']="ندارد";
//        }
        if(isset($request['findings'])){
            if($request['findings']!=null){
                $formFields['findings']=$request['findings'];
            }else{
                $formFields['findings']="یافته ای گزارش نشده است";
            }
        }else{
            $formFields['findings']="یافته ای گزارش نشده است";
        }
        if(isset($request['history'])){
            if($request['history']!=null){
                $formFields['history']=$request['history'];
            }else{
                $formFields['history']="سابقه بیماری گزارش نشده است";
            }
        }else{
            $formFields['history']="سابقه بیماری گزارش نشده است";
        }
        if(isset($request['diagnosis'])){
            if($request['diagnosis']!=null){
                $formFields['diagnosis']=$request['diagnosis'];
            }else{
                $formFields['diagnosis']="تشخیص  گزارش نشده است";
            }
        }else{
            $formFields['diagnosis']="تشخیص  گزارش نشده است";
        }

        $new_case=Ccase::where('id', '=', $case_id)
            ->update([
                'title'=>$formFields['title'],
                'patient_name'=>$formFields['patient_name'],
                'location'=>$formFields['location'],
                'history'=>$formFields['history'],
                'age'=>$formFields['age'],
                'organs_id'=>$organ['id'],
                 'state'=>$formFields['state'],
                'findings'=> $formFields['findings'],
                'diagnosis'=>$formFields['diagnosis'],
                'category_id'=>$formFields['category_id'],
                'subcategory_id'=>$formFields['subcategory_id']

            ]);
        if($request->has('images')){
            foreach($request->file('images')as $image){
                $imageName = $formFields['title'].'-image-'.time().rand(1,999999).'.'.$image->extension();
                $image->move(public_path('case_images'),$imageName);
                $new_image['name']=$imageName;
                $new_image['case_id']=$case_id;
                $res= Photo::create($new_image);
            }
        }
       return redirect('http://127.0.0.1:8000/user/doctor/caselist');
    }
    function ra_updatecase(Request $request,$case_id){
        $rules=([
            'title'=>'required|min:30|max:100',
            'patient_name'=>'required',
            'location'=>'required',
            'history'=>'nullable',
            'age'=>'required|integer|min:1|max:120',
            'medical_code'=>'required',
            'organs_id'=>'required',
            'state'=>'required',
             'gender'=>'required'
        ]);
        $messages = [
            'title.required'=>'فیلد عنوان خالی است',
            'title.min'=>'عنوان باید حداقل دارای 30 کاراکتر باشد',
            'title.max'=>'عنوان باید حداکثر دارای 100 کاراکتر باشد',
            'patient_name.required'=>'فیلد نام بیمار خالی است',
            'location.required'=>'فیلد مکان بیمار خالی است',
            'age.required'=>'فیلد سن خالی است',
            'age.integer'=>'ورودی سن باید عدد طبیعی باشد',
            'age.min'=>'سن باید بیشتر از 1 و کمتر از 120 باشد',
            'age.max'=>'سن باید بیشتر از 1 و کمتر از 120 باشد',
            'state.required'=>'وضعیت کیس نامشخص است',
             'gender.required'=>'جنسیت  مشخص نشده است'
        ];
        $formFields = $this->validate($request, $rules, $messages);
        $user = User::where('medical_code', '=', $formFields['medical_code'])->first();
        $organ=Organ::where('name','=',$formFields['organs_id'])->first();
        if ($user){
            $formFields['doctor_id']=$user['id'];
        }else{
            return redirect()->back()->withErrors('کد نظام پزشکی درست نیست');
        }


        $formFields['organs_id']=$organ->id;
        $formFields['radiologist_id']=Auth::user()->id;


        $new_case=Ccase::where('id', '=', $case_id)
            ->update([
                'title'=>$formFields['title'],
                'patient_name'=>$formFields['patient_name'],
                'location'=>$formFields['location'],
                'history'=>$formFields['history'],
                'age'=>$formFields['age'],
                'medical_code'=>$formFields['medical_code'],
                'organs_id'=>$organ['id'],
                'doctor_id'=>$formFields['doctor_id'],
                'radiologist_id'=>$formFields['radiologist_id'],
                'state'=>$formFields['state'],


            ]);
        if($request->has('images')){
            foreach($request->file('images')as $image){
                $imageName = $formFields['title'].'-image-'.time().rand(1,999999).'.'.$image->extension();
                $image->move(public_path('case_images'),$imageName);
                $new_image['name']=$imageName;
                $new_image['case_id']=$case_id;
                $res= Photo::create($new_image);
            }
        }
      return redirect('http://127.0.0.1:8000/user/radiologist/caselist');
    }
    function ra_create(Request $request)
    {
        $rules=([
            'title'=>'required|min:30|max:100',
            'patient_name'=>'required',
            'location'=>'required',
            'history'=>'nullable',
            'age'=>'required|integer|min:1|max:120',
            'medical_code'=>'required',
            'organs_id'=>'required',
            'state'=>'required',
            'gender'=>'required'
        ]);
        $messages = [
            'title.required'=>'فیلد عنوان خالی است',
            'title.min'=>'عنوان باید حداقل دارای 30 کاراکتر باشد',
            'title.max'=>'عنوان باید حداکثر دارای 100 کاراکتر باشد',
            'patient_name.required'=>'فیلد نام بیمار خالی است',
            'location.required'=>'فیلد مکان بیمار خالی است',
            'age.required'=>'فیلد سن خالی است',
            'age.integer'=>'ورودی سن باید عدد طبیعی باشد',
            'age.min'=>'سن باید بیشتر از 1 و کمتر از 120 باشد',
            'age.max'=>'سن باید بیشتر از 1 و کمتر از 120 باشد',
            'medical_code'=>'فیلد کد نظام پزشکی خالی است',
            'organs_id.required'=>'ارگان مرتبط مشخص نشده است',
            'state.required'=>'وضعیت کیس نامشخص است',

            'gender.required'=>'جنسیت  مشخص نشده است'


        ];



        $formFields = $this->validate($request, $rules, $messages);
        $user = User::where('medical_code', '=', $formFields['medical_code'])->first();
        $organ=Organ::where('name','=',$formFields['organs_id'])->first();

             if ($user){
                 $formFields['doctor_id']=$user['id'];
             }else{
                 return redirect()->back()->withErrors('کد نظام پزشکی درست نیست');
             }


            $formFields['organs_id']=$organ['id'];
            $formFields['radiologist_id']=Auth::user()->id;



            $new_case = Ccase::create($formFields);

            if($request->has('images')){
                foreach($request->file('images')as $image){
                    $imageName = $formFields['title'].'-image-'.time().rand(1,999999).'.'.$image->extension();
                    $image->move(public_path('case_images'),$imageName);
                    $new_image['name']=$imageName;
                    $new_image['case_id']=$new_case['id'];
                    $res= Photo::create($new_image);
                }
            }
       return redirect('http://127.0.0.1:8000/user/radiologist/caselist');
            }

    function dr_create(Request $request)
    {
        $rules=([
            'title'=>'required|min:30|max:100',
            'patient_name'=>'required',
            'location'=>'required',
            'history'=>'nullable',
            'age'=>'required|integer|min:1|max:120',
            'organs_id'=>'required',
            'state'=>'required',
            'gender'=>'required'


        ]);
        $messages = [
            'title.required'=>'فیلد عنوان خالی است',
            'title.min'=>'عنوان باید حداقل دارای 30 کاراکتر باشد',
            'title.max'=>'عنوان باید حداکثر دارای 100 کاراکتر باشد',
            'patient_name.required'=>'فیلد نام بیمار خالی است',
            'location.required'=>'فیلد مکان بیمار خالی است',
            'age.required'=>'فیلد سن خالی است',
            'age.integer'=>'ورودی سن باید عدد طبیعی باشد',
            'age.min'=>'سن باید بیشتر از 1 و کمتر از 120 باشد',
            'age.max'=>'سن باید بیشتر از 1 و کمتر از 120 باشد',
            'organs_id.required'=>'ارگان مرتبط مشخص نشده است',
            'state.required'=>'وضعیت کیس مشخص نشده است',
            'gender.required'=>'جنسیت  مشخص نشده است'


        ];



        $formFields = $this->validate($request, $rules, $messages);
        $user = User::where('id', '=', Auth::user()->id)->first();
        $organ=Organ::where('name','=',$formFields['organs_id'])->first();
        if(isset($request['subcategory'])&&$request['subcategory']!="انتخاب سابکتگوری"){

            $subcategory_h=Subcategorie::select('id')->where('name','=',$request['subcategory'])->first();
            $formFields['subcategory_id']=$subcategory_h['id'];
        }else{
            $formFields['subcategory_id']=null;
        }
        if(isset($request['category'])&&$request['category']!="انتخاب کتگوری"){
            $category_h=Categorie::select('id')->where('name','=',$request['category'])->first();
            $formFields['category_id']=$category_h['id'];
        }else{
            $formFields['category_id']=null;
            $formFields['subcategory_id']=null;
        }
//        if(isset($request['category'])&&!$request['category']="انتخاب کتگوری"){
//
//
//        }else{
//            $cat=Categorie::where('name','=',$request['category'])->first();
//
//            $formFields['category_id']=$cat['id'];
//        }
//        if(isset($request['subcategory'])&&!$request['category']="ساب کتگوری"){
//
//
//        }else{
//            $subcat=Subcategorie::where('name','=',$request['subcategory'])->first();
//
//            $formFields['subcategory_id']=$subcat['id'];
//        }

//         if($request['category']=="انتخاب کتگوری"){
//             $formFields['category_id']=null;
//         }else{
//             $category=Categorie::where('name','=',$request['category'])->first();
//             $formFields['category_id']=$category['id'];
//         }
//        if($request['subcategory']=="انتخاب ساب کتگوری"){
//            $formFields['subcategory_id']=null;
//        }else{
//            $subcategory=Subcategorie::where('name','=',$request['subcategory'])->first();
//            $formFields['subcategory_id']=$subcategory['id'];
//        }

        $formFields['doctor_id']=$user['id'];
        $formFields['medical_code']=$user['medical_code'];
        $formFields['organs_id']=$organ->id;
        if(isset($request['findings'])){
            if($request['findings']!=null){
                $formFields['findings']=$request['findings'];
            }else{
                $formFields['findings']="یافته ای گزارش نشده است";
            }
        }else{
            $formFields['findings']="یافته ای گزارش نشده است";
        }
        if(isset($request['history'])){
            if($request['history']!=null){
                $formFields['history']=$request['history'];
            }else{
                $formFields['history']="سابقه بیماری گزارش نشده است";
            }
        }else{
            $formFields['history']="سابقه بیماری گزارش نشده است";
        }
        if(isset($request['diagnosis'])){
            if($request['diagnosis']!=null){
                $formFields['diagnosis']=$request['diagnosis'];
            }else{
                $formFields['diagnosis']="تشخیص  گزارش نشده است";
            }
        }else{
            $formFields['diagnosis']="تشخیص  گزارش نشده است";
        }


//        if(isset($request['findings'])&&!$request['findings']=null){
//            $formFields['findings']=$request['findings'];
//        }else{
//                        $formFields['findings']="یافته ای گزارش نشده است";
//        }
//        if(isset($request['diagnosis'])&&!$request['diagnosis']=null){
//            $formFields['diagnosis']=$request['diagnosis'];
//        }else{
//            $formFields['findings']="تشخیصی گزارش نشده است";
//        }
//        if(isset($request['history'])&&!$request['history']=null){
//            $formFields['history']=$request['history'];
//        }else{
//            $formFields['history']="سابقه بیماری گزارش نشده است";
//        }


        $new_case = Ccase::create($formFields);

        if($request->has('images')){
            foreach($request->file('images')as $image){
                $imageName = $formFields['title'].'-image-'.time().rand(1,999999).'.'.$image->extension();
                $image->move(public_path('case_images'),$imageName);
                $new_image['name']=$imageName;
                $new_image['case_id']=$new_case['id'];
                $res= Photo::create($new_image);
            }
        }
       return redirect('http://127.0.0.1:8000/user/doctor/caselist');
    }
     function  remove_image(Request $request){
         $photo=Photo::all();

         $tres= Access_token::where('token_body','=',$request['token'])->first();
         if($tres){
             $res=Photo::where('name','=',$request['image_name'])->first();
             $res2=Photo::where('case_id','=',$res['case_id'])->get();
             if(count($res2)==1){
                 return response()->json([
                     'response' => 'پرونده حداقل باید یک عکس داشته باشد'

                 ]);
             }else{
                 $res=File::delete(public_path('case_images/'. $request['image_name']));
                 Photo::where('name',$request['image_name'])->delete();
             }

             if($res){
                 return response()->json([
                     'response' => 'عکس حذف شد'

                 ]);
             }else{
                 return response()->json([
                     'response' => 'خطایی رخ داده است'
                 ]);
             }
         }else{
             return response()->json([
                 'response' => 'توکن اشتباه'
             ]);
         }




     }


     function dr_main(){
         $all=Ccase::where('doctor_id','=',Auth::user()->id)->get();
         $all=$all->count();
         $all2=Ccase::where('doctor_id','=',Auth::user()->id)->where('state','=','ra_draft')->get();
         $all2=$all2->count();
         $all =$all-$all2;
        $approved=Ccase::where('doctor_id','=',Auth::user()->id)->where('state','=','approved');
        $approved=$approved->count();
        $not_approved=Ccase::where('doctor_id','=',Auth::user()->id)->where('state','=','not approved');
         $not_approved=$not_approved->count();
        $draft=Ccase::where('doctor_id','=',Auth::user()->id)->where('state','=','dr_draft');
         $draft=$draft->count();
        return view('user.dr.dashboard.main',compact('approved','not_approved','draft','all'));
     }

    function ra_main(){
        $all=Ccase::where('radiologist_id','=',Auth::user()->id)->get();
        $all_dr_draft=Ccase::where('radiologist_id','=',Auth::user()->id)->where('state','=','dr_draft')->get();
        $all=$all->count();
        $all=$all-$all_dr_draft->count();

        $approved=Ccase::where('radiologist_id','=',Auth::user()->id)->where('state','=','approved');
        $approved=$approved->count();
        $not_approved=Ccase::where('radiologist_id','=',Auth::user()->id)->where('state','=','not approved');
        $not_approved=$not_approved->count();
        $draft=Ccase::where('radiologist_id','=',Auth::user()->id)->where('state','=','ra_draft');
        $draft=$draft->count();
        return view('user.ra.dashboard.main',compact('approved','not_approved','draft','all'));
    }

    function  subcategorie(Request $request){

         $categories= Categorie::where('name','=',$request['name'])->get();


         foreach ($categories as $category){
             $subcategories= Subcategorie::select('name')->where('category_id','=',$category['id'])->get();
             $data=json_encode($subcategories);
             return response($data);
         }



    }
    function  allcases(){

         $users=User::all();
        $cases= Ccase::where('state','=','approved')->latest()->get();
        $categories=Categorie::all();
        $organs=Organ::all();
        $subcategories=Subcategorie::all();
        foreach ($cases as $case){

            foreach ($users as $user){
                if ($case['radiologist_id']==$user['id']){
                    $case['radiologist_name']=$user['firstname'] ." ". $user['lastname'];
                }
                if ($case['doctor_id']==$user['id']){
                    $case['doctor_name']=$user['firstname'] ." ". $user['lastname'];
                }
            }
            foreach ($categories as $category){
                if ($case['category_id']==$category['id']){
                    $case['category_name']=$category['name'];
                    break;
                }else{
                    $case['category_name']="null";
                }
            }foreach ($subcategories as $subcategory){
                if ($case['subcategory_id']==$subcategory['id']){
                    $case['subcategory_name']=$subcategory['name'];
                    break;
                }else{
                    $case['subcategory_name']="null";
                }
            }
            foreach ($organs as $organ){
                if ($case['organs_id']==$organ['id']){
                    $case['organ']=$organ['name'];
                }
            }
            $photo=Photo::where('case_id','=',$case['id'])->first();
            $case['image_link']="http://127.0.0.1:8000/case_images/".$photo['name'];
             $case['link']="http://127.0.0.1:8000/viewcase/".$case['id'];
        }

        $data=json_encode($cases);

        return response($data);
    }

    function comment_list(){
        $cases_id=array();
         $cases=Ccase::where('doctor_id','=',Auth::user()->id)->get();
         $users=User::all();

        foreach($cases as $case)
        {
            $cases_id[] = (array) $case['id'];
        }

         $comments=Comment::whereIn('case_id', $cases_id)->orderBy('box_id', 'DESC')->orderBy('box_id', 'DESC')->get();
        $comments2=$comments;
        foreach ($comments as $comment) {
            foreach ($users as $user) {
                if ($user['id'] == $comment['author_id']) {
                    $comment['author_name'] = $user['firstname'] . " " . $user['lastname'];
                    break;
                }
            }
            foreach ($cases as $case) {
                if ($case['id'] == $comment['case_id']) {
                    $comment['case_title'] = $case['title'];

                    break;
                }
            }
            foreach ($comments2 as $comment2){
                if ($comment2['id'] == $comment['refrence']) {
                    $comment['reply_to'] = $comment2['body'];
                    break;
                }
            }
        }

        return view('user.dr.dashboard.comments',compact('comments'));



    }
    function store_comment(Request $request, $case_id){

        $rules=([
            'body'=>'required'

        ]);
        $messages = [
            'body.required'=>'فیلدارسال نظر خالی است'
        ];
        $formFields = $this->validate($request, $rules, $messages);
        $formFields['author_id']=Auth::user()->id;
        $res=Ccase::where('doctor_id','=',Auth::user()->id)->where('id','=',$case_id)->first();
        if($res){
            $formFields['state']="approved";
        }else{
            $formFields['state']="not approved";
        }

        $formFields['case_id']=$case_id;

        $res=Comment::create($formFields);
        if(isset($request['reply-to'])&&!$request['reply-to']==null){

            $new_res=Comment::where('id', '=', $res['id'])
                ->update([
                    'box_id'=>$request['reply-to'],
                    'refrence'=>$request['reply-to']
                ]);

           }else{
            $new_res=Comment::where('id', '=', $res['id'])
                ->update([
                    'box_id'=>$res['id'],

                ]);

           }
      return  redirect()->back();

    }

    function view_case($case_id){
         $users=User::all();
         $categories=Categorie::all();
         $subcategories=Subcategorie::all();
         $organs=Organ::all();
         $case=Ccase::where('id','=',$case_id)->first();
         $images=Photo::where('case_id','=',$case_id)->get();
        foreach ($organs as $organ){
            if ($case['organs_id']==$organ['id']){
                $case['organs_name']=$organ['name'];
            }
        }
        foreach ($categories as $category){
            if ($case['category_id']==$category['id']){
                $case['category_name']=$category['name'];
            }
        }
        foreach ($subcategories as $subcategory){
            if ($case['subcategory_id']==$subcategory['id']){
                $case['subcategory_name']=$subcategory['name'];
            }
        }
        foreach ($users as $user){
            if ($case['doctor_id']==$user['id']){
                $case['doctor_name']=$user['firstname']." ".$user['lastname'];
            }
        }
        return view('home.viewcase',compact('case','images'));

    }
    function send_comments(Request $request){
         $comments=Comment::where('case_id','=',$request['case_id'])->where('state','=','approved')->orderBy('box_id', 'asc')->get();
         $users=User::all();

         foreach ($comments as $comment){
            foreach ($users as $user){
                if($user['id']==$comment['author_id']){
                    $comment['author_name']=$user['username'];
                    $comment['image_link']="http://127.0.0.1:8000/profile_images/".$user['photo'];
                    if($user['type']=='radiologist'){
                        $comment['author_role']="رادیولوژیست";
                    }
                    if($user['type']=='doctor'){
                        $comment['author_role']="دکتر";
                    }
                    if($user['type']=='student'){
                        $comment['author_role']="دانشجو";
                    }

                }


            }
         }
         $comments=json_encode($comments);
         return response($comments);
    }

    function delete_comment($comment_id){
        $comment=Comment::where('id','=',$comment_id)->first();
         $res=Ccase::where('doctor_id','=',Auth::user()->id)->where('id','=',$comment['id'])->get();
         if($res){
             if($comment['refrence']==null){
                 $c_result=Comment::where('box_id','=',$comment['box_id'])->delete();
                 return redirect()->back();
             }else{
                 $c_result=Comment::where('id','=',$comment_id)->delete();
                return redirect()->back();
             }
         }

    }
    function confirm_comment($comment_id){
        $comment=Comment::where('id','=',$comment_id)->first();
        $res=Ccase::where('doctor_id','=',Auth::user()->id)->where('id','=',$comment['id'])->get();
        if($res){
            $up_res=Comment::where('id', '=', $comment_id)
                ->update([
                    'state'=>"approved"
                ]);
            return redirect()->back();
        }

    }
    function adv_search(){
         $categories=Categorie::all();
         return view('home.advsearch',compact('categories'));
    }
}
