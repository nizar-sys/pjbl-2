<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\StudentFormController;
use App\Http\Controllers\StudentTableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentangController;
use App\Http\Controllers\PendidikController;
use App\Http\Controllers\Pendidik2Controller;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function () {
    Route::delete('/', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::resources([
            '/regions' => RegionController::class,
            '/grades' => GradeController::class,
            '/input-table' => StudentTableController::class,
            '/activities' => ActivityController::class,
            '/categories' => CategoryController::class,
        ]);

        Route::resource('/input-form', StudentFormController::class)->parameters([
            'input_form' => 'student'
        ]);
        Route::resource('pendidik', PendidikController::class);
        // Route::resource('centang', CentangController::class);
        Route::get('centang', [CentangController::class, 'index'])->name('centang.index');
        Route::post('centang/store', [CentangController::class, 'store']);
        Route::resource('pendidik2', Pendidik2Controller::class);
    });
    
});

