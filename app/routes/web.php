<?php

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

Route::get('/', 'App\Http\Controllers\PostController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'App\Http\Controllers\PostController@index']);

Route::get('curated', 'App\Http\Controllers\PostController@curated');
Route::get('exploration', 'App\Http\Controllers\PostController@exploration');
Route::get('real-project', 'App\Http\Controllers\PostController@real_project');
Route::get('private', 'App\Http\Controllers\PostController@private');

Route::get('/posts/category/{id}', 'App\Http\Controllers\PostController@category');

Route::get('/posts/category/{id}/curated', 'App\Http\Controllers\PostController@category_curated');
Route::get('/posts/category/{id}/exploration', 'App\Http\Controllers\PostController@category_exploration');
Route::get('/posts/category/{id}/real-project', 'App\Http\Controllers\PostController@category_real_project');
Route::get('/posts/category/{id}/private', 'App\Http\Controllers\PostController@category_private');

Route::get('categories', 'App\Http\Controllers\CategoryController@index');
// add categories
Route::post('categories/add', 'App\Http\Controllers\CategoryController@store');
Route::post('categories/destroy/{id}', 'App\Http\Controllers\CategoryController@destroy');
Route::post('categories/update/{id}', 'App\Http\Controllers\CategoryController@update');


Route::get('tags', 'App\Http\Controllers\TagController@index');
// add tags
Route::post('tags/add', 'App\Http\Controllers\TagController@store');
Route::post('tags/destroy/{id}', 'App\Http\Controllers\TagController@destroy');
Route::post('tags/update/{id}', 'App\Http\Controllers\TagController@update');


//authentication
// Route::resource('auth', 'Auth\AuthController');
// Route::resource('password', 'Auth\PasswordController');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');
Route::group(['prefix' => 'auth'], function () {
  Auth::routes();
});

// check for logged in user
Route::middleware(['auth'])->group(function () {
  // show new post form
  Route::get('new-post', 'App\Http\Controllers\PostController@create');
  // save new post
  Route::post('new-post', 'App\Http\Controllers\PostController@store');
  // edit post form
  Route::get('edit/{slug}', 'App\Http\Controllers\PostController@edit');
  // update post
  Route::post('update', 'App\Http\Controllers\PostController@update');
  // delete post
  Route::get('delete/{id}', 'App\Http\Controllers\PostController@destroy');
  // display user's all posts
  Route::get('my-all-posts', 'App\Http\Controllers\UserController@user_posts_all');
  // display user's drafts
  Route::get('my-drafts', 'App\Http\Controllers\UserController@user_posts_draft');
  // add comment
  Route::post('comment/add', 'App\Http\Controllers\CommentController@store');
  // delete comment
  Route::post('comment/delete/{id}', 'App\Http\Controllers\CommentController@destroy');
});

//users profile
Route::get('user/{id}', 'App\Http\Controllers\UserController@profile')->where('id', '[0-9]+');
// display list of posts
Route::get('user/{id}/posts', 'App\Http\Controllers\UserController@user_posts')->where('id', '[0-9]+');
// display single post
Route::get('/{slug}', ['as' => 'post', 'uses' => 'App\Http\Controllers\PostController@show'])->where('slug', '[A-Za-z0-9-_]+');


Route::get('user/{id}/posts/collaboration', 'App\Http\Controllers\UserController@user_posts_collaboration')->where('id', '[0-9]+');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
