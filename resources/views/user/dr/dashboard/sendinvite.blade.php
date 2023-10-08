@extends('user.dr.dashboard.layouts.master')
@section('content')
    <title>ارسال لینک دعوت</title>
    <form action="/user/doctor/sendinginvitation" method="post" enctype="multipart/form-data">
        <div class="case container">
            <div class="case-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="m21.707 11.293l-8-8A1 1 0 0 0 12 4v3.545A11.015 11.015 0 0 0 2 18.5V20a1 1 0 0 0 1.784.62a11.456 11.456 0 0 1 7.887-4.049c.05-.006.175-.016.329-.026V20a1 1 0 0 0 1.707.707l8-8a1 1 0 0 0 0-1.414ZM14 17.586V15.5a1 1 0 0 0-1-1c-.255 0-1.296.05-1.562.085a14.005 14.005 0 0 0-7.386 2.948A9.013 9.013 0 0 1 13 9.5a1 1 0 0 0 1-1V6.414L19.586 12Z"/></svg>
                ارسال لینک دعوت
            </div>
            <form>
                <div class="case-main">
                    <div class="case-input">

                        <div>
                            <label >ایمیل</label>
                            <input type="email"  name="email" autocomplete="off">
                        </div>
                        <div>
                            <label>توضیحات</label>
                            <textarea name="description"></textarea>
                        </div>

                    </div>

                    <div class="buttons">
                        <button style="margin-left: 10px;">ارسال</button>
                        <a href='javascript:history.back()'>لغو</a>
                    </div>



                    <div class="show-errors">
                        @if (isset($message))
                            <div class="alert alert-success ">
                            {{$message}}
                            </div>
                        @endif
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

    </form>
@stop
