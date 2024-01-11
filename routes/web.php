<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KioskController;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();


Route::middleware(['auth', 'user-role:user'])->group(function () {

    //Dashboard
    //Route::get('urlAdress', [controllerName::class, 'functionName'])->name(a href link name)
    // Route::get('/home', [HomeController::class, 'index'])->name('user.index');

    //Manage Application
    Route::get('/applicationStatus', [ApplicationController::class, 'index'])->name('application.index');
    Route::get('/kioskApplication', [ApplicationController::class, 'createApp'])->name('application.create');
    Route::post('/storeApplication', [ApplicationController::class, 'storeApp'])->name('application.store');
    Route::get('/editApplication/{application}', [ApplicationController::class, 'editApp'])->name('application.editApp');
    Route::post('/updateApplication/{application}', [ApplicationController::class, 'updateApp'])->name('application.updateApp');
    Route::get('/viewApplication/{application}', [ApplicationController::class, 'showApp'])->name('application.viewApp');
    Route::get('/deleteApplication/{application}', [ApplicationController::class, 'destroyApp'])->name('application.destroyApp');
    Route::get('/printApplication/{application}', [ApplicationController::class, 'downloadApp'])->name('application.printApp');
    Route::get('/kioskAvailability', [ApplicationController::class, 'showListKiosk'])->name('application.availability');



    //Manage Complaint
    Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint.index');
    Route::get('/complaintApplication', [ComplaintController::class, 'add'])->name('complaint.add');
    Route::post('/storeComplaint', [ComplaintController::class, 'store'])->name('complaint.store');
    Route::get('/editComplaint/{complaints}', [ComplaintController::class, 'edit'])->name('complaint.edit');
    Route::post('/updateComplaint/{complaints}', [ComplaintController::class, 'update'])->name('complaint.update');
    Route::get('/viewComplaint/{complaints}', [ComplaintController::class, 'show'])->name('complaint.show');
    Route::post('/complaintClose/{complaints}', [ComplaintController::class, 'close'])->name('complaint.close');
});

Route::middleware(['auth', 'user-role:admin'])->group(function () {

    //Dashboard
    // Route::get('/admin/home', [HomeController::class, 'adminIndex'])->name('admin.index');

    //Manage Kiosk
    // Route::get('/kioskList', [KioskController::class, 'index'])->name('kiosk.index');
    Route::get('/kioskList', [KioskController::class, 'index'])->name('kiosk.index');
    Route::get('/registerKiosk', [KioskController::class, 'createKiosk'])->name('kiosk.registerKiosk');
    Route::post('/storeKiosk', [KioskController::class, 'storeKiosk'])->name('kiosk.store');
    Route::get('/editKiosk/{kiosk}', [KioskController::class, 'editKiosk'])->name('kiosk.editKiosk');
    Route::post('/updateKiosk/{kiosk}', [KioskController::class, 'updateKiosk'])->name('kiosk.updateKiosk');
    Route::get('/viewKiosk/{kiosk}', [KioskController::class, 'showKiosk'])->name('kiosk.viewKiosk');
    Route::get('/deleteKiosk/{kiosk}', [KioskController::class, 'destroyKiosk'])->name('kiosk.destroyKiosk');

    //Manage Approval
    Route::get('/applicationList', [ApplicationController::class, 'indexAdmin'])->name('approval.index');
    Route::post('/applicationSearch', [ApplicationController::class, 'searchStatus'])->name('approval.search');
    Route::get('/editStatus/{application}', [ApplicationController::class, 'editStatusApp'])->name('approval.editStatus');
    Route::post('/updateStatus/{application}', [ApplicationController::class, 'updateStatusApp'])->name('approval.updateStatus');
    Route::get('/viewApp/{application}', [ApplicationController::class, 'showAppForm'])->name('approval.viewApp');
    Route::get('/downloadApplication/{application}', [ApplicationController::class, 'downloadApp'])->name('approval.download');
});

Route::middleware(['auth', 'user-role:technical'])->group(function () {

    //Dashboard
    Route::get('/technical/home', [ComplaintController::class, 'indexComp'])->name('technical.index');
    Route::post('/technical/search', [ComplaintController::class, 'statusSearch'])->name('status.search');


    //Manage Complaint
    Route::get('/technical/viewComplaintApp/{complaints}', [ComplaintController::class, 'viewComp'])->name('technical.view');
    Route::post('/technical/assignTech/{complaints}', [ComplaintController::class, 'assign'])->name('technical.assign');
    Route::post('/technical/updateProgress/{complaints}', [ComplaintController::class, 'updateProgress'])->name('technical.progress');
    Route::get('/technical/printComplaint/{complaints}', [ComplaintController::class, 'print'])->name('technical.print');

});


Route::middleware(['auth', 'user-role:bursary'])->group(function () {

    //Dashboard
    Route::get('/bursary/home', [HomeController::class, 'bursaryIndex'])->name('bursary.index');
});

Route::middleware(['auth', 'user-role:pupuk'])->group(function () {

    //Dashboard
    Route::get('/pupuk/home', [HomeController::class, 'pupukIndex'])->name('pupuk.index');
});
