<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
|
 */

Route::get('/', function () {
    return redirect()->route('home');
});
Auth::routes(['register' => false]);
Route::group(['prefix' => 'admin',], function () {
    Route::group(['prefix'=>'dashboard','middleware'=>'auth'],function(){
        Route::get('', function(){
            return redirect()->route('article.index');
        })->name('dashboard.index');
//        ------------------------- Article ----------------------------------------------------
        Route::get('/articles',[ArticleController::class,'index'])->name('article.index');
        Route::get('/articles/create',[ArticleController::class,'create'])->name('article.create');
        Route::get('article/edit/{article}',[ArticleController::class,'edit'])->name('article.edit');
        Route::post('article/store',[ArticleController::class,'store'])->name('article.store');
        Route::post('article/update/{article}',[ArticleController::class,'update'])->name('article.update');
        Route::get('article/delete/{article}',[ArticleController::class,'destroy'])->name('article.delete');
                // -------------------       Category      --------------------------------------------
        Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
        Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
        Route::get('category/edit/{category}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
        Route::post('category/update/{category}',[CategoryController::class,'update'])->name('category.update');
        Route::get('category/delete/{category}',[CategoryController::class,'destroy'])->name('category.delete');
//        ------------------------------------ Tags ----------------------------------------------------------------
        Route::get('/tags',[TagController::class,'index'])->name('tag.index');
        Route::get('/tag/create',[TagController::class,'create'])->name('tag.create');
        Route::get('tag/edit/{tag}',[TagController::class,'edit'])->name('tag.edit');
        Route::post('tag/store',[TagController::class,'store'])->name('tag.store');
        Route::post('tag/update/{tag}',[TagController::class,'update'])->name('tag.update');
        Route::get('tag/delete/{tag}',[TagController::class,'destroy'])->name('tag.delete');
//        ---------------------------------- contacts ----------------------------------------------
        Route::get('/contacts',[ContactController::class,'index'])->name('contact.index');
    });

});

Route::get('/home', [FrontController::class, 'index'])->name('home');
Route::get('/search', [FrontController::class, 'search'])->name('article.search');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/category/{category}', [CategoryController::class, 'showCategoryArticles'])->name('category.show');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/article/{article}', [FrontController::class, 'show'])->name('article.show');
