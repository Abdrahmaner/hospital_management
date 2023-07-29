<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard/doctors', [App\Http\Controllers\HomeController::class, 'doctors'])->name('doctors');
Route::get('/registerdoc', [App\Http\Controllers\HomeController::class, 'registerdoc'])->name("registerdoc");
Route::resource('dashboard',App\Http\Controllers\HomeController::class);
Route::resource('patients',App\Http\Controllers\PatientController::class);
Route::get('dashboard/doctor','App\Http\Controllers\DoctorController@index');
Route::get('Myprofile','App\Http\Controllers\DoctorController@profile')->name('profile');
Route::get('Myprofile/edit','App\Http\Controllers\DoctorController@edit')->name('docedit');
Route::patch('Myprofile/update','App\Http\Controllers\DoctorController@update')->name('docupdate');
Route::resource('medicalhistory',App\Http\Controllers\MedicalhistoryController::class);
Route::get('patients/pdf/{id}',[App\Http\Controllers\PatientController::class,'getpdf'])->name('pdf');





