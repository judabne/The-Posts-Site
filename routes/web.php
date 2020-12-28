<?php

use App\Http\Controllers\UserUpdateController;
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

//home and default routes
Route::get('/', function(){
    return view('landingpage');
})->name('landingpage');

Route::get('/home', function(){
    return redirect()->route('landingpage');
});
//I rewrote them this way so that the URL segment is equal to 'post'. This will facilitate the 'active' property in the sidebar

Auth::routes();

//Control Panel Routes
Route::get('/controlpanel', function () {
    return view('controlpanel');
})->name('controlpanel');

Route::get('/controlpanel/changePassword',  'UserUpdateController@showChangePasswordForm')->name('changepasswordform');
Route::post('/controlpanel/changePassword', 'UserUpdateController@changePassword')->name('changePassword');
Route::get('/controlpanel/changeEmail', 'UserUpdateController@showchangeEmailForm')->middleware('password.confirm')->name('changeemailform');
Route::post('/controlpanel/changeEmail', 'UserUpdateController@changeEmail')->name('changeEmail');
Route::post('/controlpanel/changeUsername', 'UserUpdateController@changeUsername')->name('changeUsername');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/index2', function () {
    return view('posts.index2');
})->name('index2'); //remove this when done with testing

//Posts
Route::get('post/ownposts', 'PostController@ownposts')->name('ownposts');
//if you are adding methods to a resource add them before registering the resource.
Route::resource('/post', 'PostController');

//contact Us
Route::get('contact', 'ContactFormController@create')->name('createcontact');
Route::post('contact', 'ContactFormController@store');

//Theme
Route::post('saveTheme', 'Themecontroller@savetheme')->name('theme.save');;

//Profiles
Route::get('/profile/{id}', 'ProfilesController@index')->name('profile.show');

//Live_Search
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');
