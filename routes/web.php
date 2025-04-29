<?php

use App\Http\Controllers\blogControler;
use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\userController;
use App\Models\blog;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.home');
// })->middleware('auth');

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
})->name('logout')->middleware('auth');



Route::get('/', [blogControler::class, 'showAllBlogs'])->middleware('auth');

Route::get('/blogPage/{id}', function ($id) {
    $blog = blog::find($id);
    return view('pages.blogPage', compact('blog'));
})->middleware('auth');


Route::get('/deleteBlog/{id}', [blogControler::class, 'deleteBlog'])->middleware('auth');
Route::get('/searchBlog', action: [blogControler::class, 'searchBlog'])->name('searchBlog')->middleware('auth');
Route::get('/addBlog', function () {
    $categories = Category::all();
    return view('pages.addBlog', compact('categories'));
})->middleware('auth');
route::post('/addBlog', [blogControler::class, 'addBlog'])->name('addBlog');

route::get('/myBlog', function () {
    return view('pages.myBlog', ['blogs' => blog::where('user_id', Auth::id())->get()]);
})->middleware('auth');



use App\Http\Controllers\CommentController;

Route::post('/comments', [ComentController::class, 'store'])->name('comments.store');
Route::get('/comments/{id}', [ComentController::class, 'destroy']);
Route::get('/comments/edit/{id}', [ComentController::class, 'edit']);
Route::post('/comments/update/{id}', [ComentController::class, 'update']);


Route::get('/filterBlogsByCategory', [blogControler::class, 'filterBlogsByCategory'])->name('filterBlogsByCategory')->middleware('auth');
