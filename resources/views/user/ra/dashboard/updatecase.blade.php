@extends('user.ra.dashboard.layouts.master')
@section('content')
    <title>ویرایش کیس</title>
    <form action="/user/radiologist/updatingcase/{{$case['id']}}" method="post" enctype="multipart/form-data">
<div class="case container">
    <div class="case-header">
        <svg  style="margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><g fill="none" stroke="#4da3ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21H21"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="20;0"/></path><path stroke-dasharray="44" stroke-dashoffset="44" d="M7 17V13L17 3L21 7L11 17H7"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.6s" values="44;0"/></path><path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6L18 10"><animate fill="freeze" attributeName="stroke-dashoffset" begin="1s" dur="0.2s" values="8;0"/></path></g></svg>
        ویرایش کیس
    </div>

        <div class="case-main" name="{{$access_token['token_body']}}">
            <div class="case-input">

                <div>
                    <label >عنوان</label>
                    <input type="text"   name="title" value="{{$case['title']}}" autocomplete="off">
                </div>
                <div>
                    <label>نام بیمار</label>
                    <input type="text"   name="patient_name" value="{{$case['patient_name']}}" autocomplete="off">
                </div>
                <div>
                    <label>جنسیت</label>
                    <select name="gender" >
                        @if($case['gender']=="مرد")
                            <option >مرد</option>
                            <option >زن</option>
                           @else
                            <option >زن</option>
                            <option >مرد</option>
                        @endif
                    </select>
                </div>
                <div>
                    <label>سن</label>
                    <input type="number"  name="age" value="{{$case['age']}}" autocomplete="off">
                </div>
                <div>
                    <label>محل زندگی</label>
                    <input type="text"  name="location" value="{{$case['location']}}" autocomplete="off">
                </div>
                <div>
                    <label for="organs">اعضای بدن مرتبط</label>
                    <select name="organs_id" id="organ">
                        <option value="{{$case['organs_name']}}">{{$case['organs_name']}} </option>
                        @foreach($organs as $organ)
                            @if($organ['id']==$case['organs_id'])

                            @else
                                <option value="{{$organ['name']}}">{{$organ['name']}}</option>
                            @endif

                        @endforeach

                    </select>
                </div>
                <div>
                    <label>سابقه بیماری</label>
                    <input type="text"  name="history" value="{{$case['history']}}" autocomplete="off">
                </div>
                <div>
                    <label>کد نظام پزشکی</label>
                    <input type="text"   name="medical_code" value="{{$case['medical_code']}}" autocomplete="off">
                </div>
{{--                <div>--}}
{{--                    <label> توضیحات</label>--}}
{{--                    <textarea></textarea>--}}
{{--                </div>--}}
                <div>
                    <label>وضعیت</label>
                    <select name="state" >
                        @if($case['state']=="not approved")
                            <option value="not approved">ارسال کیس</option>
                            <option value="ra-draft">ذخیره پیشفرض</option>
                        @else
                            <option value="ra-draft">ذخیره پیشفرض</option>
                            <option value="not approved">ارسال کیس</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="case-img">
                <div class="upload-icon">
                    <label class="btn-default btn-file">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" d="M18 15v3h-3v2h3v3h2v-3h3v-2h-3v-3h-2m-4.7 6H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h14c1.1 0 2 .9 2 2v8.3c-.6-.2-1.3-.3-2-.3c-1.1 0-2.2.3-3.1.9L14.5 12L11 16.5l-2.5-3L5 18h8.1c-.1.3-.1.7-.1 1c0 .7.1 1.4.3 2Z"/></svg>
                        <input type="file" accept="image/*" style="display: none;" id="upload-case-img" name="images[]" multiple>
                    </label>
                    <span class="clear"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" d="M10 4a2 2 0 1 1 4 0v6h6v4H4v-4h6V4ZM4 14h16v8H4v-8Zm12 8v-5.635M8 22v-5.635M12 22v-5.635"/></svg></span>
                </div>
                <div class="gallery">
                    <div class="current-box">

                        @foreach($photos as $photo)
                        <div name="{{$photo['name']}}" id="{{$photo['id']}}" class=current>

                                <img src="http://127.0.0.1:8000/case_images/{{$photo['name']}}" alt="" >

                             @if($case['state']=="approved")

                            @else
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4c-4.419 0-8 3.582-8 8s3.581 8 8 8s8-3.582 8-8s-3.581-8-8-8zm3.707 10.293a.999.999 0 1 1-1.414 1.414L12 13.414l-2.293 2.293a.997.997 0 0 1-1.414 0a.999.999 0 0 1 0-1.414L10.586 12L8.293 9.707a.999.999 0 1 1 1.414-1.414L12 10.586l2.293-2.293a.999.999 0 1 1 1.414 1.414L13.414 12l2.293 2.293z"/></svg></span>

                            @endif
                        </div>
                        @endforeach

                    </div>
                    <div class="selected-box">

                    </div>

                </div>
            </div>
            <div class="show-errors">
                @if ($errors->any())
                    <div class="alert alert-danger ">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                    </div>
                @endif
            </div>
            <div class="buttons">
                @if($case['state']=='approved')
                    <button style="margin-left: 10px;" disabled>تایید شده</button>
                @endif
                    @if($case['state']=='not approved'||$case['state']=='ra_draft')
                        <button style="margin-left: 10px;">ذخیره</button>
                    @endif

                <a href='javascript:history.back()'>لغو</a>
            </div>

        </div>

</div>
    </form>
<div class="fullImage">
    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-dasharray="16" stroke-dashoffset="16" stroke-linecap="round" stroke-width="2"><path d="M7 7L17 17"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="16;0"/></path><path d="M17 7L7 17"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.4s" values="16;0"/></path></g></svg>
    <img>
</div>
<div class="pop-up">
    <div class="pop-up-box">
        <div class="pop-up-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-dasharray="16" stroke-dashoffset="16" stroke-linecap="round" stroke-width="2"><path d="M7 7L17 17"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="16;0"/></path><path d="M17 7L7 17"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.4s" values="16;0"/></path></g></svg>
        </div>

        <div class="pop-up-data">
            <h4>آیا از انتخاب خود مطمئن هستید؟</h4>
            <img src="" alt="">
            <span> *عکس مورد نظر از عکس های ذخیره شده حذف خواهد شد.</span>
        </div>
        <div class="pop-up-buttons">
            <button class="ok">حذف</button>
            <button class="cancel">لغو</button>
        </div>

            <div class="show-errors">

            </div>

    </div>
</div>

@stop
