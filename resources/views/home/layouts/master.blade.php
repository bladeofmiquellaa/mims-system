<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="website icon" type="png" href="https://img.icons8.com/fluency-systems-filled/48/home.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/home.css">
</head>
<style>
    .Main{
        padding-top: 95px;

    }
    @media(max-width:950px)
    {
        .Main{
            padding-top: 150px;
        }}
</style>
<body>
<nav id="navbar" class="close">
    <ul class="navbar-nav">
        <li class="nav-item">

            <a class="nav-link" href="/"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4 21V9l8-6l8 6v12h-6v-7h-4v7H4Z"/></svg>صفحه اصلی</a></li>
        <li class="nav-item">
            <a class="nav-link" href="/cases"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 16.88c.56 0 1 .44 1 1s-.44 1-1 1s-1-.45-1-1s.44-1 1-1m0-3c2.73 0 5.06 1.66 6 4c-.94 2.34-3.27 4-6 4s-5.06-1.66-6-4c.94-2.34 3.27-4 6-4m0 1.5a2.5 2.5 0 0 0 0 5a2.5 2.5 0 0 0 0-5M18 3H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h5.42c-.16-.32-.3-.66-.42-1c.12-.34.26-.68.42-1H4v-4h6v2.97c.55-.86 1.23-1.6 2-2.21V13h1.15c1.16-.64 2.47-1 3.85-1c1.06 0 2.07.21 3 .59V5c0-1.1-.9-2-2-2m-8 8H4V7h6v4m8 0h-6V7h6v4Z"/></svg>پرونده ها</a></li>
        <li class="nav-item">
            <a class="nav-link" href="/advsearch"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0-4 0m2-6v4m0 4v8m6-6a2 2 0 0 0-1.042 3.707M12 4v10m4-7a2 2 0 1 0 4 0a2 2 0 0 0-4 0m2-3v1m0 4v2m-3 7a3 3 0 1 0 6 0a3 3 0 1 0-6 0m5.2 2.2L22 22"/></svg>جست و جوی پیشرفته</a></li>
    </ul>
    @if(Auth::check())
        <ul class="logout-mode">
            <li class="nav-item">
                <a href="http://127.0.0.1:8000/user/logout"  class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4 12a1 1 0 0 0 1 1h7.59l-2.3 2.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l4-4a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76a1 1 0 0 0-.21-.33l-4-4a1 1 0 1 0-1.42 1.42l2.3 2.29H5a1 1 0 0 0-1 1ZM17 2H7a3 3 0 0 0-3 3v3a1 1 0 0 0 2 0V5a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-3a1 1 0 0 0-2 0v3a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3Z"/></svg>
                    خروج
                </a>
            </li>
        </ul>
    @endif

</nav>
<div class="Main">
    <div class="header">
        @if (!Auth::check())
            <button class="log-btn" onclick="location.href = '/login';">ورود | ثبت نام</button>
        @else
            <div class="box-profile">
                @if(!Auth::user()->photo=="")
                    <img src="http://127.0.0.1:8000/profile_images/{{Auth::user()->photo}}" alt="" width="30px" height="30px">
                @else
                    <img src="http://127.0.0.1:8000/profile_images/person.png" alt="" width="30px" height="30px">

                @endif
                <div>
                    <p>{{Auth::user()->firstname}}  {{Auth::user()->lastname}}</p>
                    @if(Auth::user()->type=="radiologist")
                        <span>رادیولوژیست</span>
                    @endif
                    @if(Auth::user()->type=="doctor")
                        <span>پزشک</span>
                    @endif
                    @if(Auth::user()->type=="student")
                        <span>دانشجو</span>
                    @endif

                </div>
            </div>
            <div class="Profile">
                <div class="profile-card">
                    <div class="image">
                        @if(!Auth::user()->photo=="")
                            <img src="http://127.0.0.1:8000/profile_images/{{Auth::user()->photo}}" alt="">
                        @else
                            <img src="http://127.0.0.1:8000/profile_images/person.png" alt="" >
                        @endif

                    </div>
                    <div class="data">
                        <h2>{{Auth::user()->firstname}}  {{Auth::user()->lastname}}</h2>
                        @if(Auth::user()->type=="radiologist")
                            <span>رادیولوژیست</span>
                        @endif
                        @if(Auth::user()->type=="doctor")
                            <span>پزشک</span>
                        @endif
                        @if(Auth::user()->type=="student")
                            <span>دانشجو</span>
                        @endif
                    </div>
                    @if(Auth::user()->type=="radiologist")
                        <div class="buttons">
                        <a href="http://127.0.0.1:8000/user/radiologist/dashboard" class="btn">داشبورد</a>
                        </div>
                    @endif
                    @if(Auth::user()->type=="doctor")
                                <div class="buttons">
                        <a href="http://127.0.0.1:8000/user/doctor/dashboard" class="btn">داشبورد</a>
                                </div>
                    @endif
                    @if(Auth::user()->type=="student")
                                        <div class="buttons">
                                            <a href="http://127.0.0.1:8000/user/student/changepassword" class="btn">تغییر رمز عبور</a>
                        <a href="http://127.0.0.1:8000/user/student/editprofile" class="btn">پروفایل</a>

                                        </div>
                    @endif

                </div>
            </div>
        @endif



        <div class="Search">
            <a href="http://127.0.0.1:8000/advsearch" title="جست و جوی پیشرفته"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10a2 2 0 1 0 4 0a2 2 0 0 0-4 0m2-6v4m0 4v8m6-6a2 2 0 0 0-1.042 3.707M12 4v10m4-7a2 2 0 1 0 4 0a2 2 0 0 0-4 0m2-3v1m0 4v2m-3 7a3 3 0 1 0 6 0a3 3 0 1 0-6 0m5.2 2.2L22 22"/></svg></a>
            <div class="SearchBox" style="background-color: white;">
                <div class="input-Box">
                    <input type="text"  placeholder="جست و جو">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="currentColor" d="M10.68 11.74a6 6 0 0 1-7.922-8.982a6 6 0 0 1 8.982 7.922l3.04 3.04a.749.749 0 0 1-.326 1.275a.749.749 0 0 1-.734-.215ZM11.5 7a4.499 4.499 0 1 0-8.997 0A4.499 4.499 0 0 0 11.5 7Z"/></svg>
                </div>
                <div class="Search-result" style="display: none;">

                </div>
            </div>
        </div>
        <div class="logo-menu">
            <div id="menu-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20 7H4m16 5H4m16 5H4"/></svg>
            </div>
            <a class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 64 64"><path fill="currentColor" d="M31.624 17.396a8.568 8.568 0 1 0 0-17.134c-4.732 0-8.57 3.836-8.57 8.566a8.57 8.57 0 0 0 8.57 8.568zm11.305 2.607H32.842v8l1.855.454v-1.855c0-1.205 1.098-2.299 3.102-.952c2.823 1.903 5.862 12.712 2.566 12.286c-1.591-.203-2.49-.975-4.242-1.073c-1.423-.073-1.423-.685-1.425-1.49c-.002-.805 0-3.389 0-3.389v-1.44a277.9 277.9 0 0 1-1.855-.453v9.893s2.781-1.891 4.77-.35c1.254.975 2.039 3.781-1.84 6.068c-.895.545-5.768 1.834-7.297-1.036h-1.725a1.412 1.412 0 0 0 0 2.824h10.215a2.932 2.932 0 0 1 2.928 2.93a2.93 2.93 0 0 1-2.928 2.928h-10.57a.66.66 0 0 0 0 1.316h10.57c1.614 0 2.928 1.314 2.928 2.93s-1.314 2.928-2.928 2.928H24.604a1.135 1.135 0 1 1 0-2.272h12.362a.658.658 0 0 0 0-1.315h-10.57a2.933 2.933 0 0 1-2.928-2.928a2.934 2.934 0 0 1 2.928-2.932h10.57a.658.658 0 0 0 0-1.314H26.751a3.686 3.686 0 0 1-3.68-3.683a3.687 3.687 0 0 1 3.68-3.684h2.28c.015 0 .027.008.042.008h.776c.754 0 .725-.798.723-.798V30.21l-1.853.514v1.259s.002 2.584 0 3.389c0 .805-.006 1.417-1.425 1.491c-1.75.098-2.649.87-4.244 1.073c-3.295.425-.254-10.383 2.563-12.287c2.003-1.348 3.106-.254 3.106.952v2.016l1.853-.512V20h-9.643c-6.063 0-11.471 4.913-11.471 10.975v26.567c0 2.073 1.631 3.754 3.699 3.754a3.75 3.75 0 0 0 3.75-3.754V33.588h3.106v29.001h23.354V33.588h3.139v23.954c0 2.073 1.679 3.754 3.751 3.754s3.702-1.681 3.702-3.754V30.975c-.001-6.059-4.968-10.972-11.029-10.972z"/></svg>
                مدیریت تصاویر پزشکی
            </a>
        </div>
    </div>

    @yield('content')

    <footer class="footer">
        <ul class="social-icon">
            <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5 2h2.5L11 2h-2.5zM13 2h2.5L15.5 2h-2.5zM10.5 2h5v0h-5zM8.5 2h5v0h-5zM10 2h3.5L13.5 2h-3.5z"><animate fill="freeze" attributeName="d" dur="0.8s" keyTimes="0;0.3;0.5;1" values="M8.5 2h2.5L11 2h-2.5zM13 2h2.5L15.5 2h-2.5zM10.5 2h5v0h-5zM8.5 2h5v0h-5zM10 2h3.5L13.5 2h-3.5z;M8.5 2h2.5L11 22h-2.5zM13 2h2.5L15.5 22h-2.5zM10.5 2h5v2h-5zM8.5 20h5v2h-5zM10 2h3.5L13.5 22h-3.5z;M8.5 2h2.5L11 22h-2.5zM13 2h2.5L15.5 22h-2.5zM10.5 2h5v2h-5zM8.5 20h5v2h-5zM10 2h3.5L13.5 22h-3.5z;M1 2h2.5L18.5 22h-2.5zM5.5 2h2.5L23 22h-2.5zM3 2h5v2h-5zM16 20h5v2h-5zM18.5 2h3.5L5 22h-3.5z"/></path></svg>
                </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 448 512"><path fill="currentColor" d="m446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9l-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9l190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284L16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"/></svg>
                </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3Z"/></svg>
                </a></li>
        </ul>
        <ul class="menu">
            <li class="menu__item"><a class="menu__link" href="/">صفحه اصلی</a></li>
            @if (!Auth::check())
                <li class="menu__item"><a class="menu__link" href="/login">ورود</a></li>
            @else

            @endif
            <li class="menu__item"><a class="menu__link" href="/cases">لیست پرونده ها</a></li>
            <li class="menu__item"><a class="menu__link" href="http://127.0.0.1:8000/advsearch">جست و جوی پیشرفته</a></li>

        </ul>
        <p>&copy;تمامی حقوق مادی و معنوی این وبسایت محفوظ می باشد و کپی برداری به هر نحوه پیگرد قانونی خواهد داشت</p>
    </footer>

</div>


<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>

<script src="/js/home.js"></script>

</body>
</html>
