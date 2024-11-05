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

Route::get('blogs/{pages?}', [ApiController::class  ,  'blog']);
Route::get('testimonies/{pages?}', [ApiController::class  ,  'testimonies']);
Route::get('allpages/{pages?}', [ApiController::class  ,  'allpages']);
Route::get('page/{id}', [ApiController::class  ,  'page']);
Route::get('managements/{pages?}', [ApiController::class  ,  'managements']);
Route::get('gallery/{pages?}', [ApiController::class  ,  'gallery']);

Route::get('slides/{pages?}', [ApiController::class  ,  'slides']);
Route::get('logo', [ApiController::class  ,  'logo']);
Route::get('contact', [ApiController::class  ,  'contact']);