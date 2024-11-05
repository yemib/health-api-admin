<?php

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

use Illuminate\Http\Request;
use App\admins;
use Illuminate\Support\Facades\Route;



Route::get('/',  function () {
	return   redirect('admins');     /*  view('home2') */;
});


Route::post('/logins',  function (Request $request) {

	$checking = 	admins::where('username', $request->username)->where('password',   $request->password)->first();

	if (isset($checking->id)) {

		//set the session  ok		
		$request->session()->put('admin',  $request->username);

		return redirect('/admins');
	} else {

		$error = 'wrong password or email address';
		return redirect('/admin_signin')->with('error', $error);
	}
});



Route::get('page/{id}/{name}',  function ($id, $name) {
	$all = array('id' => $id, 'name' => $name);
	return  view('about')->with($all);
});


Route::get('newsletter/{id}/{name}',  function ($id, $name) {
	$all = array('id' => $id, 'name' => $name);
	return  view('services')->with($all);
});




Route::get('/admins',  function () {

	return  view('admin_folder/home');
})->name('dashboard')->middleware('article');



Route::resources([
	'testimony' => 'testimony',
	'newsletters' => 'service',
	'post' => 'post',
	'pages' => 'pages',
	'slidder' => 'slidder',
	'users' => 'users',
	'contact' => 'contact',
	'logo' => 'logo',
	'menu' => 'menu',
	'managements' => 'managements',
	'gallery' => 'galleries',
	'board' => 'boards',


]);




Route::get('/admin_signin', function () {

	return view('admin_folder/login');
});


Route::get('/logout', function (Request $request) {

	// logout
	$request->session()->forget('admin');


	return view('admin_folder/login');
});


Route::get('/admins',  function () {

	return  view('admin_folder/home');
})->middleware('article');



Route::post('/large_file',  function (Request $request) {
	//upload the file here period okay  


	$image = $request->file('others');
	$getsize =  $image->getSize();
	$original_name = $image->getClientOriginalName();
	$new_name = rand() . '.' . $image->getClientOriginalExtension();
	$real_path  =   $image->getRealPath();
	$image->move(public_path('uploads'), $new_name);




	if ($image->getClientOriginalExtension() ==  'mp4'  or $image->getClientOriginalExtension() ==  'mp3') {


		return response()->json([
			'message'   =>    '<video  src="/uploads/' . $new_name . '"   style="width: 100%"    controls   />',
			'file_name'   => $original_name

		]);
	} else {

		return response()->json([
			'message'   => '<a  class="btn btn-primary"    href="/uploads/' . $new_name . '"  target="_top"   > ' . $original_name . ' </a>',

			'file_name'   => $original_name

		]);
	}
})->middleware('article');
