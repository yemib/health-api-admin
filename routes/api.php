<?php

use App\Http\Controllers\Api\ApiController;
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

Route::middleware(['cors'])->group(function () {

Route::get('blogs/{pages?}', [ApiController::class  ,  'blog']);
Route::get('blog/{id}', [ApiController::class  ,  'singleblogid']);
Route::get('blogslug/{slug}', [ApiController::class  ,  'singleblog']);
Route::get('testimonies/{pages?}', [ApiController::class  ,  'testimonies']);
Route::get('allpages/{pages?}', [ApiController::class  ,  'allpages']);
Route::get('page/{id}', [ApiController::class  ,  'page']);
Route::get('managements/{pages?}', [ApiController::class  ,  'managements']);
Route::get('gallery/{pages?}', [ApiController::class  ,  'gallery']);

Route::get('slides/{pages?}', [ApiController::class  ,  'slides']);
Route::get('logo', [ApiController::class  ,  'logo']);
Route::get('contact', [ApiController::class  ,  'contact']);
Route::any('send_mail'   , [ApiController::class  ,  'sendmail'] );

Route::any('general_mail'   , [ApiController::class  ,  'generalmail'] );

});