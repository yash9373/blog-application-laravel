<?php

use App\Http\Controllers\blogControler;
use App\Http\Controllers\userController;
use App\Models\blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->middleware('auth');
Route::get('/', [blogControler::class, 'showAllBlogs'])->middleware('auth');

Route::get('/blogPage/{id}', function ($id) {
    $blog = blog::find($id);
    return view('pages.blogPage', compact('blog'));
})->middleware('auth');


Route::get('/deleteBlog/{id}', [blogControler::class, 'deleteBlog'])->middleware('auth');
Route::get('/searchBlog', [blogControler::class, 'searchBlog'])->name('searchBlog')->middleware('auth');
Route::get('/addBlog', function () {
    return view('pages.addBlog');
})->middleware('auth');

Route::get('/login', function () {
    return view('pages.login');
});
Route::get('/register', function () {
    return view('pages.register');
});

route::post('/login', [userController::class, 'login'])->name('login');
route::post('/register', [userController::class, 'register'])->name('register');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


route::post('/addBlog', [blogControler::class, 'addBlog'])->name('addBlog');

route::get('/myBlog', function () {
    return view('pages.myBlog', ['blogs' => blog::where('user_id', Auth::id())->get()]);
})->middleware('auth');