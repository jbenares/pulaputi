<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterMayorController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\TransactionHistoryController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::resource('registermayor', RegisterMayorController::class);
Route::post('store_mayor', [RegisterMayorController::class, 'store_mayor'])->name('store_mayor'); 
Route::get('createphakbet', [RegisterMayorController::class, 'createphakbet'])->name('createphakbet');
Route::get('phakbetlist', [RegisterMayorController::class, 'phakbetlist'])->name('phakbetlist');


Route::get('getMayor/{id}', function ($usertype) {
    $id = auth()->user()->id;
    $mayor = App\Models\User::where('king_id',$id)
                            ->where('usertype', 'Mayor')->get();
    return response()->json($mayor);
});

Route::resource('events', EventsController::class);
Route::get('finishedevents', [EventsController::class, 'finishedevents'])->name('finishedevents');

Route::resource('transactionhistory', TransactionHistoryController::class);

Route::get('destroy', [ProfileController::class, 'destroy'])->name('destroy');
Route::get('/mayor/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified']);


Route::get('/login_phakbet', [UsersController::class, 'index'])->name('login_phakbet');
Route::post('login_process', [UsersController::class, 'login_process'])->name('login_process'); 
Route::get('dashboard_phakbet', [UsersController::class, 'dashboard_phakbet'])->name('dashboard_phakbet'); 
require __DIR__.'/auth.php';
