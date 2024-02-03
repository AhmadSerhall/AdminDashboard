<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;

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


