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


Route::get('/admin/logout', function () {

	Auth::logout();

});




Route::get('/', 'testController@test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/useranswers/{id}', 'testController@useranswers');

Route::get('/questions', 'testController@questions');

/*
Route::get('/test', function () {

	dump(Auth::guard('admin')->user()->name);
})->middleware('auth:admin'); */


Route::get('/admin/test', 'AdminController@test');

Route::get('/admin/login', '\App\Http\Controllers\Auth\LoginController@getAdminLogin')->name('admin.login');
Route::post('/admin/login', '\App\Http\Controllers\Auth\LoginController@login');


/**============================================**
 *												*
 * 				Admin routes					*
 *												*
 **============================================**/

//users routes
Route::get('/admin/users', 'AdminController@index' );
Route::get('/admin/users/add', 'AdminController@adduserform' );
Route::post('/admin/users/add', 'AdminController@adduser' )->name('add.user');
Route::get('/admin/users/{name}', 'AdminController@userprofile');
Route::get('/admin/users/{name}/edit', 'AdminController@edituser');
Route::post('/admin/users/{name}', 'AdminController@updateuser')->name('edit.user');
Route::get('/admin/users/{name}/uquestions', 'AdminController@uquestions');
Route::get('/admin/users/{name}/delete', 'AdminController@deleteuser');
//questions routes
Route::get('/admin/questions', 'AdminController@questions' );
Route::get('/admin/questions/add', 'AdminController@addquestionform' );
Route::post('/admin/questions/add', 'AdminController@addquestion' )->name('add.question');
Route::get('/admin/questions/{name}', 'AdminController@question');
Route::get('/admin/questions/{name}/edit', 'AdminController@editquestion');
Route::post('/admin/questions/{name}', 'AdminController@updatequestion')->name('edit.question');
Route::get('/admin/questions/{name}/delete', 'AdminController@deletequestion');
Route::post('/admin/rest', 'AdminController@rest_points')->name('rpoints');


/**============================================**
 *												*
 * 				web routes						*
 *												*
 **============================================**/




Route::get('/', 'SiteController@index');
Route::get('/questions', 'SiteController@questions');
Route::get('/me/answers', 'SiteController@meanswers');
Route::get('/{question}/answer', 'SiteController@answerform');
Route::post('/{question}/answer', 'SiteController@answer')->name('useranswer');


