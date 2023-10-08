<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="/css/dashboard.css">

    <link rel="website icon" type="png" href="https://img.icons8.com/material-outlined/48/show-property.png">

</head>
<body>
<nav>
    <div class="logo-name">
        <i class="uil uil-bars"></i>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li ><a href="/">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">صفحه اصلی</span>
                </a></li>
            <li ><a href="http://127.0.0.1:8000/user/doctor/dashboard">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></g></svg>
                    </i>

                    <span class="link-name">داشبورد</span>
                </a></li>
            <li ><a href="http://127.0.0.1:8000/user/doctor/addcase">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z"/><path fill="currentColor" d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2Zm0 2a8 8 0 1 0 0 16a8 8 0 0 0 0-16Zm0 3a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 0 1 1-1Z"/></g></svg>
                    </i>
                    <span class="link-name">افزودن پرونده
                    </span>

                </a>
            </li>
            <li ><a href="http://127.0.0.1:8000/user/doctor/caselist">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="currentColor" d="M17 16.88c.56 0 1 .44 1 1s-.44 1-1 1s-1-.45-1-1s.44-1 1-1m0-3c2.73 0 5.06 1.66 6 4c-.94 2.34-3.27 4-6 4s-5.06-1.66-6-4c.94-2.34 3.27-4 6-4m0 1.5a2.5 2.5 0 0 0 0 5a2.5 2.5 0 0 0 0-5M18 3H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h5.42c-.16-.32-.3-.66-.42-1c.12-.34.26-.68.42-1H4v-4h6v2.97c.55-.86 1.23-1.6 2-2.21V13h1.15c1.16-.64 2.47-1 3.85-1c1.06 0 2.07.21 3 .59V5c0-1.1-.9-2-2-2m-8 8H4V7h6v4m8 0h-6V7h6v4Z"/></svg>
                    </i>
                    <span class="link-name">لیست پرونده ها</span>
                </a></li>
            <li ><a href="http://127.0.0.1:8000/user/doctor/sendinvitation">
                    <i class="uil uil-share"></i>
                    <span class="link-name">ارسال لینک دعوت</span>
                </a></li>

            <li ><a href="http://127.0.0.1:8000/user/doctor/comments">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">نظرات</span>
                </a></li>
        </ul>


        <ul class="logout-mode">
            <li>
                <a href="http://127.0.0.1:8000/user/doctor/editprofile">
                    <i >
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M15.49 7.3h-1.16v6.35H1.67V3.28H8V2H1.67A1.21 1.21 0 0 0 .5 3.28v10.37a1.21 1.21 0 0 0 1.17 1.25h12.66a1.21 1.21 0 0 0 1.17-1.25z"/><path fill="currentColor" d="M10.56 2.87L6.22 7.22l-.44.44l-.08.08l-1.52 3.16a1.08 1.08 0 0 0 1.45 1.45l3.14-1.53l.53-.53l.43-.43l4.34-4.36l.45-.44l.25-.25a2.18 2.18 0 0 0 0-3.08a2.17 2.17 0 0 0-1.53-.63a2.19 2.19 0 0 0-1.54.63l-.7.69l-.45.44zM5.51 11l1.18-2.43l1.25 1.26zm2-3.36l3.9-3.91l1.3 1.31L8.85 9zm5.68-5.31a.91.91 0 0 1 .65.27a.93.93 0 0 1 0 1.31l-.25.24l-1.3-1.3l.25-.25a.88.88 0 0 1 .69-.25z"/></svg>
                    </i>
                    <span class="link-name">ویرایش پروفایل</span>
                </a>
            </li>

            <li>
                <a href="http://127.0.0.1:8000/user/doctor/changepassword">
                    <i >
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="currentColor" d="M12.63 2c5.53 0 10.01 4.5 10.01 10s-4.48 10-10.01 10c-3.51 0-6.58-1.82-8.37-4.57l1.58-1.25C7.25 18.47 9.76 20 12.64 20a8 8 0 0 0 8-8a8 8 0 0 0-8-8C8.56 4 5.2 7.06 4.71 11h2.76l-3.74 3.73L0 11h2.69c.5-5.05 4.76-9 9.94-9m2.96 8.24c.5.01.91.41.91.92v4.61c0 .5-.41.92-.92.92h-5.53c-.51 0-.92-.42-.92-.92v-4.61c0-.51.41-.91.91-.92V9.23c0-1.53 1.25-2.77 2.77-2.77c1.53 0 2.78 1.24 2.78 2.77v1.01m-2.78-2.38c-.75 0-1.37.61-1.37 1.37v1.01h2.75V9.23c0-.76-.62-1.37-1.38-1.37Z"/></svg>
                    </i>
                    <span class="link-name">تغییر رمز عبور</span>
                </a>
            </li>

            <li><a href="http://127.0.0.1:8000/user/logout">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">خروج</span>
                </a></li>
            </li>
        </ul>
    </div>
</nav>
<section class="dashboard">
    <div class="header">
        <i class="uil uil-bars sidebar-toggle"></i>
        <div class="box-profile">
            @if(!Auth::user()->photo=="")
                <img src="http://127.0.0.1:8000/profile_images/{{Auth::user()->photo}}" alt="" width="30px" height="30px">
            @else
                <img src="http://127.0.0.1:8000/profile_images/person.png" alt="" width="30px" height="30px">
            @endif
            <div>
                <p> {{Auth::user()->firstname }} {{Auth::user()->lastname }}</p>
                <span>پزشک</span>
            </div>
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
                <h2>{{Auth::user()->firstname }} {{Auth::user()->lastname }} </h2>
                <span>پزشک</span>
            </div>
            <div class="buttons">
                <a href="http://127.0.0.1:8000/user/doctor/editprofile" class="btn">ویرایش پروفایل</a>
                <a href="http://127.0.0.1:8000/user/doctor/changepassword" class="btn">تغییر رمز عبور</a>
            </div>
        </div>
    </div>

    @yield('content')

</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="/js/dashboard.js"></script>

</body>
</html>
