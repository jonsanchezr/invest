<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EstateController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [HomeController::class, 'categories'])->name('home.categories');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('home.aboutUs');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/clients/login', [HomeController::class, 'login'])->name('home.login');
Route::get('/details/{id}', [HomeController::class, 'details'])->name('home.details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/clients/dashboard', [HomeController::class, 'dashboard'])->name('home.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });

    Route::get('/login', [DashboardController::class, 'login'])->name('admin.login');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        //'verified',
    ])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/estates', [EstateController::class, 'index'])->name('admin.estates.index');
        Route::post('/estates', [EstateController::class, 'store'])->name('admin.estates.store');
        Route::get('/estates/create', [EstateController::class, 'create'])->name('admin.estates.create');
        Route::get('/estates/{id}/edit', [EstateController::class, 'edit'])->name('admin.estates.edit');
        Route::post('/estates/{id}/update', [EstateController::class, 'update'])->name('admin.estates.update');
        Route::get('/estates/{id}/delete', [EstateController::class, 'destroy'])->name('admin.estates.destroy');

    });
});