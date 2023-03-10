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
use App\Http\Controllers\RegionController;
use App\Http\Controllers\PowerPlantController;
use App\Http\Controllers\PowerPlantTypeController;
use App\Http\Controllers\GridController;
use App\Http\Controllers\ResourceTypeController;
use App\Http\Controllers\PriceNodesController;

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

Route::resource('grid', GridController::class);
Route::resource('pricenodes', PriceNodesController::class);
Route::resource('resourcetype', ResourceTypeController::class);


Route::resource('uploadschedules', UploadScheduleController::class);
Route::resource('uploadhap', UploadHAPController::class);
Route::resource('uploadregional', UploadRegionalController::class);

Route::resource('reportschedules', ReportScheduleController::class);
Route::resource('reportschedaverage', ReportSchedAverageController::class);
Route::resource('reportregional', ReportRegionalController::class);
Route::resource('reportregionalaverage', ReportRegionalAverageController::class);
Route::resource('region', RegionController::class);
Route::resource('powerplant', PowerPlantController::class);
Route::resource('powerplanttype', PowerPlantTypeController::class);
Route::get('/powerplanttype/show/{id}', [PowerPlantTypeController::class, 'show'])->name('show');
Route::post('/powerplanttype/insertSub', [PowerPlantTypeController::class, 'insertSub'])->name('insertSub');

