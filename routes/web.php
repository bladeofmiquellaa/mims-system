<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CcaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Auth;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login',function (){
   return view('user.login') ;
});
Route::get('signup',function (){
    return view('user.signup') ;
});
Route::post('/user/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/user/login', [UserController::class, 'login'])->name('login');

Route::get('user/logout',[UserController::class, 'logout']);
Route::post('sendforgetpassword', [UserController::class, 'send_fpasslink']);

Route::get('/student/register/{token_body}',[UserController::class, 'st_signup'])->name('studentsignup');

Route::get('/', function () {
    return view('home.home');
});

Route::get('/cases', function () {
    return view('home.cases');
});


Route::get('/forgetpassword', function () {
    return view('user.forgetpassword');
});

Route::get('/forgetpassword/{token_body}',[UserController::class, 'change_fpassword']);
Route::post('/user/changingpassword',[UserController::class, 'changing_fpass']);


Route::middleware([\App\Http\Middleware\IsRadiologist::class])->group(function () {
    Route::get('/user/radiologist/dashboard',[CcaseController::class, 'ra_main']);

    Route::get('/user/radiologist/addcase',[CcaseController::class, 'ra_show_createcase']);
    Route::post('user/radiologist/creatingcase',[CcaseController::class, 'ra_create']);

    Route::get('/user/radiologist/editprofile',[UserController::class, 'view_editprofile']);
    Route::post('/user/radiologist/editingprofile',[UserController::class, 'editprofile']);
    Route::get('user/radiologist/caselist',[CcaseController::class, 'ra_show_caselist']);

    Route::get('user/radiologist/changepassword',function (){
        return view('user.ra.dashboard.changepassword');
    });
    Route::post('/user/radiologist/changingpassword',[UserController::class, 'changepassword']);

    Route::get('user/radiologist/viewcase/{case_id}',[CcaseController::class, 'ra_viewcase']);
    Route::post('user/radiologist/updatingcase/{case_id}',[CcaseController::class, 'ra_updatecase']);


});


Route::middleware([\App\Http\Middleware\IsDoctor::class])->group(function () {
    Route::get('/user/doctor/dashboard',[CcaseController::class, 'dr_main']);

    Route::post('/user/doctor/editingprofile',[UserController::class, 'editprofile']);

    Route::get('/user/doctor/editprofile',[UserController::class, 'view_editprofile']);
    Route::post('/user/doctor/addingcase',[CcaseController::class, 'dr_create']);
    Route::get('/user/doctor/addcase',[CcaseController::class, 'dr_show_createcase']);

    Route::get('/user/doctor/caselist',[CcaseController::class, 'dr_show_caselist']);

    Route::get('/user/doctor/viewcase/{case_id}',[CcaseController::class, 'dr_viewcase']);
    Route::post('/user/doctor/updatingcase/{case_id}',[CcaseController::class, 'dr_updatecase']);
    Route::get(' /user/doctor/sendinvitation',function (){
        return view('user.dr.dashboard.sendinvite') ;
    });
    Route::post('/user/doctor/sendinginvitation',[UserController::class, 'sendinvitation']);

    Route::post('/user/doctor/changingpassword',[UserController::class, 'changepassword']);


    Route::get('user/doctor/changepassword',function (){
        return view('user.dr.dashboard.changepassword');
    });
    Route::get('/user/doctor/comments',[CcaseController::class, 'comment_list']);



    Route::get('/delete_comment/{comment_id}',[CcaseController::class, 'delete_comment']);
    Route::get('/confirm_comment/{comment_id}',[CcaseController::class, 'confirm_comment']);
});

Route::get('/viewcase/{case_id}',[CcaseController::class, 'view_case']);
Route::post('/store_comment/{case_id}',[CcaseController::class, 'store_comment']);

Route::middleware([\App\Http\Middleware\IsStudent::class])->group(function () {
    Route::get('/user/student/editprofile',[UserController::class, 'view_editprofile']);
    Route::get('user/student/changepassword',function (){
        return view('user.st.dashboard.changepassword');
    });
    Route::post('/user/student/editingprofile',[UserController::class, 'editprofile']);
    Route::post('/user/student/changingpassword',[UserController::class, 'changepassword']);


});

Route::get('/advsearch',[CcaseController::class, 'adv_search']);
