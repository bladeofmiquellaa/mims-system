<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <title>لیست پرونده ها</title>
    <link rel="website icon" type="png" href="https://img.icons8.com/material-outlined/48/show-property.png">
    <style>
        .CasesTableHeader{
            align-items: flex-end;
        }
        .CasesTableHeader .filter{
            align-items:flex-end;
        }
    </style>
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
            <li class="list"><a href="http://127.0.0.1:8000/user/radiologist/dashboard">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">داشبورد</span>
                </a></li>
            <li class="list"><a href="http://127.0.0.1:8000/user/radiologist/addcase">
                    <i >
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z"/><path fill="currentColor" d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2Zm0 2a8 8 0 1 0 0 16a8 8 0 0 0 0-16Zm0 3a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 0 1 1-1Z"/></g></svg>
                    </i>
                    <span class="link-name">افزودن پرونده
                </span>

                </a>
            </li>
            <li class="list"><a href="http://127.0.0.1:8000/user/radiologist/caselist">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="currentColor" d="M17 16.88c.56 0 1 .44 1 1s-.44 1-1 1s-1-.45-1-1s.44-1 1-1m0-3c2.73 0 5.06 1.66 6 4c-.94 2.34-3.27 4-6 4s-5.06-1.66-6-4c.94-2.34 3.27-4 6-4m0 1.5a2.5 2.5 0 0 0 0 5a2.5 2.5 0 0 0 0-5M18 3H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h5.42c-.16-.32-.3-.66-.42-1c.12-.34.26-.68.42-1H4v-4h6v2.97c.55-.86 1.23-1.6 2-2.21V13h1.15c1.16-.64 2.47-1 3.85-1c1.06 0 2.07.21 3 .59V5c0-1.1-.9-2-2-2m-8 8H4V7h6v4m8 0h-6V7h6v4Z"/></svg>
                    </i>
                    <span class="link-name">لیست پرونده ها</span>
                </a></li>
        </ul>

        <ul class="logout-mode">
            <li>
                <a href="http://127.0.0.1:8000/user/radiologist/editprofile">
                    <i >
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M15.49 7.3h-1.16v6.35H1.67V3.28H8V2H1.67A1.21 1.21 0 0 0 .5 3.28v10.37a1.21 1.21 0 0 0 1.17 1.25h12.66a1.21 1.21 0 0 0 1.17-1.25z"/><path fill="currentColor" d="M10.56 2.87L6.22 7.22l-.44.44l-.08.08l-1.52 3.16a1.08 1.08 0 0 0 1.45 1.45l3.14-1.53l.53-.53l.43-.43l4.34-4.36l.45-.44l.25-.25a2.18 2.18 0 0 0 0-3.08a2.17 2.17 0 0 0-1.53-.63a2.19 2.19 0 0 0-1.54.63l-.7.69l-.45.44zM5.51 11l1.18-2.43l1.25 1.26zm2-3.36l3.9-3.91l1.3 1.31L8.85 9zm5.68-5.31a.91.91 0 0 1 .65.27a.93.93 0 0 1 0 1.31l-.25.24l-1.3-1.3l.25-.25a.88.88 0 0 1 .69-.25z"/></svg>
                    </i>
                    <span class="link-name">ویرایش پروفایل</span>
                </a>
            </li>

            <li>
                <a href="http://127.0.0.1:8000/user/radiologist/changepassword">
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
                <p>{{Auth::user()->lastname }} {{Auth::user()->firstname }}</p>
                <span>رادیولوژیست</span>
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
                <h2>{{Auth::user()->firstname }} {{Auth::user()->lastname }}</h2>
                <span>رادیولوژیست</span>
            </div>
            <div class="buttons">
                <a href="http://127.0.0.1:8000/user/radiologist/editprofile" class="btn">ویرایش پروفایل</a>
                <a href="http://127.0.0.1:8000/user/radiologist/changepassword" class="btn">تغییر رمز عبور</a>
            </div>
        </div>
    </div>
    <div class="container RadiologistCasesTable" style="margin: 70px 0px 35px 0px;">
        <div class="CasesTableHeader">

            <div class="CasesTableSearch">
                <input type="text" placeholder= "جست و جو">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21l-6-6m2-5a7 7 0 1 1-14 0a7 7 0 0 1 14 0Z"/></svg>
            </div>

            <div class="filter">
                <svg class="confirmed" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M2 5.75A.75.75 0 0 1 2.75 5h18a.75.75 0 0 1 0 1.5h-18A.75.75 0 0 1 2 5.75Zm0 4A.75.75 0 0 1 2.75 9h18a.75.75 0 0 1 0 1.5h-18A.75.75 0 0 1 2 9.75Zm18.211 2.909a.75.75 0 0 1 .13 1.052l-3.9 5a.75.75 0 0 1-1.165.021l-2.1-2.5a.75.75 0 1 1 1.148-.964l1.504 1.79l3.33-4.27a.75.75 0 0 1 1.053-.13ZM2 13.75a.75.75 0 0 1 .75-.75h7a.75.75 0 0 1 0 1.5h-7a.75.75 0 0 1-.75-.75Zm0 4a.75.75 0 0 1 .75-.75h7a.75.75 0 0 1 0 1.5h-7a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/></svg>
                <svg class="not-confirmed" xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 20 20"><path fill="currentColor" d="M17.5 5a.5.5 0 0 1 0 1h-15a.5.5 0 0 1 0-1h15Zm0 3a.5.5 0 0 1 0 1h-15a.5.5 0 0 1 0-1h15Zm-7.243 3a5.503 5.503 0 0 0-.657 1H2.5a.5.5 0 0 1 0-1h7.757ZM9 14.5c0 .168.008.335.022.5H2.5a.5.5 0 0 1 0-1h6.522a5.571 5.571 0 0 0-.022.5Zm5.5 4.5a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9Zm1.146-2.646L14.5 15.207l-1.146 1.147a.5.5 0 0 1-.708-.708l1.147-1.146l-1.147-1.146a.5.5 0 0 1 .708-.708l1.146 1.147l1.146-1.147a.5.5 0 0 1 .708.708L15.207 14.5l1.147 1.146a.5.5 0 0 1-.708.708Z"/></svg>
                <svg class="draft" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>

                <div class="select-box">

                    <ul style="padding: 0%; margin: 0%;margin-bottom: 7px;">
                        <li class="menu" id="organ-list">
                            <a><Span>انتخاب ارگان بدن</Span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 14.95q-.2 0-.375-.062t-.325-.213l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213T12 14.95Z"/></svg>
                                <svg style="display: none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g transform="rotate(180 12 12)"><path fill="currentColor" d="M12 14.95q-.2 0-.375-.062t-.325-.213l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213T12 14.95Z"/></g></svg>
                            </a>

                            <ul  class="submenu">
                                @foreach($organs as $organ)
                                    <li value="{{$organ['name']}}">{{$organ['name']}}</li>
                                @endforeach
                                <li>انتخاب ارگان بدن</li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="table-box">
            <table id="myTable">
                <thead>
                <tr>
                    <th></th>

                    <th>
                        <div class="justify">عنوان
                            <div class="box">
                                <div class="dec" onclick="sortTableByAlphabet(this)"></div>
                                <div class="inc" onclick="sortTableByAlphabet(this)" ></div>
                            </div>
                        </div>
                    </th>



                    <th>
                        <div class="justify">نام بیمار
                            <div class="box">
                                <div class="dec" onclick="sortTableByAlphabet(this)"></div>
                                <div class="inc" onclick="sortTableByAlphabet(this)" ></div>
                            </div>
                        </div>
                    </th>

                    <th>
                        <div class="justify">ارگان
                            <div class="box">
                                <div class="dec" onclick="sortTableByAlphabet(this)"></div>
                                <div class="inc" onclick="sortTableByAlphabet(this)" ></div>
                            </div>
                        </div>
                    </th>

                    <th>
                        <div class="justify">نام پزشک
                            <div class="box">
                                <div class="dec" onclick="sortTableByAlphabet(this)"></div>
                                <div class="inc" onclick="sortTableByAlphabet(this)" ></div>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="justify">کد نظام پزشکی
                            <div class="box">
                                <div class="dec" onclick="sortTableBynumber(this)"></div>
                                <div class="inc" onclick="sortTableBynumber(this)" ></div>
                            </div>
                        </div>
                    </th>

                    <th>
                        وضعیت
                    </th>
                    <th>
                        <div class="justify">ساخت
                            <div class="box">
                                <div class="dec" onclick="sortTableByDate(this)"></div>
                                <div class="inc" onclick="sortTableByDate(this)" ></div>
                            </div>
                        </div>
                    </th>

                    <th>
                        <div class="justify">تغییر
                            <div class="box">
                                <div class="dec" onclick="sortTableByDate(this)"></div>
                                <div class="inc" onclick="sortTableByDate(this)" ></div>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="justify">
                            <div class="box">

                            </div>
                        </div>
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($cases as $case)
                    <tr>
                        <td></td>
                        <td>{{$case['title']}}</td>

                        <td>{{$case['patient_name']}}</td>
                        @foreach($organs as $organ)
                            @if($organ['id']==$case['organs_id'])
                                <td>{{$organ['name']}}</td>
                            @endif
                        @endforeach
                        <td>{{$case['doctor_name']}}</td>
                        <td>{{$case['medical_code']}}</td>
                        @if($case['state']=='not approved')
                            <td>تایید نشده</td>
                        @endif
                        @if($case['state']=='approved')
                            <td>تایید شده</td>
                        @endif
                        @if($case['state']=='ra_draft')
                            <td>پیشفرض</td>
                        @endif
                        <td>{{$case['created_at']}}</td>
                        <td>{{$case['updated_at']}}</td>
                        <td> <a href="http://127.0.0.1:8000/user/radiologist/viewcase/{{$case['id']}}"> نمایش</a></td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>


</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="/js/dashboard.js"></script>
<script>
    var alphabets = ["ا", "ب", "پ", "ت", "ث", "ج", "چ", "ح", "خ", "د", "ذ", "ر", "ز", "ژ", "س", "ش", "ص", "ض", "ط", "ظ", "ع", "غ", "ف", "ق",
        "ک", "گ", "ل", "م", "ن", "و", "ه", "ی"];

    var confirmed=false;
    var not_confirmed=false;
    var status1=""
    var organ=""
    var searchValue=""
    var draft=false

    var table,rows,i;
    table=document.getElementById("myTable");
    rows=table.rows;
    for(i=1;i<rows.length;i++){
        rows[i].getElementsByTagName("TD")[0].innerHTML=i;
    }


    function sortTableByAlphabet(e) {
        var parent= e.parentElement.parentElement.parentElement;
        var grandparent=parent.parentElement
        var tdNumber=Array.from(grandparent.children).indexOf(parent)

        var type=e.className

        var switching, i, x, y, shouldSwitch;

        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;

            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;

                x = rows[i].getElementsByTagName("TD")[tdNumber].innerHTML.charAt(0);
                x=alphabets.indexOf(x);
                y = rows[i + 1].getElementsByTagName("TD")[tdNumber].innerHTML.charAt(0);
                y=alphabets.indexOf(y);

                if(type=="inc"){
                    if (x > y) {
                        shouldSwitch = true;
                        break;
                    }
                }
                else{
                    if (x < y) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
        for(i=1;i<rows.length;i++){
            rows[i].getElementsByTagName("TD")[0].innerHTML=i;
        }
    }

    function sortTableBynumber(e) {
        var parent= e.parentElement.parentElement.parentElement;
        var grandparent=parent.parentElement
        var tdNumber=Array.from(grandparent.children).indexOf(parent)

        var type=e.className

        var switching, i, x, y, shouldSwitch;

        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;

            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;

                x = parseInt(rows[i].getElementsByTagName("TD")[tdNumber].textContent);
                y = parseInt(rows[i + 1].getElementsByTagName("TD")[tdNumber].textContent);
                if(type=="inc"){
                    if (x> y) {
                        shouldSwitch = true;
                        break;
                    }
                }
                else{
                    if (x< y) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
        for(i=1;i<rows.length;i++){
            rows[i].getElementsByTagName("TD")[0].innerHTML=i;
        }
    }

    function sortTableByDate(e) {
        var parent= e.parentElement.parentElement.parentElement;
        var grandparent=parent.parentElement
        var tdNumber=Array.from(grandparent.children).indexOf(parent)

        var type=e.className

        var switching, i, year1,month1,day1,year2,month2,day2, shouldSwitch,boxdate1
            ,boxdate2,date1,date2,time1,time2,date11,date22,
            h1,m1,s1,h2,m2,s2;

        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;

            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;

                boxdate1 = rows[i].getElementsByTagName("TD")[tdNumber].innerText;
                boxdate2 = rows[i+1].getElementsByTagName("TD")[tdNumber].innerText;

                date1=boxdate1.split(" ");
                date2=boxdate2.split(" ");

                time1=date1[1].split(":");
                time2=date2[1].split(":");

                date11=date1[0].split("-");
                date22=date2[0].split("-");

                year1=parseInt(date11[0]);
                month1=parseInt(date11[1]);
                day1=parseInt(date11[2]);

                year2=parseInt(date22[0]);
                month2=parseInt(date22[1]);
                day2=parseInt(date22[2]);

                h1=parseInt(time1[0]);
                m1=parseInt(time1[1]);
                s1=parseInt(time1[2]);

                h2=parseInt(time2[0]);
                m2=parseInt(time2[1]);
                s2=parseInt(time2[2]);


                if(type=="inc"){
                    if ((year1> year2) || (year1==year2 && month1>month2)||(year1==year2 && month1==month2 && day1>day2)
                        || (year1==year2 && month1==month2 && day1==day2 && h1>h2)
                        || (year1==year2 && month1==month2 && day1==day2 && h1==h2 && m1>m2)
                        || (year1==year2 && month1==month2 && day1==day2 && h1==h2 && m1==m2 && s1>s2) ) {
                        shouldSwitch = true;
                        break;
                    }
                }
                else{
                    if ((year1< year2) || (year1==year2 && month1<month2)||(year1==year2 && month1==month2 && day1<day2)
                        || (year1==year2 && month1==month2 && day1==day2 && h1<h2)
                        || (year1==year2 && month1==month2 && day1==day2 && h1==h2 && m1<m2)
                        || (year1==year2 && month1==month2 && day1==day2 && h1==h2 && m1==m2 && s1<s2)) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
        for(i=1;i<rows.length;i++){
            rows[i].getElementsByTagName("TD")[0].innerHTML=i;
        }
    }

    $(document).ready(function(){
        $('.CasesTableSearch input').on("keyup" , function(){
            searchValue = $(this).val();
            $("#myTable tbody tr").filter(function() {
                $(this).toggle($(this).text().indexOf(searchValue) > -1 && $(this).text().indexOf(status1) > -1 && $(this).text().indexOf(organ) > -1 )
            });

        })

        $('.filter .menu').on("click",function(){
            var submenu=$(this).parent().find('.submenu');
            submenu.toggle(300);
            $('.filter .menu a svg:nth-child(2)').toggle();
            $('.filter .menu a svg:nth-child(3)').toggle();
        })

        $('.filter .menu .submenu li').on("click",function(){
            $('.filter .menu a span').html($(this).text())

            $('.filter .menu').find('.submenu').children('li').css({
                "color":"black",
                "background-color":"transparent"
            })

            $(this).css({
                "background-color": "#EAF6F5",
                "color": "#009688"
            })

            organ=$('.filter .menu a span').html()
            if(organ=="انتخاب ارگان بدن"){
                organ=""
            }
            $("#myTable tbody tr").filter(function() {
                $(this).toggle($(this).text().indexOf(organ) > -1 && $(this).text().indexOf(searchValue) > -1 && $(this).text().indexOf(status1) > -1 )
            });
        })

        $('.filter .confirmed').on("click",function(){
            confirmed=!confirmed;
            if(confirmed){
                status1="تایید شده";
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(organ) > -1 && $(this).text().indexOf(searchValue) > -1 && $(this).text().indexOf(status1) > -1 )
                });

                $(this).css({"color":"#4DA3FF"})
                $('.filter .not-confirmed , .filter .draft').css({"pointer-events": "none" ,"color":"#e6e5e5"});
            }

            else{
                status1=""
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(organ) > -1  && $(this).text().indexOf(searchValue) > -1 && $(this).text().indexOf(status1) > -1 )
                });

                $(this).css({"color":"#707070"})
                $('.filter .not-confirmed , .filter .draft').css({"pointer-events": "all" ,"color":"#707070"});
            }
        })

        $('.filter .not-confirmed').on("click",function(){
            not_confirmed=!not_confirmed;
            if(not_confirmed){
                status1="تایید نشده"
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(organ) > -1  && $(this).text().indexOf(searchValue) > -1 && $(this).text().indexOf(status1) > -1 )
                });

                $(this).css({"color":"#4DA3FF"})
                $('.filter .confirmed , .filter .draft').css({"pointer-events": "none" ,"color":"#e6e5e5"});
            }

            else{
                status1=""
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(organ) > -1  && $(this).text().indexOf(searchValue) > -1 && $(this).text().indexOf(status1) > -1 )
                });

                $(this).css({"color":"#707070"})
                $('.filter .confirmed , .filter .draft').css({"pointer-events": "all" ,"color":"#707070"});
            }
        })

        $('.filter .draft').on("click",function(){
            draft=!draft;
            if(draft){
                status1="پیشفرض";
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(organ) > -1  && $(this).text().indexOf(searchValue) > -1 && $(this).text().indexOf(status1) > -1 )
                });

                $(this).css({"color":"#4DA3FF"})
                $('.filter .not-confirmed , .filter .confirmed').css({"pointer-events": "none" ,"color":"#e6e5e5"});
            }

            else{
                status1=""
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().indexOf(organ) > -1  && $(this).text().indexOf(searchValue) > -1 && $(this).text().indexOf(status1) > -1 )
                });

                $(this).css({"color":"#707070"})
                $('.filter .not-confirmed ,.filter .confirmed').css({"pointer-events": "all" ,"color":"#707070"});
            }
        })
    })


</script>
</body>
</html>
