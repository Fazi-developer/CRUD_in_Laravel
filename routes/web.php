<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('Dashboard');
})->name('Homepage');

// Route::get('/products/index',[ProductsController::class,'index'])->name('Products.index');
// Route::get('/products/create',[ProductsController::class,'create'])->name('Products.create');
// Route::post('/products/store',[ProductsController::class,'store'])->name('Products.store');
// Route::get('/products/{product}/edit',[ProductsController::class,'edit'])->name('Products.edit');
// Route::put('/products/{product}',[ProductsController::class,'update'])->name('Products.update');
// Route::delete('/products/{product}',[ProductsController::class,'destory'])->name('Products.destory');

Route::get('/register',function (){return view('Auth.Register');})->name('register');
Route::post('/registerSave', [UserController::class,'register'])->name('RegisterSave');
Route::controller(ProductsController::class)->group(function(){
    Route::get('/products/index','index')->name('Products.index'); 
    Route::get('/products/create','create')->name('Products.create');
    Route::post('/products/store','store')->name('Products.store');
    Route::get('/products/{product}/edit','edit')->name('Products.edit');
    Route::put('/products/{product}','update')->name('Products.update');
    Route::delete('/products/{product}','destory')->name('Products.destory');
    
});
