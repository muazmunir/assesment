<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ImagesController;
use Illuminate\Support\Facades\Route;

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

Route::resource('calendars', CalendarController::class);

Route::get('/appointments', [AppointmentController::class,'index'])->name('appointments.index');
Route::get('/appointments/schedule', [AppointmentController::class,'schedule'])->name('appointments.schedule');
Route::get('/appointments/create', [AppointmentController::class,'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class,'store'])->name('appointments.store');
Route::get('/appointments/{appointment}', [AppointmentController::class,'show'])->name('appointments.show');
Route::get('/appointments/{appointment}/edit', [AppointmentController::class,'edit'])->name('appointments.edit');
Route::patch('/appointments/{appointment}', [AppointmentController::class,'update'])->name('appointments.update');
Route::delete('/appointments/{appointment}', [AppointmentController::class,'destroy'])->name('appointments.destroy');
 
 

Route::resource('images', ImagesController::class);