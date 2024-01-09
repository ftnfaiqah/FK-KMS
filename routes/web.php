<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KioskController;
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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-role:user'])->group(function () {

    //Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('user.index');

    //Manage Complaint
    Route::get('/complaint', [ComplaintController::class, 'index'])->name('user.complaint');
    Route::get('/complaintApplication', [ComplaintController::class, 'add'])->name('user.add');
    Route::get('/editComplaint', [ComplaintController::class, 'edit'])->name('user.edit');
    Route::get('/viewComplaint', [ComplaintController::class, 'show'])->name('user.show');
});

Route::middleware(['auth', 'user-role:admin'])->group(function () {

    //Dashboard
    Route::get('/admin/home', [HomeController::class, 'adminIndex'])->name('admin.index');

    
    //Route::get('urlAdress', [controllerName::class, 'functionName'])->name(a href link name)
    //Manage Kiosk Details
    Route::get('/kioskList', [KioskController::class, 'index'])->name('kiosk.index');
    Route::get('/registerKiosk', [KioskController::class, 'createKiosk'])->name('kiosk.registerKiosk');
    Route::post('/storeKiosk', [KioskController::class, 'storeKiosk'])->name('kiosk.store');
    Route::get('/viewKiosk/{kiosk}', [KioskController::class, 'showKiosk'])->name('kiosk.viewKiosk');
    Route::get('/editKiosk/{kiosk}', [KioskController::class, 'editKiosk'])->name('kiosk.editKiosk');
    Route::post('/updateKiosk/{kiosk}', [KioskController::class, 'updateKiosk'])->name('kiosk.updateKiosk');
    Route::get('/deleteKiosk/{kiosk}', [KioskController::class, 'destroyKiosk'])->name('kiosk.destroyKiosk');

});

Route::middleware(['auth', 'user-role:technical'])->group(function () {

    //Dashboard
    Route::get('/technical/home', [HomeController::class, 'technicalIndex'])->name('technical.index');
    
    //Manage Complaint
    Route::get('/technical/viewComplaintApp', [ComplaintController::class, 'showComp'])->name('technical.show');
    Route::get('/technical/printComplaint', [ComplaintController::class, 'print'])->name('technical.print');
    
});

Route::middleware(['auth', 'user-role:bursary'])->group(function () {

    //Dashboard
    Route::get('/bursary/home', [HomeController::class, 'bursaryIndex'])->name('bursary.index');
});

Route::middleware(['auth', 'user-role:pupuk'])->group(function () {

    //Dashboard
    Route::get('/pupuk/home', [HomeController::class, 'pupukIndex'])->name('pupuk.index');
});
