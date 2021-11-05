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

// Route::get('/', function () {
//     return view('home.index', []);
// })->name('home.index');

Route::view('/', 'home.index')->name('home.index');     // Route::view je statični metod koji treba koristiti kada imamo jednostavne route koje se usmjeravaju direktno na view
Route::view('/contact', 'home.contact')->name('home.contact');

// Route::get('/contact', function () {
//     return view('home.contact');
// })->name('home.contact');

Route::get('/posts/{id}', function ($id) {

    $posts = [
        1 => [
            'title' => 'Intor to PHP',
            'content' => 'This is short intro to PHP'
        ],
        2 => [
            'title' => 'Intor to JavaScript',
            'content' => 'This is short intro to JavaScript'
        ]
    ];
    abort_if(!isset($posts[$id]), 404); // ovo je helper funcija koja vraća 404 ako se proslijedi neispravan id

    return view('posts.show', ['post' => $posts[$id]]);
})
    // ->where([
    //     'id' => '[0-9]+'
    // ])
    ->name('posts.show');

Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 20) {
    return 'Posts from ' . $daysAgo . ' days ago';
})->name('posts.recent.index');
