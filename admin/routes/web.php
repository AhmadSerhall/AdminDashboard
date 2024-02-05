<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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
    return view('admin.dashboard');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('/fetch-chart-data', [ChartController::class, 'fetchData']);

Route::get('/fetch-second-chart-data', [ChartController::class, 'fetchSecondChartData']);

// Route::get('/fetch-third-chart-data', [ChartController::class, 'fetchThirdChartData']);

// Route::get('/fetch-content/{section}', [ContentController::class, 'fetch']);
// Route::get('/content/{section}', [ContentController::class, 'show']);
Route::get('/get-user-content', [ContentController::class, 'getUserContent']);
Route::get('/get-order-content', [ContentController::class, 'getOrderContent']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'checkUserRole:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
});








Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
