<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CarsController;

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

Route::get('garage', [Controller::class, 'garage'])->name('garage');
Route::get('plans', [Controller::class, 'plans'])->name('plans');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'check.plan'])->name('dashboard');

Route::middleware(['auth', 'check.plan'])->group(function() {
    Route::get('user/plans', [Controller::class, 'userPlans'])->name('userPlans');
    Route::post('user/plans', [Controller::class, 'saveUserPlans'])->name('userPlans.save');

    Route::get('user/terms', [Controller::class, 'userTerms'])->name('userTerms');
    Route::post('user/terms', [Controller::class, 'saveUserTerms'])->name('userTerms.save');

    Route::get('payment', [Controller::class, 'payment'])->name('payment');
    Route::post('payment', [Controller::class, 'savePayment'])->name('payment.save');

    Route::get('analysis', [Controller::class, 'analysis'])->name('analysis');
    Route::post('analysis', [Controller::class, 'saveAnalysis'])->name('analysis.save');
    Route::get('pending/analysis', [Controller::class, 'pendingAnalysis'])->name('pendingAnalysis');

    Route::get('car', [CarsController::class, 'create'])->name('car.create');
    Route::post('car', [CarsController::class, 'save'])->name('car.save');
    Route::delete('car/{car}', [CarsController::class, 'delete'])->name('car.delete');
    Route::get('cars', [CarsController::class, 'index'])->name('cars.index');
});

require __DIR__.'/auth.php';
