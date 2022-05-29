<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\RoadmapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//register
Route::get('/signup', [RegisterController::class, "signup"]);
Route::get('/signup/student', [RegisterController::class, "signupStudent"]);
Route::get('/signup/student-zelfstandige', [RegisterController::class, "signupZelfstandige"]);

Route::get('/login', [LoginController::class, "login"])->name('login');
Route::get('/logout', [LoginController::class, "logout"]);
Route::post('user/login', [LoginController::class, "handleLogin"]);

Route::post('/user/addStudent', [RegisterController::class, "addStudentQR"]);

Route::post('/user/addZelfstandige', [RegisterController::class, "addZelfstandige"]);

Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete-registration');




//achter security
Route::group(['middleware' => ['auth']], function() {

    Route::get('/', function(){
        return redirect('/dashboard');
    });

    //routes van het dashboard
    Route::get('/dashboard', [LoginController::class, "homepage"]);

    //routes van de roadmap
    Route::get('/roadmap', [RoadmapController::class, "roadmap"]);
    Route::post('/check/stage1', [RoadmapController::class, "checkStage1"]);
    Route::post('/check/stage2', [RoadmapController::class, "checkStage2"]);
    Route::post('/check/stage3', [RoadmapController::class, "checkStage3"]);
    Route::post('/check/iban', [RoadmapController::class, "checkIban"]);
    Route::post('/check/link', [RoadmapController::class, "checkLink"]);
    Route::post('/check/input', [RoadmapController::class, "checkInput"]);
    

    //routes van de community
    Route::get('/community', [CommunityController::class, "community"]);
    Route::get('/community/{id}', [CommunityController::class, "communityDetail"]);
    Route::get('/community/{id}', [CommunityController::class, "communityEdit"]);

    //routes van de chat
    Route::get('/chat', [ChatController::class, "chat"]);

    //routes vab de contacten
    Route::get('/contacten', [ContactController::class, "contacten"]);
    Route::get('/contacten/{id}', [ContactController::class, "contactenDetail"]);

    //routes van de instellingen
    Route::get('/instellingen', [SettingsController::class, "settings"]);

    //routes van het profiel
    Route::get('/profiel', [ProfileController::class, "profile"]);
    Route::get('/profiel/edit', [ProfileController::class, "editProfile"]);
    

});
