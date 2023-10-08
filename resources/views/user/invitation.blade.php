<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>دعوت نامه ثبت نام</title>
    <link rel="website icon" type="png" href="https://img.icons8.com/ios/50/invite.png">
    <style>
        @font-face {
            font-family: vazir;
            src: url('https://v1.fontapi.ir/css/Vazir')
        }
        body{
            min-width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            font-family: vazir;
            background: linear-gradient(-43deg, #c1c9c1 0%,#ffffff 100%);
        }
        .main{
            width: 412px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
            text-align: center;
            background-color: white;
            padding: 0 20px;
            height: 100vh;
        }
        .main h4{
            margin-bottom: 20px;
        }

        .main svg{
            margin-bottom: 10px;
        }

        .main p{
            color: #707070;
        }

        .main a{
            width: 100%;
            padding:0.375rem 0.90rem;
            border-radius: 6px;
            border: none;
            transition: transform .2s;
            background-color: #009688;
            color: white;
            margin-top: 5px;
            text-decoration: none;
        }

        .main button:hover{
            transform: scale(1.1);
        }
    </style>
</head>

<body>
<div class="main">
    <img src="https://api.elasticemail.com/userfile/a18de9fc-4724-42f2-b203-4992ceddc1de/violetinvitation_top.jpg" width="412">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 64 64"><path fill="#009688" d="M31.624 17.396a8.568 8.568 0 1 0 0-17.134c-4.732 0-8.57 3.836-8.57 8.566a8.57 8.57 0 0 0 8.57 8.568zm11.305 2.607H32.842v8l1.855.454v-1.855c0-1.205 1.098-2.299 3.102-.952c2.823 1.903 5.862 12.712 2.566 12.286c-1.591-.203-2.49-.975-4.242-1.073c-1.423-.073-1.423-.685-1.425-1.49c-.002-.805 0-3.389 0-3.389v-1.44a277.9 277.9 0 0 1-1.855-.453v9.893s2.781-1.891 4.77-.35c1.254.975 2.039 3.781-1.84 6.068c-.895.545-5.768 1.834-7.297-1.036h-1.725a1.412 1.412 0 0 0 0 2.824h10.215a2.932 2.932 0 0 1 2.928 2.93a2.93 2.93 0 0 1-2.928 2.928h-10.57a.66.66 0 0 0 0 1.316h10.57c1.614 0 2.928 1.314 2.928 2.93s-1.314 2.928-2.928 2.928H24.604a1.135 1.135 0 1 1 0-2.272h12.362a.658.658 0 0 0 0-1.315h-10.57a2.933 2.933 0 0 1-2.928-2.928a2.934 2.934 0 0 1 2.928-2.932h10.57a.658.658 0 0 0 0-1.314H26.751a3.686 3.686 0 0 1-3.68-3.683a3.687 3.687 0 0 1 3.68-3.684h2.28c.015 0 .027.008.042.008h.776c.754 0 .725-.798.723-.798V30.21l-1.853.514v1.259s.002 2.584 0 3.389c0 .805-.006 1.417-1.425 1.491c-1.75.098-2.649.87-4.244 1.073c-3.295.425-.254-10.383 2.563-12.287c2.003-1.348 3.106-.254 3.106.952v2.016l1.853-.512V20h-9.643c-6.063 0-11.471 4.913-11.471 10.975v26.567c0 2.073 1.631 3.754 3.699 3.754a3.75 3.75 0 0 0 3.75-3.754V33.588h3.106v29.001h23.354V33.588h3.139v23.954c0 2.073 1.679 3.754 3.751 3.754s3.702-1.681 3.702-3.754V30.975c-.001-6.059-4.968-10.972-11.029-10.972z"/></svg>
        <h4>دعوت نامه</h4>
        <p>از شما دوست گرامی توسط <span>{{$details['name']}}</span> دعوت می شود تا از خدمات
            سایت مدیریت تصاویر پزشکی بهره مند شوید
        </p>
        @if(isset($details['description']))
            <p> توضیحات: {{$details['description']}}</p>
        @endif
        <a style="color:white;" href="{{$details['link']}}">ثبت نام</a>



    </div>
    <img src="https://api.elasticemail.com/userfile/a18de9fc-4724-42f2-b203-4992ceddc1de/violetinvitation_bottom.jpg" width="412">
</div>
</body>
</html>
