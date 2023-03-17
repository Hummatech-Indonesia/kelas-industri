<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubMaterialController;
use App\Http\Controllers\TeacherController;
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
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('dashboard.admin.layouts.app');
    });
    Route::resources([
        'schoolYears' => SchoolYearController::class,
        'generations' => GenerationController::class,
        'schools' => SchoolController::class,
        'materials' => MaterialController::class,
        'submaterials' => SubMaterialController::class,
        'assignments' => AssignmentController::class,
        'mentors' => MentorController::class,
    ]);

    Route::name('materials.')->prefix('materials')->group(function () {
        Route::get('/{material}/create', [SubMaterialController::class, 'create'])->name('createSubmaterial');
        Route::get('/{material}/{subMaterial}', [SubMaterialController::class, 'edit'])->name('editSubmaterial');
    });
    Route::name('submaterials.')->prefix('submaterials')->group(function () {
        Route::get('/assignments/{submaterial}/create', [AssignmentController::class, 'create'])->name('createAssignment');
        Route::get('/{submaterial}/view/{role}', [SubMaterialController::class, 'viewMaterial'])->name('viewMaterial');
    });

    Route::get('/leaderboards', function () {
        return view('dashboard.admin.pages.leaderboard.index');
    })->name('leaderboards');
});
//end admin

//schools
Route::middleware(['auth', 'role:school'])->prefix('school')->name('school.')->group(function () {
    Route::get('/', function () {
        return view('dashboard.admin.layouts.app');
    });

    Route::post('/import-students', [ClassroomController::class, 'importStudents'])->name('importStudents');
    Route::resources([
        'classrooms' => ClassroomController::class,
        'students' => StudentController::class,
        'teachers' => TeacherController::class,
    ]);

});
//end schools

//student
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', function () {
        return view('dashboard.user.pages.material.index');
    });
    Route::get('/materials', function () {
        return view('dashboard.user.pages.material.index');
    })->name('materials');
    Route::get('/sub-material', function () {
        return view('dashboard.user.pages.material.submaterial');
    })->name('submaterial');
    Route::get('/sub-material/detail', function () {
        return view('dashboard.user.pages.material.detail');
    })->name('submaterial-detail');
    Route::get('/challenges', function () {
        return view('dashboard.user.pages.challenge.index');
    })->name('challenges');
    Route::get('/leaderboards', function () {
        return view('dashboard.user.pages.leaderboard.index');
    })->name('leaderboards');
});
//end student

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
