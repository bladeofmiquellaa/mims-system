@extends('user.dr.dashboard.layouts.master')
@section('content')
    <title>ویرایش پروفایل</title>
    <form action="/user/doctor/editingprofile" method="post" enctype="multipart/form-data">
        <div class="Edit-Profile container">
            <div class="Edit-Profile-header">
                <svg style="margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 2048 2048"><path fill="currentColor" d="M1243 1236q-45-51-99-90t-116-67t-126-41t-134-14q-88 0-170 23t-153 64t-129 100t-100 130t-65 153t-23 170H0q0-120 35-231t101-205t156-167t204-115q-113-74-176-186t-64-248q0-106 40-199t109-163T568 40T768 0q106 0 199 40t163 109t110 163t40 200q0 66-16 129t-48 119t-75 103t-101 83q84 32 158 82t135 117l-90 91zM384 512q0 80 30 149t82 122t122 83t150 30q79 0 149-30t122-82t83-122t30-150q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149zm1464 384q42 0 78 15t64 41t42 63t16 79q0 39-15 76t-43 65l-717 717l-377 94l94-377l717-716q29-29 65-43t76-14zm51 249q21-21 21-51q0-31-20-50t-52-20q-14 0-27 4t-23 15l-692 692l-34 135l135-34l692-691z"/></svg>
                ویرایش پروفایل
            </div>

                <div class="Edit-Profile-main">
                    <div class="Edit-Profile-img">
                        @if(!Auth::user()->photo=="")
                            <img src="http://127.0.0.1:8000/profile_images/{{Auth::user()->photo}}" alt="">
                        @else
                            <img src="http://127.0.0.1:8000/profile_images/person.png" alt="" >
                        @endif

                        <label class="btn btn-default btn-file">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"><path stroke-dasharray="2 4" stroke-dashoffset="6" d="M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3"><animate attributeName="stroke-dashoffset" dur="0.6s" repeatCount="indefinite" values="6;0"/></path><path stroke-dasharray="30" stroke-dashoffset="30" d="M12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.1s" dur="0.3s" values="30;0"/></path><path stroke-dasharray="10" stroke-dashoffset="10" d="M12 16v-7.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="10;0"/></path><path stroke-dasharray="6" stroke-dashoffset="6" d="M12 8.5l3.5 3.5M12 8.5l-3.5 3.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="6;0"/></path></g></svg>
                            <input type="file" accept="image/*" style="display: none;" id="upload" name="profile_images[]">
                        </label>
                    </div>

                    <div class="Edit-Profile-input">

                        <div>
                            <label >نام</label>
                            <input type="text"   value="{{$user['firstname']}}" name="firstname">
                        </div>
                        <div>
                            <label>نام خانوادگی</label>
                            <input type="text"   value="{{$user['lastname']}}" name="lastname">
                        </div>
                        <div>
                            <label>نام کاربری</label>
                            <input type="text"  value="{{$user['username']}}" name="username" autocomplete="off">
                        </div>
                        <div>
                            <label fo>شماره موبایل</label>
                            <input type="tel" value="{{$user['phone']}}" style="direction: ltr;" name="phone">
                        </div>
                        <div class="buttons">
                            <button style="margin-left: 10px;">ذخیره</button>
                            <a href='javascript:history.back()'>لغو</a>
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

                </div>

        </div>
    </form>
@stop
