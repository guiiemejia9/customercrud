<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});

//de esta forma SOLO nos genera las rutas de los metodos que estan en el only
//Route::resource('blog',App\Http\Controllers\BlogController::class)->only(['index','store','show','update','destroy']);

//de esta forma nos genera todas las rutas
Route::resource('customer',App\Http\Controllers\CustomerController::class);

route::get('getCustomer',[\App\Http\Controllers\CustomerController::class, 'index'])->name('api-getAll');
Route::delete('deleteCustomer/{id}', [\App\Http\Controllers\CustomerController::class, 'deleteCustomer'])->name('api-delete');
Route::post('saveCustomer', [App\Http\Controllers\CustomerController::class, 'store'])->name('api-saveCustomer');
Route::put('editCustomer/{id}', [App\Http\Controllers\CustomerController::class, 'editCustomer'])->name('api-editCustomer');

//Route::resource('customer', CustomerController::class);