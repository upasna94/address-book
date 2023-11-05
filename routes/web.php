<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactsController;

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


Route::get('contacts/create',[ContactsController::class,'create']);
Route::get('/',[ContactsController::class,'index'])->name('contacts.index');
Route::post('contacts',[ContactsController::class,'store']);
Route::get('delete-contact/{id}', [ContactsController::class, 'destroy']);
Route::get('edit-contact/{id}', [ContactsController::class, 'edit']);
Route::put('/contacts/{id}', [ContactsController::class, 'update']);


