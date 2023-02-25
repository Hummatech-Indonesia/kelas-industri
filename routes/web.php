<?php

use App\Http\Controllers\GenerationController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolYearController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['login' => true, 'register' => false]);

//admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', function() {
        return view('dashboard.admin.layouts.app');
    });
    Route::resources([
        'schoolYears' => SchoolYearController::class,
        'generations' => GenerationController::class,
        'schools'     => SchoolController::class,
        'materials'   => MaterialController::class
    ]);
//    Route::get('/schools', function() {
//        return view('dashboard.admin.pages.school.index');
//    })->name('schools');
//    Route::get('/schools/create', function() {
//        return view('dashboard.admin.pages.school.create');
//    })->name('create-school');
//    Route::get('/schools/detail', function() {
//        return view('dashboard.admin.pages.school.detail');
//    })->name('detail-school');
//    Route::get('/materials', function() {
//        return view('dashboard.admin.pages.material.index');
//    })->name('materials');
//    Route::get('/materials/sub-material', function() {
//        return view('dashboard.admin.pages.material.submaterial');
//    })->name('submaterial');
//    Route::get('/materials/sub-material/detail', function() {
//        return view('dashboard.admin.pages.material.detail');
//    })->name('detail-submaterial');
    Route::get('/leaderboards', function() {
        return view('dashboard.admin.pages.leaderboard.index');
    })->name('leaderboards');
});
//end admin

//student
Route::prefix('student')->name('student.')->group(function() {
    Route::get('/', function() {
        return view('dashboard.user.pages.material.index');
    });
    Route::get('/materials', function() {
        return view('dashboard.user.pages.material.index');
    })->name('materials');
    Route::get('/sub-material', function() {
        return view('dashboard.user.pages.material.submaterial');
    })->name('submaterial');
    Route::get('/sub-material/detail', function() {
        return view('dashboard.user.pages.material.detail');
    })->name('submaterial-detail');
    Route::get('/challenges', function() {
        return view('dashboard.user.pages.challenge.index');
    })->name('challenges');
    Route::get('/leaderboards', function() {
        return view('dashboard.user.pages.leaderboard.index');
    })->name('leaderboards');
});
//end student

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
