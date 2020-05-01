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

//fetching data from the request
Route::get('/test', function () {
    $name = request('name');

    return view('test', [
        'name' => $name
    ]);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});


//POST
// Route::get('posts/{post}', function ($post) {
//     $posts = [
//         'my-first-post' => 'Hello this is my first post',
//         'my-second-post' => 'And that is my second post'
//     ];

//     if (!array_key_exists($post, $posts)) {
//         abort(404, 'Sorry the post was not found');
//     }
//     return view('post', [
//         'post' => $posts[$post]
//     ]);
// });

Route::get('/posts/{post}', 'PostsController@show');
