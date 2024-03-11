<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\MenuController;
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
    return redirect('/login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    //顧客一覧・登録・編集
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index'); 
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create'); 
    Route::get('/customer/{id}/detail', [CustomerController::class, 'detail'])->name('customer.detail'); 
    Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit'); 
    Route::post('/customer/store/{id?}', [CustomerController::class, 'store'])->name('customer.store'); 
    Route::post('/customer/delete/{id?}', [CustomerController::class, 'delete'])->name('customer.delete'); 
    Route::get('/customer/getAddressByPostalCode/{input_postal_code}', [CustomerController::class, 'getAddressByPostalCode'])->name('customer.getAddressByPostalCode'); 
    Route::get('/customer/getCustomer', [CustomerController::class, 'getCustomer'])->name('customer.getCustomer'); 

    //メニューマスタ一覧・登録・編集
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index'); 
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create'); 
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit'); 
    Route::post('/menu/store/{id?}', [MenuController::class, 'store'])->name('menu.store'); 
    Route::post('/menu/delete/{id?}', [MenuController::class, 'delete'])->name('menu.delete'); 

    //施術一覧・登録・編集
    Route::get('/treatment', [TreatmentController::class, 'index'])->name('treatment.index'); 
    Route::get('/treatment/create', [TreatmentController::class, 'create'])->name('treatment.create'); 
    Route::get('/treatment/{id}/detail', [TreatmentController::class, 'detail'])->name('treatment.detail'); 
    Route::get('/treatment/{id}/edit', [TreatmentController::class, 'edit'])->name('treatment.edit'); 
    Route::post('/treatment/store/{id?}', [TreatmentController::class, 'store'])->name('treatment.store'); 
    Route::post('/treatment/delete/{id?}', [TreatmentController::class, 'delete'])->name('treatment.delete'); 
    Route::get('/treatment/getTreatmentById/{id?}', [TreatmentController::class, 'getTreatmentById'])->name('treatment.getTreatmentById'); 
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
