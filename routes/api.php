<?php

use App\Models\Material;
use App\Models\Generation;
use App\Models\MaterialExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Journal\JournalController;
use App\Http\Controllers\Api\Journal\TeacherController;
use App\Http\Controllers\Api\Student\StudentController;
use App\Models\SubMaterialExam;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::resources([
        'journals' => JournalController::class,
        'teacher' => TeacherController::class,
    ]);
    Route::get('/student/get-student-by-teacher/{teacher}', [StudentController::class, 'getStudentByTeacher']);
});
Route::get('generations', function () {
    return Generation::all();
});
Route::get('materialExams', function () {
    return MaterialExam::all();
});
Route::get('subMaterialEXam', function () {
    return SubMaterialExam::all();
});
Route::get('delete-submaterial', function () {
    $submaterial = SubMaterialExam::where('id', "aae143ee-5c0c-38a6-b691-24d2b323eeb7")->first();
    dd($submaterial);
});
Route::get('materials', function () {
    return Material::with('materialExam')->get();
});
