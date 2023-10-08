<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <title>ویرایش پروفایل</title>
    <link rel="website icon" type="png" href="https://img.icons8.com/windows/32/writer-male.png">
    <style>
        .dashboard{
            display: flex;
            align-items: center;
            justify-content: center;

            width: 100%;
            height: 100vh;
        }
        .Edit-Profile-header , .case-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }
        .Edit-Profile-header a, .case-header a {
            color: #707070;

        }

    </style>
</head>
<body>


<section class="dashboard">

    <form action="/user/student/changingpassword" method="post" enctype="multipart/form-data">
        <div class="case container">
            <div class="case-header">
                <div>
                    <svg style="margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M12.63 2c5.53 0 10.01 4.5 10.01 10s-4.48 10-10.01 10c-3.51 0-6.58-1.82-8.37-4.57l1.58-1.25C7.25 18.47 9.76 20 12.64 20a8 8 0 0 0 8-8a8 8 0 0 0-8-8C8.56 4 5.2 7.06 4.71 11h2.76l-3.74 3.73L0 11h2.69c.5-5.05 4.76-9 9.94-9m2.96 8.24c.5.01.91.41.91.92v4.61c0 .5-.41.92-.92.92h-5.53c-.51 0-.92-.42-.92-.92v-4.61c0-.51.41-.91.91-.92V9.23c0-1.53 1.25-2.77 2.77-2.77c1.53 0 2.78 1.24 2.78 2.77v1.01m-2.78-2.38c-.75 0-1.37.61-1.37 1.37v1.01h2.75V9.23c0-.76-.62-1.37-1.38-1.37Z"/></svg>
                    تغییر رمز عبور
                </div>
                <a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24"><path fill="currentColor" d="m6.8 13l2.9 2.9q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275l-4.6-4.6q-.15-.15-.213-.325T3.426 12q0-.2.063-.375T3.7 11.3l4.6-4.6q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7L6.8 11H20q.425 0 .713.288T21 12q0 .425-.288.713T20 13H6.8Z"/></svg></a>

            </div>
            <form>
                <div class="case-main">
                    <div class="case-input">

                        <div>
                            <label >رمز عبور جدید</label>
                            <input type="password"  name="password" autocomplete="off">
                        </div>
                        <div>
                            <label>تکرار رمز عبور جدید</label>
                            <input type="password"  name="password_confirmation" autocomplete="off">
                        </div>

                    </div>

                    <div class="buttons">
                        <button style="margin-left: 10px;">تغییر</button>
                        <a href='javascript:history.back()'>لغو</a>
                    </div>
                    <div class="show-errors">
                        @if ($errors->any())
                            <div class="alert alert-danger">

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
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="/js/dashboard.js"></script>
</body>
</html>
