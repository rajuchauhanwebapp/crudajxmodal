<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInfoController;

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

Route::get('/', [UserInfoController::class, 'home']);
Route::get('user-listing/', [UserInfoController::class, 'user_list']);
Route::post('create-account', [UserInfoController::class, 'create'])->name('create_account');
Route::get('edit-user/{id}', [UserInfoController::class, 'edit'])->name('edit_user');
Route::post('update-user/', [UserInfoController::class, 'update'])->name('update_user');
Route::get('delete-user/{id}', [UserInfoController::class, 'delete'])->name('delete_user');