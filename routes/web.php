<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\studentsAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\enrollmentController;
use App\Http\Controllers\classroomController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\worksController;
use App\Http\Controllers\examsController;
use App\Http\Controllers\incidencesController;

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

Route::get('/students/login', [studentsAuthController::class, 'showLoginForm'])->name('students.login');
Route::get('/students/register', [studentsAuthController::class, 'registration'])->name('students.registration');
Route::post('/students/registered', [studentsAuthController::class, 'customRegistration'])->name('students.postregistration');
Route::post('/students/login', [studentsAuthController::class, 'login'])->name('students.login');
Route::get('/students/logout', [studentsAuthController::class, 'logout'])->name('students.logout');
Route::group(['middleware' => ['auth:students']], function () {
    Route::get('students/dashboard', [usuariosController::class, 'dashboard'])->name('usuarios.dashboard');
    Route::get('students/expediente', [usuariosController::class, 'expediente'])->name('students.expediente');
    Route::resource('usuarios',usuariosController::class);
    Route::get('students/perfil', [classroomController::class, 'editarPerfil'])->name('classroom.editarperfil');
    Route::get('students/cursos', [usuariosController::class, 'coursesshow'])->name('students.cursos');
    Route::post('students/cursos', [usuariosController::class, 'coursesshow'])->name('students.cursos');
    Route::get('student/incidences', [incidencesController::class, 'incidenceStudent']);
    Route::get('student/addIncidence', [incidencesController::class, 'addIncidence']);
    Route::post('student/newIncidence', [incidencesController::class, 'newIncidence']);
}); 
Route::group(['middleware' => ['auth:admin']], function () {
    Route::resource('exams',examsController::class);
    Route::resource('works',worksController::class);
    Route::resource('students',studentsController::class);
    Route::resource('courses',coursesController::class);
    Route::resource('enrollment',enrollmentController::class);
    Route::resource('profesor',ProfesorController::class);
    Route::get('/students/logout', [studentsAuthController::class, 'logout'])->name('students.logout');
    Route::post('classroom/addExam', [classroomController::class, 'addExam'])->name('classroom.addexam');
    Route::post('classroom/storeExam', [classroomController::class, 'storeExam'])->name('classroom.storeexam');
    Route::post('classroom/addWork', [classroomController::class, 'addWork'])->name('classroom.addwork');
    Route::post('classroom/storeWork', [classroomController::class, 'storeWork'])->name('classroom.storework');
    Route::resource('classroom',classroomController::class);
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('login');
    Route::get('admin/incidences', [incidencesController::class, 'incidences']);
    Route::get('admin/response/{id}', [incidencesController::class, 'response']);
    Route::post('admin/addresponse', [incidencesController::class, 'addResponse']);
    

});


require __DIR__.'/auth.php';
