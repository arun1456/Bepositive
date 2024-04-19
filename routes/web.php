<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DonorController;

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();


Route::middleware(['auth'])->group(function () 
{
    Route::get('/consolelogin', [AdminController::class, 'consolelogin'])->name('consolelogin');
    Route::get('/console', [AdminController::class, 'admin'])->name('console');

    Route::post('/store', [LocationController::class, 'store'])->name('location.store');
    Route::get('/locationform', [LocationController::class, 'locationForm'])->name('location.form');
    Route::get('/locationtable', [LocationController::class, 'locationTable'])->name('location.table');
    Route::get('/cities/{id}', [LocationController::class, 'destroy'])->name('location.destroy');

    Route::get('/donorform', [DonorController::class, 'donorForm'])->name('donor.form');
    Route::get('/donortable', [DonorController::class, 'donorTable'])->name('donor.table');
    Route::get('/selectdist/{id}', [DonorController::class, 'selectDist'])->name('donor.districtstep');
    Route::post('/donorstore', [DonorController::class, 'store'])->name('donor.store');
    Route::get('/donordelete/{id}', [DonorController::class, 'destroy'])->name('donor.destroy');
    Route::get('/donorfilterform', [DonorController::class, 'filterForm'])->name('donor.filterform');
    Route::post('/bgfilter', [DonorController::class, 'bgfilter'])->name('donor.bgfilter');
    Route::get('/selectcity/{id}', [DonorController::class, 'selCity'])->name('donor.selcity');
    Route::get('/selectdiv', [DonorController::class, 'selDiv'])->name('donor.selDiv');

});

Route::get('/home', [UserController::class, 'index'])->name('home');