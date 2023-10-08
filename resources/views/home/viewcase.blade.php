@extends('home.layouts.master')
@section('content')
    <title>{{$case['title']}}</title>
      <div class="viewCase container">
        <div class="case-name col-md-12">
            <div>
                <svg style="margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 32 32"><circle cx="16" cy="19" r="2" fill="currentColor"/><path fill="currentColor" d="M23.777 18.479A8.64 8.64 0 0 0 16 13a8.64 8.64 0 0 0-7.777 5.479L8 19l.223.521A8.64 8.64 0 0 0 16 25a8.64 8.64 0 0 0 7.777-5.479L24 19ZM16 23a4 4 0 1 1 4-4a4.005 4.005 0 0 1-4 4Z"/><path fill="currentColor" d="M27 3H5a2 2 0 0 0-2 2v22a2 2 0 0 0 2 2h22a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2ZM5 5h22v4H5Zm0 22V11h22v16Z"/></svg>
                {{$case['title']}}
            </div>
            <a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24"><path fill="currentColor" d="m6.8 13l2.9 2.9q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T3.426 12q0-.2.063-.375T3.7 11.3l4.6-4.6q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7L6.8 11H20q.425 0 .713.288T21 12q0 .425-.288.713T20 13H6.8Z"/></svg></a>


        </div>

        <div class="col-md-12">
            <div class="all-images">

                <img src="http://127.0.0.1:8000/case_images/{{$images['0']['name']}}" class="active">
                @for($i=1;$i<$images->count();$i++)
                    <img src="http://127.0.0.1:8000/case_images/{{$images[$i]['name']}}">
                @endfor
            </div>
        </div>
        <div class="col-md-12">
            <div class="image-slider col-md-6">

                <svg id="next" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M9.31 6.71a.996.996 0 0 0 0 1.41L13.19 12l-3.88 3.88a.996.996 0 1 0 1.41 1.41l4.59-4.59a.996.996 0 0 0 0-1.41L10.72 6.7c-.38-.38-1.02-.38-1.41.01z"/></svg>
                <div id="slider">
                    <img src="http://127.0.0.1:8000/case_images/{{$images['0']['name']}}" class="active">
                </div>
                <svg id="prev" style="opacity: 0.2;"  xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><g transform="rotate(180 12 12)"><path fill="currentColor" d="M9.31 6.71a.996.996 0 0 0 0 1.41L13.19 12l-3.88 3.88a.996.996 0 1 0 1.41 1.41l4.59-4.59a.996.996 0 0 0 0-1.41L10.72 6.7c-.38-.38-1.02-.38-1.41.01z"/></g></svg>
            </div>
        </div>

        <div class="information  col-md-12 row">


            <div class="col-md-6">
                <label>عنوان</label>
                <p>{{$case['title']}}</p>
            </div>

            <div class="col-md-6">
                <label>محل ایجاد پرونده</label>
                <p>{{$case['location']}}</p>
            </div>

            <div class="col-md-6">
                <label>سن</label>
                <p>{{$case['age']}}</p>
            </div>

            <div class="col-md-6">
                <label>جنسیت</label>
                <p>{{$case['gender']}}</p>
            </div>

            <div class="col-md-6">
                <label>عضو بدن مرتبط</label>
                <p>{{$case['organs_name']}}</p>
            </div>

            <div class="col-md-6">
                <label>کتگوری</label>
                <p>{{$case['category_name']}}</p>
            </div>

            <div class="col-md-6">
                <label>ساب کتگوری</label>
                <p>{{$case['subcategory_name']}}</p>
            </div>

            <div class="col-md-6">
                <label>نام پزشک</label>
                <p>{{$case['doctor_name']}}</p>
            </div>

            <div class="col-md-6">
                <label>سابقه بیماری</label>
                <p>{{$case['history']}}</p>
            </div>

            <div class="col-md-6">
                <label>یافته ها</label>
                <p>{{$case['findings']}}</p>
            </div>

            <div class="col-md-6">
                <label>تشخیص پزشک</label>
                <p>{{$case['diagnosis']}}</p>
            </div>



        </div>

         </div>

         <div class="Comments-Box container">
             <div class="Comments-Box-header">
                 <div class="box1">
                     <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 12 12"><path fill="currentColor" d="M12 3.5a3.5 3.5 0 1 1-7 0a3.5 3.5 0 0 1 7 0Zm-1.646-1.354a.5.5 0 0 0-.708 0L8 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0 0-.708ZM8.5 8a4.48 4.48 0 0 0 2.484-.747A2 2 0 0 1 9 9H6.651l-2.874 1.916A.5.5 0 0 1 3 10.5V9a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1.758A4.5 4.5 0 0 0 8.5 8Z"/></svg>
                     <p>نظرات کاربران</p>
                 </div>
                 <div class="box2">
                     <p class="comment-count">4</p>
                 </div>
             </div>
            <div class="reply-alert alert alert-secondary">
               <p>شما در حال پاسخ به <span></span> هستید برای لغو کلیک کنید...</p>
            </div>


                    <div class="Add-comment">
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <form action="http://127.0.0.1:8000/store_comment/{{$case['id']}}" method="post">
                        <textarea placeholder="نظر خود را بنویسید..." name="body"></textarea>
                        <input type="text" name="reply-to" style="display: none;">
                        <div id="Add-comment-btn"><button>ثبت نظر</button></div>
                </form>
                <p>نظر شما پس از بررسی و تایید منتشر خواهد شد...</p>
                @else
                            <div class="need-to">
                                <div>برای انتشار دیدگاه خود </div>
                                <div class="need-to-link"><a href="http://127.0.0.1:8000/login"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4m-5-4l5-5l-5-5m5 5H3"/></svg>وارد پنل کاربری خود شوید</a></div>
                                <div> یا در سایت </div>
                                <div class="need-to-link"><a href="http://127.0.0.1:8000/signup"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15 14c-2.67 0-8 1.33-8 4v2h16v-2c0-2.67-5.33-4-8-4m-9-4V7H4v3H1v2h3v3h2v-3h3v-2m6 2a4 4 0 0 0 4-4a4 4 0 0 0-4-4a4 4 0 0 0-4 4a4 4 0 0 0 4 4Z"/></svg>عضو شوید</a></div>
                            </div>
{{--                    <p>برای ثبت نظر باید ابتدا وارد سامانه شوید</p>--}}
                    @endif


                <input type="text" name="case-id" style="display: none;" value="{{$case['id']}}">
            </div>

             <div class="comments">
               <div class="comment">



               </div>

             </div>

          </div>
      <div class="fullImage">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-dasharray="16" stroke-dashoffset="16" stroke-linecap="round" stroke-width="2"><path d="M7 7L17 17"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="16;0"/></path><path d="M17 7L7 17"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.4s" values="16;0"/></path></g></svg>
        <img>
    </div>

      @stop
