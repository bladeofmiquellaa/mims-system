<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام</title>
    <link rel="website icon" type="png" href="https://img.icons8.com/tiny-glyph/16/add-user-male.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/home.css">
    <style>
        .Main{
            background: linear-gradient(-43deg, #c1c9c1 0%,#ffffff 100%);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
    </style>
</head>
<body>
<div class="Main">
    <div class="sign-up">
        <form action="user/signup" method="post">
            <div class="back">
                <a href="/login"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24"><path fill="currentColor" d="m6.8 13l2.9 2.9q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T3.426 12q0-.2.063-.375T3.7 11.3l4.6-4.6q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7L6.8 11H20q.425 0 .713.288T21 12q0 .425-.288.713T20 13H6.8Z"/></svg></a>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M15 14c-2.67 0-8 1.33-8 4v2h16v-2c0-2.67-5.33-4-8-4m-9-4V7H4v3H1v2h3v3h2v-3h3v-2m6 2a4 4 0 0 0 4-4a4 4 0 0 0-4-4a4 4 0 0 0-4 4a4 4 0 0 0 4 4Z"/></svg>
            </div>
            <p class="header-p">ثبت نام</p>
            <input type="text" placeholder="نام" name="firstname" value="{{old('firstname')}}">
            <input type="text" placeholder="نام خانوادگی" name="lastname" value="{{old('lastname')}}">
            <input type="text" placeholder="نام کاربری" name="username" autocomplete="off" value="{{old('username')}}">
            <input type="text" placeholder="ایمیل" name="email" value="{{old('email')}}">
            <input type="password" placeholder="رمز عبور" name="password">
            <input type="password" placeholder="تکرار رمز عبور" name="password_confirmation">
            <div class="radio-btn">
                <input type="radio" name="type" value="radiologist" checked id="Radiologist">
                <label for="Radiologist">رادیولوژیست</label>
                <input type="radio" name="type" value="doctor" id="Doctor">
                <label for="Doctor">پزشک</label>

            </div>
            <input type="text" style="display: none;" placeholder="شماره نظام پزشکی" name="medical_code" value="{{old('medical_code')}}">
            <input type="tel" placeholder="09" style="direction: ltr;" name="phone" value="{{old('phone')}}">
            <p><span>0912******* </span>:مثال</p>
            <button type="submit" class="sign-up-btn">ثبت نام</button>
            <div class="show-errors">
                @if ($errors->any())
                    <div class="alert alert-danger ">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="/js/home.js"></script>
</body>
</html>
