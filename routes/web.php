<?php
use Illuminate\Database\Connection;

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

Route::get('/', function () {
    return view('welcome');
});



// Route::prefix('admin')->group(function () {
// 	Route::get('/users', 'UserController@index')->name('home');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin']], function(){
	Route::get('/dashboard', function () {
	    return view('admin.dashboard');
	});

	Route::get('/service-list', 'ServiceController@index');
	Route::post('/add-service', 'ServiceController@store');
	Route::post('/add-sub-service', 'ServiceController@subSrvcStore');
	Route::get('/all-services', 'ServiceController@getServiceData');
});




