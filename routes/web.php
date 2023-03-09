<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadScheduleController;
use App\Http\Controllers\UploadHAPController;
use App\Http\Controllers\UploadRegionalController;
use App\Http\Controllers\ReportScheduleController;
use App\Http\Controllers\ReportSchedAverageController;
use App\Http\Controllers\ReportRegionalController;
use App\Http\Controllers\ReportRegionalAverageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PowerPlantController;
use App\Http\Controllers\PowerPlantTypeController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('uploadschedules', UploadScheduleController::class);
Route::resource('uploadhap', UploadHAPController::class);
Route::resource('uploadregional', UploadRegionalController::class);

Route::resource('reportschedules', ReportScheduleController::class);
Route::resource('reportschedaverage', ReportSchedAverageController::class);
Route::resource('reportregional', ReportRegionalController::class);
Route::resource('reportregionalaverage', ReportRegionalAverageController::class);
Route::resource('location', LocationController::class);
Route::resource('powerplant', PowerPlantController::class);
Route::resource('powerplanttype', PowerPlantTypeController::class);

