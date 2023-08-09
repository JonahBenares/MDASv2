<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadScheduleController;
use App\Http\Controllers\UploadHAPController;
use App\Http\Controllers\UploadRegionalController;
use App\Http\Controllers\ReportScheduleController;
use App\Http\Controllers\ReportScheduleDailyController;
use App\Http\Controllers\ReportScheduleWeeklyController;
use App\Http\Controllers\ReportSchedAverageController;
use App\Http\Controllers\ReportRegionalController;
use App\Http\Controllers\ReportRegionalAverageController;
use App\Http\Controllers\ReportRegionalWeeklyController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\PowerPlantController;
use App\Http\Controllers\PowerPlantTypeController;
use App\Http\Controllers\GridController;
use App\Http\Controllers\ResourceTypeController;
use App\Http\Controllers\PriceNodesController;
use App\Http\Controllers\ReportActualOutagesController;
use App\Http\Controllers\ReportOutagesTypeController;
use App\Http\Controllers\DashboardController;
use App\Models\Dashboard;

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
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('auth/login');
});
Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::resource('grid', GridController::class);
    Route::resource('pricenodes', PriceNodesController::class);
    Route::resource('resourcetype', ResourceTypeController::class);

    Route::resource('uploadschedules', UploadScheduleController::class);
    Route::post('/uploadschedules/saveall', [UploadScheduleController::class, 'saveall'])->name('saveall');
    Route::post('/uploadschedules/insertpowerplant', [UploadScheduleController::class, 'insertpowerplant']);
    Route::post('/uploadschedules/cancelschedule', [UploadScheduleController::class, 'cancelschedule']);
    Route::post('/uploadschedules/store-data', [UploadScheduleController::class, 'store']);
    Route::post('/uploadschedules/delete_temp', [UploadScheduleController::class, 'delete_temp']);
    Route::post('/uploadschedules/updateresource', [UploadScheduleController::class, 'update']);
    Route::post('/uploadschedules/uploadindex', [UploadScheduleController::class, 'index']);
    Route::get('/uploadschedules/show/{$identfier}', [UploadScheduleController::class, 'show']);
    Route::post('/uploadschedules/filter_datatable', [UploadScheduleController::class, 'filter_datatable']);
    Route::get('/search', [UploadScheduleController::class, 'filter_datatable'])->name('uploadschedules.search');
    Route::resource('uploadhap', UploadHAPController::class);
    Route::post('/uploadhap/store-hap', [UploadHAPController::class, 'store']);
    Route::get('/uploadhap/show/{$identfier}', [UploadHAPController::class, 'show']);
    Route::resource('uploadregional', UploadRegionalController::class);
    Route::post('/uploadregional/store-regional', [UploadRegionalController::class, 'store']);
    Route::get('/uploadregional/show/{$identfier}', [UploadRegionalController::class, 'show']);

    Route::resource('reportactualoutages', ReportActualOutagesController::class);
    Route::post('/reportactualoutages/filter_actualoutagesload', [ReportActualOutagesController::class, 'filter_actualoutagesload'])->name('filter_actualoutagesload');
    Route::post('/reportactualoutages/updateoutages', [ReportActualOutagesController::class, 'updateoutages']);
    Route::post('/reportactualoutages/fetchAdd', [ReportActualOutagesController::class, 'fetchAdd']);
    Route::post('/reportactualoutages/insertNewOutage', [ReportActualOutagesController::class, 'insertNewOutage'])->name('insertNewOutage');
    Route::resource('reportoutagestype', ReportOutagesTypeController::class);
    Route::post('/reportoutagestype/filter_outagetype', [ReportOutagesTypeController::class, 'filter_outagetype'])->name('filter_outagetype');
    Route::resource('reportschedules', ReportScheduleController::class);
    Route::post('/reportschedules/filter_scheduleload', [ReportScheduleController::class, 'filter_scheduleload'])->name('filter_scheduleload');
    Route::resource('reportschedulesdaily', ReportScheduleDailyController::class);
    Route::post('/reportschedulesdaily/filter_scheduleloaddaily', [ReportScheduleDailyController::class, 'filter_scheduleloaddaily'])->name('filter_scheduleloaddaily');
    Route::resource('reportschedulesweekly', ReportScheduleWeeklyController::class);
    Route::post('/reportschedulesweekly/filter_scheduleloadweekly', [ReportScheduleWeeklyController::class, 'filter_scheduleloadweekly'])->name('filter_scheduleloadweekly');
    Route::resource('reportschedaverage', ReportSchedAverageController::class);
    Route::post('/reportschedaverage/filter_scheduleloadavg', [ReportSchedAverageController::class, 'filter_scheduleloadavg'])->name('filter_scheduleloadavg');
    Route::resource('reportregional', ReportRegionalController::class);
    Route::post('/reportregional/filter_regionalload', [ReportRegionalController::class, 'filter_regionalload'])->name('filter_regionalload');
    Route::resource('reportregionalaverage', ReportRegionalAverageController::class);
    Route::post('/reportregionalaverage/filter_regionalavgload', [ReportRegionalAverageController::class, 'filter_regionalavgload'])->name('filter_regionalavgload');
    Route::resource('reportregionalweekly', ReportRegionalWeeklyController::class);
    Route::post('/reportregionalweekly/filter_regionalweekly', [ReportRegionalWeeklyController::class, 'filter_regionalweekly'])->name('filter_regionalweekly');
    Route::resource('region', RegionController::class);
    Route::resource('powerplant', PowerPlantController::class);
    Route::post('/powerplant/fetchsub', [PowerPlantController::class, 'fetchSub']);
    Route::post('/powerplant/fetchregion', [PowerPlantController::class, 'fetchRegion']);
    Route::post('/powerplant/fetchregionid', [PowerPlantController::class, 'fetchRegionid']);
    Route::post('/powerplant/insertResource', [PowerPlantController::class, 'insertResource'])->name('insertResource');
    Route::get('/powerplant/show/{id}/{count}', [PowerPlantController::class, 'show'])->name('showResource');
    Route::get('/powerplant/editResource/{id}/{count}', [PowerPlantController::class, 'editResource'])->name('editResource');
    Route::post('/powerplant/updateResource', [PowerPlantController::class, 'updateResource'])->name('updateResource');
    Route::get('/destroy-powerplant/{id}', [PowerPlantController::class, 'destroy'])->name("destroyPoweplant");
    Route::resource('powerplanttype', PowerPlantTypeController::class);
    Route::get('/powerplanttype/show/{id}', [PowerPlantTypeController::class, 'show'])->name('show');
    Route::post('/powerplanttype/insertSub', [PowerPlantTypeController::class, 'insertSub'])->name('insertSub');
    Route::put('/edit-type',[PowerPlantTypeController::class, 'update'])->name('edit_type');
    Route::put('/update-sub', [PowerPlantTypeController::class, 'updateSub'])->name('updateSub');
    Route::get('/powerplanttype/destroy/{id}/{type_id}', [PowerPlantTypeController::class, 'destroy'])->name("destroy");
    Route::get('/destroy-type/{id}', [PowerPlantTypeController::class, 'destroyType'])->name("destroyType");
});


