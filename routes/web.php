<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\VerificationController;
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

Route::post('/user/addZelfstandige', [RegisterController::class, "addZelfstandigeQR"]);



Route::get('/login', [LoginController::class, "login"])->name('login');
Route::get('/logout', [LoginController::class, "logout"]);
Route::post('user/login', [LoginController::class, "handleLogin"]);

Route::post('/user/addStudent', [RegisterController::class, "addStudentQR"]);

Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete-registration');
Route::get('/complete-registrationZelf', [RegisterController::class, 'completeRegistrationZelf'])->name('complete-registrationZelf');



route::get('/', function(){
    return redirect(route('login'));
});




//achter security
Route::group(['middleware' => ['auth']], function() {
    
    /**
    * Verification Routes
    */
    Route::get('/email/verify', [VerificationController::class, "show"])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, "verify"])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class, "resend"])->name('verification.resend');

    Route::group(['middleware' => ['2fa']], function() {
    // Route::group(['middleware' => ['verified']], function() {

    //routes van het dashboard
    Route::get('/dashboard', [LoginController::class, "homepage"])->name('dashboard');

    //routes van de roadmap
    Route::get('/roadmap', [RoadmapController::class, "roadmap"]);
    Route::post('/add/company', [RoadmapController::class, "addCompany"]);
    Route::post('/check/stage', [RoadmapController::class, "checkStage"]);
    Route::post('/check/iban', [RoadmapController::class, "checkIban"]);
    Route::post('/check/link', [RoadmapController::class, "checkLink"]);
    Route::post('/check/inputStage4', [RoadmapController::class, "checkInputStage4"]);
    Route::post('/check/inputStage5', [RoadmapController::class, "checkInputStage5"]);
    Route::post('/check/inputStage7', [RoadmapController::class, "checkInputStage7"]);
    // Route::post('/check/stage5/start', [RoadmapController::class, "checkStart"]);
    // Route::post('/check/stage5/adress', [RoadmapController::class, "checkAdress"]);
    // Route::post('/check/stage5/regime', [RoadmapController::class, "checkRegime"]);
    // Route::post('/check/stage5/rekening', [RoadmapController::class, "checkRekening"]);
    Route::post('/check/stage6/handtekening', [RoadmapController::class, "checkHandtekening"]);
    Route::post('/check/stage6/bevestig', [RoadmapController::class, "checkBevestig"]);
    Route::post('/check/number', [RoadmapController::class, "checkNumber"]);
    Route::post('/add/briefje', [RoadmapController::class, "addBriefje"]);
    Route::post('/delete/briefje', [RoadmapController::class, "deleteBriefje"]);
    
    

    //routes van de community
    Route::get('/community', [CommunityController::class, "community"]);
    Route::get('/community/edit', [CommunityController::class, "communityEdit"]);
    Route::get('/community/{name}', [CommunityController::class, "communityDetail"]);
    Route::post('/add/post', [CommunityController::class, "addPost"]);
    
    
    

    //routes van de chat
    Route::get('/chat', [ChatController::class, "chat"]);

    //routes vab de contacten
    Route::get('/contacten', [ContactController::class, "contacten"]);
    Route::get('/contacten/instantie/{id}', [ContactController::class, "instantieDetail"]);
    Route::get('/contacten/{id}', [ContactController::class, "contactenDetail"]);
    

    //routes van de instellingen
    Route::get('/instellingen', [SettingsController::class, "settings"]);
    Route::get('/instellingen-mobiel', [SettingsController::class, "settingsMobile"]);

    //routes van het profiel
    Route::get('/profiel', [ProfileController::class, "profile"]);
    Route::get('/profiel/edit', [ProfileController::class, "editProfile"]);

    Route::post('/2fa', function () {
        return redirect(route('dashboard'));
        })->name('2fa');
    

});
});
// });
