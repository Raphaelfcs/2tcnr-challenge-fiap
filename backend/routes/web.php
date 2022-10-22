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
    $cars = \App\Models\Car::whereStatus(1)->get();

    return view('welcome')
        ->with('cars', $cars);
});

Route::get('garage', [Controller::class, 'garage'])->name('garage');
Route::get('plans', [Controller::class, 'plans'])->name('plans');
Route::get('car/evaluation', [Controller::class, 'carEvaluation'])->name('carEvaluation');
Route::get('car/evaluation/finished', [Controller::class, 'carEvaluationFinished'])->name('carEvaluationFinished');
Route::get('car/{car}', [Controller::class, 'showCar'])->name('showCar');
Route::get('car/{car}/info', [Controller::class, 'showCarInfo'])->name('showCarInfo');
Route::get('car/{car}/action', [Controller::class, 'actionCar'])->name('actionCar');
Route::post('car/{car}/action', [Controller::class, 'actionCarSave'])->name('actionCarSave');
Route::get('car/password/generator', [Controller::class, 'passwordGenerator'])->name('passwordGenerator');
Route::get('about', [Controller::class, 'about'])->name('about');

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
    Route::get('reproved/analysis', [Controller::class, 'reprovedAnalysis'])->name('reprovedAnalysis');

    Route::get('report', [Controller::class, 'report'])->name('report');
    Route::get('report/finished', [Controller::class, 'reportFinished'])->name('report.finished');

    Route::get('config', [Controller::class, 'config'])->name('config');

    Route::get('car', [CarsController::class, 'create'])->name('car.create');
    Route::post('car', [CarsController::class, 'save'])->name('car.save');
    Route::delete('car/{car}', [CarsController::class, 'delete'])->name('car.delete');
    Route::get('mycarspanel', [CarsController::class, 'index'])->name('cars.index');
});

Route::middleware(['auth', 'check.plan', 'admin'])->group(function() {
    Route::get('admin/cars', [Controller::class, 'adminCars'])->name('adminCars');
    Route::post('admin/car/{car}/approve', [Controller::class, 'adminCarApprove'])->name('adminCarApprove');
    Route::post('admin/car/{car}/decline', [Controller::class, 'adminCarDecline'])->name('adminCarDecline');

    Route::get('admin/users', [Controller::class, 'adminUsers'])->name('adminUsers');
    Route::post('admin/user/{user}/approve', [Controller::class, 'adminUserApprove'])->name('adminUserApprove');
    Route::post('admin/user/{user}/decline', [Controller::class, 'adminUserDecline'])->name('adminUserDecline');
});

require __DIR__.'/auth.php';
