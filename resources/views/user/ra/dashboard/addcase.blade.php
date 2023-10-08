@extends('user.ra.dashboard.layouts.master')
@section('content')
    <title>افزودن پرونده</title>
    <div class="case container">
        <div class="case-header">
            <svg style="margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512"><path fill="#4da3ff" d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zm149.3 277.3c0 11.8-9.5 21.3-21.3 21.3h-85.3V384c0 11.8-9.5 21.3-21.3 21.3h-42.7c-11.8 0-21.3-9.6-21.3-21.3v-85.3H128c-11.8 0-21.3-9.6-21.3-21.3v-42.7c0-11.8 9.5-21.3 21.3-21.3h85.3V128c0-11.8 9.5-21.3 21.3-21.3h42.7c11.8 0 21.3 9.6 21.3 21.3v85.3H384c11.8 0 21.3 9.6 21.3 21.3v42.7z"/></svg>
            افزودن پرونده
        </div>
        <form action="creatingcase" method="post" enctype="multipart/form-data">
            <div class="case-main">
                <div class="case-input">
                    <div>
                        <label >عنوان</label>
                        <input type="text"  name="title" autocomplete="off" value="{{old('title')}}">
                    </div>
                    <div>
                        <label>نام بیمار</label>
                        <input type="text"  name="patient_name" autocomplete="off" value="{{old('patient_name')}}">
                    </div>
                    <div>
                        <label>جنسیت</label>
                        <select name="gender" >
                            <option >مرد</option>
                            <option >زن</option>
                        </select>
                    </div>
                    <div>
                        <label>سن</label>
                        <input type="number" name="age" autocomplete="off" value="{{old('age')}}">
                    </div>
                    <div>
                        <label >محل زندگی</label>
                        <input type="text"  name="location" value="{{old('age')}}">
                    </div>
                    <div>
                        <label >عضو بدن مرتبط</label>
                        <select name="organs_id" >
                            <option></option>
                            @foreach($organs as $organ)
                                <option value="{{$organ['name']}}">{{$organ['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>سابقه بیماری</label>
                        <input type="text" name="history" autocomplete="off" value="{{old('age')}}">
                    </div>
                    <div>
                        <label>کد نظام پزشکی</label>
                        <input type="number"   name="medical_code" autocomplete="off" value="{{old('medical_code')}}">
                    </div>
                    <div>
                        <label >وضعیت</label>
                        <select name="state" >
                            <option></option>
                            <option value="not approved">انتشار</option>
                            <option value="ra_draft">ذخیره پیشفرض</option>
                        </select>
                    </div>
                </div>

                <div class="case-img">
                    <div class="upload-icon">
                        <label class="btn-default btn-file">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" d="M18 15v3h-3v2h3v3h2v-3h3v-2h-3v-3h-2m-4.7 6H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h14c1.1 0 2 .9 2 2v8.3c-.6-.2-1.3-.3-2-.3c-1.1 0-2.2.3-3.1.9L14.5 12L11 16.5l-2.5-3L5 18h8.1c-.1.3-.1.7-.1 1c0 .7.1 1.4.3 2Z"/></svg>
                            <input type="file" accept="image/*" style="display: none;" id="upload-case-img" multiple name="images[]">
                        </label>
                        <span class="clear"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" d="M10 4a2 2 0 1 1 4 0v6h6v4H4v-4h6V4ZM4 14h16v8H4v-8Zm12 8v-5.635M8 22v-5.635M12 22v-5.635"/></svg></span>
                    </div>
                    <div class="gallery">
                        <div class="selected-box">

                        </div>
                    </div>

                </div>
                <div class="buttons">
                    <button style="margin-left: 10px;">افزودن</button>
                    <a href='javascript:history.back()'>لغو</a>
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
            </div>
        </form>
    </div>
    <div class="fullImage">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-dasharray="16" stroke-dashoffset="16" stroke-linecap="round" stroke-width="2"><path d="M7 7L17 17"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="16;0"/></path><path d="M17 7L7 17"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.4s" values="16;0"/></path></g></svg>
        <img>
    </div>

@stop
