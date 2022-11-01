<?php

use App\Http\Controllers\AddstudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ControlmarkController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\GradingController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SavecodeController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\RelatedPostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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
Route::post('/marks/storeImage', [ControlmarkController::class, 'storeImage']);

// uploadimg ControlmarkController
Route::post('/upload', [ControlmarkController::class, 'store'])->name('upload');
Route::get('/media/{post}', [ControlmarkController::class, 'getImages'])->name('post.images');
// Route::get('/media/{post}', [ControlmarkController::class, 'getImages'])->name('post.images');


Route::post('/uploadimg', [ControlmarkController::class, 'uploadimg'])->name('uploadimg');

Route::post('/savecode', [SavecodeController::class, 'savecode']);
Route::post('/contest'         , [UserController::class, 'contest'   ]);
Route::post('/help'         , [HelpController::class, 'help'   ]);
Route::post('/help/showcols'         , [HelpController::class, 'showcols'   ]);
// help/showcols
//////////////////////////////////////////////// PRIVATE ROUTES //////////////////////////////////////////////// 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('logout', [AuthenticatedSessionController::class, 'destroy']);
// categories
Route::middleware('auth:sanctum')->post('categories/create', [CategoryController::class, 'store']);
Route::middleware('auth:sanctum')->get('categories/{category}', [CategoryController::class, 'show']);
Route::middleware('auth:sanctum')->put('categories/{category}', [CategoryController::class, 'update']);
Route::middleware('auth:sanctum')->delete('categories/{category}', [CategoryController::class, 'destroy']);

// posts
Route::middleware('auth:sanctum')->post('posts', [PostController::class, 'store']);
Route::middleware('auth:sanctum')->put('posts/{post:slug}', [PostController::class, 'update']);
Route::middleware('auth:sanctum')->delete('posts/{post:slug}', [PostController::class, 'destroy']);


//////////////////////////////////////////////// PUBLIC ROUTES //////////////////////////////////////////////// 
Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);


// categories
Route::get('categories', [CategoryController::class, 'index']);

// posts
Route::get('home-posts', [HomeController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('posts', [PostController::class, 'index']);
Route::get('related-posts/{post:slug}', [RelatedPostController::class, 'index']);
Route::get('dashboard-posts', [DashboardPostController::class, 'index']);






Route::post('userdata', [HomeController::class, 'userdata']);

Route::middleware('auth:sanctum')->prefix('forqan/admin')->group(function () {

    Route::post('showmarks', [ControlmarkController::class, 'showmarks']);
    Route::post('teacher_sub_class', [ControlmarkController::class, 'teacher_sub_class']);
    Route::post('allclasses', [ControlmarkController::class, 'allclasses']);
    Route::post('allsub', [ControlmarkController::class, 'allsub']);
    Route::post('update_class_sub_all', [ControlmarkController::class, 'update_class_sub_all']);
    Route::post('marks/getmarks', [ControlmarkController::class, 'getmarks']);
    // class/getstudents


});

// -------forqan/admin--------------------------------





Route::middleware('auth:sanctum')->prefix('forqan/teacher')->group(function () {
    Route::post('savemarks', [ControlmarkController::class, 'savemarks']);
    Route::post('resetmarks', [ControlmarkController::class, 'resetmarks']);
    // "/api/forqan/teacher/class/getstudents"
    Route::post('class/getstudents', [ControlmarkController::class, 'getstudents']);
    // admin/allclasses
   // /class/getstudents
//    saveallmarks
Route::post('saveallmarks', [ControlmarkController::class, 'saveallmarks']);

});
// -------forqan/teacher--------------------------------


Route::middleware('auth:sanctum')->prefix('forqan/student')->group(function () {

Route::post('marks/getmarks', [ControlmarkController::class, 'getmarks_student']);

    // forqan/student/marks/getmarks



});
// -------forqan/student--------------------------------

Route::middleware('auth:sanctum')->prefix('grading')->group(function () {
//  -> api/grading/insertone
//  api/grading/insertmulti
//  api/grading/updateone
//  api/grading/updateall
//  api/grading/deleteone
//  api/grading/deletemulti
//  api/grading/getone
//  api/grading/getmulti
//   -> api/grading/getall ->
//  data
    Route::post('xls_to_db'  , [GradingController::class, 'xls_to_db'  ]);
    Route::post('insertone'  , [GradingController::class, 'insertone'  ]);
    Route::post('insertmulti', [GradingController::class, 'insertmulti']);
    Route::post('updateone'  , [GradingController::class, 'updateone'  ]);
    Route::post('updateall', [GradingController::class, 'updateall']);
    Route::post('deleteone'  , [GradingController::class, 'deleteone'  ]);
    Route::post('deletemulti', [GradingController::class, 'deletemulti']);
    Route::post('getone'     , [GradingController::class, 'getone'     ]);
    Route::post('getmulti'   , [GradingController::class, 'getmulti'   ]);
    Route::post('getall'     , [GradingController::class, 'getall'     ]);

});

Route::middleware('auth:sanctum')->prefix('forqan/admin/student/add')->group(function () {
    //  -> api/grading/insertone
    //  api/grading/insertmulti
    //  api/grading/updateone
    //  api/grading/updateall
    //  api/grading/deleteone
    //  api/grading/deletemulti
    //  api/grading/getone
    //  api/grading/getmulti
    //   -> api/grading/getall 
    
    // forqan/admin/student/add/getall
    
    // ->
    //  data
        Route::post('xls_to_db'  , [AddstudentController::class, 'xls_to_db'  ]);
        Route::post('insertone'  , [AddstudentController::class, 'insertone'  ]);
        Route::post('insertmulti', [AddstudentController::class, 'insertmulti']);
        Route::post('updateone'  , [AddstudentController::class, 'updateone'  ]);
        Route::post('updateall'  , [AddstudentController::class, 'updateall'  ]);
        Route::post('deleteone'  , [AddstudentController::class, 'deleteone'  ]);
        Route::post('deletemulti', [AddstudentController::class, 'deletemulti']);
        Route::post('getone'     , [AddstudentController::class, 'getone'     ]);
        Route::post('getmulti'   , [AddstudentController::class, 'getmulti'   ]);
        Route::post('getall'     , [AddstudentController::class, 'getall'     ]);
    
    });



