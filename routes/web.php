<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DprController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ModuleController;
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
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/users', UsersController::class)->middleware('auth');
Route::resource('/salary',SalaryController::class)->middleware('auth');
Route::post('/salary-recieved', [SalaryController::class, 'recieved'])->name('salary.recieved')->middleware('auth');
Route::get('/salary-record', [SalaryController::class, 'record'])->name('salary.record')->middleware('auth');
Route::post('/salary-recordsearch', [SalaryController::class, 'search'])->name('live_search.action')->middleware('auth');
Route::resource('Attendance',AttendanceController::class)->middleware('auth');
Route::get('/attendance-mark/{id}/{sta}', [AttendanceController::class, 'mark'])->name('attendance.mark')->middleware(('auth'));
Route::post('/att_search.action',[AttendanceController::class,'search'])->name('att_search.action')->middleware('auth');
Route::resource('leave', LeaveController::class)->middleware('auth');
Route::get('/leave-applied/{id}', [LeaveController::class, 'applied'])->name('leave.applied')->middleware(('auth'));
Route::get('/leave-status/{sta}/{id}', [LeaveController::class, 'status'])->name('leave.changestatus')->middleware(('auth'));
Route::get('/Attendance-record',[AttendanceController::class,'record'])->name('Attendance.record')->middleware(('auth'));
Route::get('Attendance-individualRecord/{empid}',[AttendanceController::class,'individualRecord'])->name('Attendance.individualRecord')->middleware('auth');
Route::resource('/project',ProjectController::class)->middleware('auth');
Route::get('project-dprs/{id}',[ProjectController::class,'dprs'])->name('project.dprs')->middleware('auth');
Route::get('module-create/{id}',[ModuleController::class,'create'])->name('module.create')->middleware('auth');
Route::post('module-store',[ModuleController::class,'store'])->name('module.store')->middleware('auth');
Route::resource('dpr',DprController::class)->middleware('auth');
Route::get('dpr-add/{id}',[DprController::class,'add'])->name('dpr.add')->middleware('auth');
Route::get('dpr-index1',[DprController::class,'index1'])->name('dpr.index1')->middleware('auth');
Route::post('dpr-search',[DprController::class,'search'])->name('dpr.search')->middleware('auth');
require __DIR__.'/auth.php';
