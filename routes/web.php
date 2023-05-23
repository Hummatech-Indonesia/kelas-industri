<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsentController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SubMaterialController;
use App\Http\Controllers\ZoomScheduleController;
use App\Http\Controllers\UserClassroomController;
use App\Http\Controllers\UserAssignmentController;

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

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('index');
    Route::patch('/update-profile/{user}', [ProfileController::class, 'update'])->name('update');
});

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
        'zoomSchedules' => ZoomScheduleController::class,
    ]);

    Route::prefix('rolling-mentor')->name('rollingMentor.')->group(function () {
        Route::get('/', [MentorController::class, 'rollingMentor'])->name('index');
        Route::get('/{mentor}', [MentorController::class, 'addRollingMentor'])->name('add');
        Route::post('/get-classrooms', [MentorController::class, 'getClassroomBySchool'])->name('getClassrooms');
        Route::post('/action-rolling-mentor', [MentorController::class, 'actionRollingMentor'])->name('actionRollingMentor');
        Route::delete('/delete-rolling-mentor/{mentorClassroom}', [MentorController::class, 'deleteMentorClassroom'])->name('deleteRollingMentor');
    });

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

    Route::post('/import-students', [StudentController::class, 'importStudents'])->name('importStudents');
    Route::resources([
        'classrooms' => ClassroomController::class,
        'students' => StudentController::class,
        'teachers' => TeacherController::class,
    ]);

    Route::prefix('rolling-teacher')->name('rollingTeacher.')->group(function () {
        Route::get('/', [TeacherController::class, 'rollingTeacher'])->name('index');
        Route::get('/{teacher}', [TeacherController::class, 'addRollingTeacher'])->name('add');
        Route::post('/action-rolling-teacher', [TeacherController::class, 'actionRollingTeacher'])->name('actionRollingTeacher');
        Route::delete('/delete-rolling-teacher/{teacherClassroom}', [TeacherController::class, 'deleteTeacherClassroom'])->name('deleteRollingTeacher');
    });

    Route::prefix('rolling-student')->name('rollingStudent.')->group(function () {
        Route::get('/', [StudentController::class, 'rollingStudent'])->name('index');
        Route::post('/', [ClassroomController::class, 'addStudentClassroom'])->name('store');
    });

});
//end schools

//teacher
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::resources([
        'challenges' => ChallengeController::class,
    ]);
//    Route::get('/classrooms', [UserClassroomController::class, 'index'])->name('classrooms');
//    Route::get('/classrooms/{classroom}', [UserClassroomController::class, 'show'])->name('showClassrooms');
//    Route::get('/materials/{classroom}', [UserClassroomController::class, 'materials'])->name('materials');
//    Route::get('/showMaterial/{material}', [UserClassroomController::class, 'showMaterial'])->name('showMaterial');
//    Route::get('/showSubMaterial/{submaterial}', [UserClassroomController::class, 'showSubMaterial'])->name('showSubMaterial');
//    Route::get('/showDocument/{submaterial}/{role}', [UserClassroomController::class, 'showDocument'])->name('showDocument');
    Route::get('/{classroom}/assignment/{assignment}', [UserAssignmentController::class, 'index'])->name('showAssignment');
});
//end teacher

//mentor
Route::middleware(['auth', 'role:mentor'])->prefix('mentor')->name('mentor.')->group(function () {
    Route::resources([
        'challenges' => ChallengeController::class,
        'absent' => AttendanceController::class
    ]);
    Route::get('/showDocument/{submaterial}/{role}', [UserClassroomController::class, 'showDocument'])->name('showDocument');
});
//end mentor

//mentor, student, teacher
Route::name('common.')->group(function () {
    Route::get('/classrooms', [UserClassroomController::class, 'index'])->name('classrooms');
    Route::get('/classrooms/{classroom}', [UserClassroomController::class, 'show'])->name('showClassrooms');
    Route::get('/materials/{classroom}', [UserClassroomController::class, 'materials'])->name('materials');
    Route::get('{classroom}/showMaterial/{material}', [UserClassroomController::class, 'showMaterial'])->name('showMaterial');
    Route::get('{classroom}/showSubMaterial/{submaterial}', [UserClassroomController::class, 'showSubMaterial'])->name('showSubMaterial');
    Route::get('/showDocument/{submaterial}/{role}', [UserClassroomController::class, 'showDocument'])->name('showDocument');
});
//end mentor, student, teacher

//student
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', function () {
        return view('dashboard.user.pages.material.index');
    });
    Route::get('/classrooms', [UserClassroomController::class, 'index'])->name('classrooms');
    Route::get('/create', [UserClassroomController::class, 'create'])->name('create');
    Route::get('/classrooms/{classroom}', [UserClassroomController::class, 'show'])->name('showClassrooms');
    Route::get('/materials/{classroom}', [UserClassroomController::class, 'materials'])->name('materials');
    Route::get('/showMaterial/{material}', [UserClassroomController::class, 'showMaterial'])->name('showMaterial');
    Route::get('/showSubMaterial/{submaterial}', [UserClassroomController::class, 'showSubMaterial'])->name('showSubMaterial');
    Route::get('/showDocument/{submaterial}/{role}', [UserClassroomController::class, 'showDocument'])->name('showDocument');

    Route::get('{classroom}/submitAssignment/{submaterial}/{assignment}', [UserAssignmentController::class, 'create'])->name('submitAssignment');
    Route::post('{classroom}/storeassignment/{submaterial}', [UserAssignmentController::class, 'store'])->name('storeassignment');
    
    Route::get('submitChallenge/{challenge}', [ChallengeController::class, 'submitChallenge'])->name('submitChallenge');
    Route::post('storeassignment', [ChallengeController::class, 'storeChallenge'])->name('storeChallenge');

    Route::resources([
        'challenges' => ChallengeController::class,
    ]);

    // Route::get('/sub-material', function () {
    //     return view('dashboard.user.pages.material.submaterial');
    // })->name('submaterial');
    // Route::get('/sub-material/detail', function () {
    //     return view('dashboard.user.pages.material.detail');
    // })->name('submaterial-detail');
    // Route::get('/challenges', function () {
    //     return view('dashboard.user.pages.challenge.index');
    // })->name('challenges');
    // Route::get('/leaderboards', function () {
    //     return view('dashboard.user.pages.leaderboard.index');
    // })->name('leaderboards');
});
//end student

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
