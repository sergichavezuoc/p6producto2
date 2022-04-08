<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\enrollmentController;
use App\Http\Controllers\classroomController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\usuariosController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => ['auth:admin']], function () {
    Route::resource('students',studentsController::class);
    Route::resource('courses',coursesController::class);
    Route::resource('enrollment',enrollmentController::class);
    Route::resource('profesor',ProfesorController::class);
    Route::resource('classroom',classroomController::class);
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    

});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('usuarios',usuariosController::class);
require __DIR__.'/auth.php';
