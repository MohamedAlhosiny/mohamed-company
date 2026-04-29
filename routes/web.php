<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BossController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');




Route::prefix('/products')->name('product.')->group(function() {
    route::get('' ,[ProductController::class , 'index'])->name('index')->middleware('SpecialRole');
    route::get('/create' , [ProductController::class , 'create'])->name('create');
    route::post('/store' , [ProductController::class , 'store'])->name('store');
    route::get('/{product}' , [ProductController::class , 'destroy'])->name('destroy');
    route::get('/{product}/edit' , [ProductController::class , 'edit'])->name('edit');
    route::post('/{product}' , [ProductController::class , 'update'])->name('update');
    route::get('/download/{id}' , [ProductController::class , 'download'])->name('download');
});

Route::prefix('/categories')->name('categories.')->group(function () {

    route::get( '/category' ,[CategoryController::class , 'index'])->name('index')->middleware('SpecialRole');
    route::get('/create' , [CategoryController::class , 'create'])->name('create');
    route::post('/store' , [CategoryController::class , 'store'])->name('store');
    route::get('/{category}/edit' , [CategoryController::class , 'edit'])->name('edit');
    route::post('/{category}' , [CategoryController::class , 'update'])->name('update');
    route::get('/download/{category}' , [CategoryController::class , 'download'])->name('download');
    route::get('/status/{category}' , [CategoryController::class , 'changeStatus'])->name('status');
    route::get('/{category}', [CategoryController::class , 'destroy'])->name('destroy');

});

route::prefix('mppabe')->name('boss.')->group(function() {
    route::get('/loginPage' , [BossController::class , 'loginPage'])->name('loginPage');
    route::get('/register' , [BossController::class , 'create'])->name('register');
    route::post('/store' , [BossController::class , 'store'])->name('store');
    route::post('/login' , [BossController::class , 'login'])->name('login');
    route::middleware('auth:boss')->group(function() {
        route::get('/dashboard' , [BossController::class , 'dashboard'])->name('dashboard');
        route::get('/logout' , [BossController::class , 'logout'])->name('logout');


    });

});


