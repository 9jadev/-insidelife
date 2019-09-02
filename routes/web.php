<?php
use App\Category;
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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', 'pagesController@index');

Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{social}', 'Auth\LoginController@redirectToProvider')->where('social', 'github|google');
Route::get('login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'github|google');
Route::get('/category/{cate}', 'PagesController@cate');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::resource('post', 'PostsController')->middleware('verified');
// Route::get('/cate', 'CategoryController@index')->name('cate');
 //Route::get('/', 'CategoryController@index')->name('cate');

View::composer(['*'], function ($view) {
        $cat = Category::orderBy('created_at','desc')->get();
        return $view->with('cats', $cat);
});