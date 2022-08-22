<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ConfigController;
use App\Http\Controllers\Api\DepartmentStructureController;
use App\Http\Controllers\Api\OptionController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\SocialLoginController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//api route category
Route::group(['prefix' => 'category'], static function () {
    Route::post('/', [CategoryController::class, 'list']);
    Route::post('create-update', [CategoryController::class, 'createOrUpdate']);
    Route::post('show', [CategoryController::class, 'show']);
});

//api route config
Route::group(['prefix' => 'config'], static function () {
    Route::post('/', [ConfigController::class, 'list']);
    Route::post('create-update', [ConfigController::class, 'createOrUpdate']);
    Route::post('show', [ConfigController::class, 'show']);
});

//api route option
Route::group(['prefix' => 'option'], static function () {
    Route::post('/', [OptionController::class, 'list']);
    Route::post('create-update', [OptionController::class, 'createOrUpdate']);
    Route::post('show', [OptionController::class, 'show']);
});

//api route option
Route::group(['prefix' => 'tag'], static function () {
    Route::post('/', [TagController::class, 'list']);
    Route::post('create-update', [TagController::class, 'createOrUpdate']);
    Route::post('show', [TagController::class, 'show']);
});

//api route option
Route::group(['prefix' => 'topic'], static function () {
    Route::post('/', [TopicController::class, 'list']);
    Route::post('create-update', [TopicController::class, 'createOrUpdate']);
    Route::post('show', [TopicController::class, 'show']);
});

//api route user
Route::group(['prefix' => 'user'], static function () {
    Route::post('/', [UserController::class, 'list']);
    Route::post('create-update', [UserController::class, 'createOrUpdate']);
    Route::post('show', [UserController::class, 'show']);
    Route::post('delete', [UserController::class, 'delete']);
});

//api auth
Route::group(['prefix' => 'auth'], static function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

//api route department structure
Route::group(['prefix' => 'department-structure'], static function () {
    Route::post('/', [DepartmentStructureController::class, 'list']);
    Route::post('create-update', [DepartmentStructureController::class, 'createOrUpdate']);
    Route::post('show', [DepartmentStructureController::class, 'show']);
});

//api route permission
Route::group(['prefix' => 'permission'], static function () {
    Route::post('/', [PermissionController::class, 'list']);
    Route::post('create-update', [PermissionController::class, 'createOrUpdate']);
    Route::post('show', [PermissionController::class, 'show']);
});

//api route social login
Route::get('/facebook-login', [SocialLoginController::class, 'loginFaceBook'])->name('facebook_login');
Route::get('/google-login', [SocialLoginController::class, 'loginGoogle'])->name('login.google');
Route::get('/instagram-login', [SocialLoginController::class, 'loginInstagram'])->name('login.insta');
Route::get('/github-login', [SocialLoginController::class, 'loginGitHub'])->name('login.github');
Route::get('/linkedin-login', [SocialLoginController::class, 'loginLinkedIn'])->name('login.linkedin');

// Api post
Route::group(['prefix' => 'posts'], static function () {
    Route::post('/', [\App\Http\Controllers\Api\PostController::class, 'list']);
    Route::post('create-update', [\App\Http\Controllers\Api\PostController::class, 'createOrUpdate']);
    Route::post('show', [\App\Http\Controllers\Api\PostController::class, 'show']);
});

// Api probe opinion
Route::group(['prefix' => 'probe-opinions'], static function () {
    Route::post('/', [\App\Http\Controllers\Api\ProbeOpinionController::class, 'list']);
    Route::post('create-update', [\App\Http\Controllers\Api\ProbeOpinionController::class, 'createOrUpdate']);
    Route::post('show', [\App\Http\Controllers\Api\ProbeOpinionController::class, 'show']);
});

// Api banner
Route::group(['prefix' => 'banners'], static function () {
    Route::post('/', [\App\Http\Controllers\Api\BannerController::class, 'list']);
    Route::post('create-update', [\App\Http\Controllers\Api\BannerController::class, 'createOrUpdate']);
    Route::post('show', [\App\Http\Controllers\Api\BannerController::class, 'show']);
});

// Api language
Route::group(['prefix' => 'languages'], static function () {
    Route::post('/', [\App\Http\Controllers\Api\LanguageController::class, 'list']);
    Route::post('create-update', [\App\Http\Controllers\Api\LanguageController::class, 'createOrUpdate']);
    Route::post('show', [\App\Http\Controllers\Api\LanguageController::class, 'show']);
});

// Api source
Route::group(['prefix' => 'sources'], static function () {
    Route::post('/', [\App\Http\Controllers\Api\SourceController::class, 'list']);
    Route::post('create-update', [\App\Http\Controllers\Api\SourceController::class, 'createOrUpdate']);
    Route::post('show', [\App\Http\Controllers\Api\SourceController::class, 'show']);
});

// Api question
Route::group(['prefix' => 'questions'], static function () {
    Route::post('/', [\App\Http\Controllers\Api\QuestionController::class, 'list']);
    Route::post('create-update', [\App\Http\Controllers\Api\QuestionController::class, 'createOrUpdate']);
    Route::post('show', [\App\Http\Controllers\Api\QuestionController::class, 'show']);
});


