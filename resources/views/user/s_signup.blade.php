<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام دانشجو</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/home.css">
</head>
<body>
<div class="Main">
    <div class="sign-up">
        <form action="../../user/signup" method="post">
            <p class="header-p">ثبت نام دانشجو</p>
            <input type="text" placeholder="نام" name="firstname" value="{{old('firstname')}}">
            <input type="text" placeholder="نام خانوادگی" name="lastname" value="{{old('lastname')}}">
            <input type="text" placeholder="نام کاربری" name="username" autocomplete="off" value="{{old('username')}}">
            <input type="text" placeholder="ایمیل" name="email" value="{{old('email')}}">
            <input type="password" placeholder="رمز عبور" name="password" >
            <input type="password" placeholder="تکرار رمز عبور" name="password_confirmation" >
            <input type="tel" placeholder="09" style="direction: ltr;" name="phone" value="{{old('phone')}}">
            <input type="text" value="student" name="type" style="display: none">
            <input type="text" value="{{$token_body}}" name="token_body" style="display: none">
            <input type="text" value="{{$invitation_id}}" name="invitation_id" style="display: none">

        <p><span>0912******* </span>:مثال</p>

            @if ($errors->any())
                <div class="alert alert-danger ">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                </div>
            @endif

        <button type="submit" class="s-sign-up-btn">ثبت نام</button>
        </form>
     </div>
</div>
     <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
   <script src="../../js/home.js"></script>
</body>
</html>
