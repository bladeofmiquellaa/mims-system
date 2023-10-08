@extends('user.dr.dashboard.layouts.master')
@section('content')
    <title>داشبورد</title>
    <div class="Dashboard-badges">
        <div class="Dashboard-badges-div">
            <div>
                <span>کل کیس ها</span>
                <h1>{{$all}}</h1>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
        </div>
        <div class="Dashboard-badges-div">
            <div>
                <span>کیس های تایید شده</span>
                <h1>{{$approved}}</h1>
            </div>
            <svg  xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M2 5.75A.75.75 0 0 1 2.75 5h18a.75.75 0 0 1 0 1.5h-18A.75.75 0 0 1 2 5.75Zm0 4A.75.75 0 0 1 2.75 9h18a.75.75 0 0 1 0 1.5h-18A.75.75 0 0 1 2 9.75Zm18.211 2.909a.75.75 0 0 1 .13 1.052l-3.9 5a.75.75 0 0 1-1.165.021l-2.1-2.5a.75.75 0 1 1 1.148-.964l1.504 1.79l3.33-4.27a.75.75 0 0 1 1.053-.13ZM2 13.75a.75.75 0 0 1 .75-.75h7a.75.75 0 0 1 0 1.5h-7a.75.75 0 0 1-.75-.75Zm0 4a.75.75 0 0 1 .75-.75h7a.75.75 0 0 1 0 1.5h-7a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/></svg>
        </div>
        <div class="Dashboard-badges-div">
            <div>
                <span>کیس های تایید نشده</span>
                <h1>{{$not_approved}}</h1>
            </div>
            <svg  xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 20 20"><path fill="currentColor" d="M17.5 5a.5.5 0 0 1 0 1h-15a.5.5 0 0 1 0-1h15Zm0 3a.5.5 0 0 1 0 1h-15a.5.5 0 0 1 0-1h15Zm-7.243 3a5.503 5.503 0 0 0-.657 1H2.5a.5.5 0 0 1 0-1h7.757ZM9 14.5c0 .168.008.335.022.5H2.5a.5.5 0 0 1 0-1h6.522a5.571 5.571 0 0 0-.022.5Zm5.5 4.5a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9Zm1.146-2.646L14.5 15.207l-1.146 1.147a.5.5 0 0 1-.708-.708l1.147-1.146l-1.147-1.146a.5.5 0 0 1 .708-.708l1.146 1.147l1.146-1.147a.5.5 0 0 1 .708.708L15.207 14.5l1.147 1.146a.5.5 0 0 1-.708.708Z"/></svg>
        </div>
        <div class="Dashboard-badges-div">
            <div>
                <span>کیس های پیش فرض ذخیره شده</span>
                <h1>{{$draft}}</h1>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
        </div>
    </div>
@stop
