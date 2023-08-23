<?php

use App\Http\Controllers\Form;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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


// Todo using ajax
 Route::resource('/tddd',TodoController::class);
Route::get('/todos',[TodoController::class,'index'])->name('todos.index');
// this route will return a table view
Route::post('/todos/all',[TodoController::class,'all'])->name('todos.all');
Route::post('/todos/store',[TodoController::class,'store'])->name('todos.store');
Route::get('/todos/{id}',[TodoController::class,'show'])->name('todos.show');
Route::get('/todos/{id}/edit',[TodoController::class,'edit'])->name('todos.edit');
Route::put('/todos/{id}',[TodoController::class,'update'])->name('todos.update');
Route::delete('/todos/{id}',[TodoController::class,'delete'])->name('todos.delete');
Route::post('/todos/{id}/json',[TodoController::class,'selectSingleAsJson'])->name('todos.single');

// form validation
Route::view('/form', 'Form.create');
Route::post('/form', [FormController::class,'store'])->name('form.store');


