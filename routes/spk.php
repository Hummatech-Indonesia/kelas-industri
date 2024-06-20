<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Spk\BatchController;
use App\Http\Controllers\Spk\CriteriaController;
use App\Http\Controllers\Spk\BatchResultController;
use App\Http\Controllers\Api\GenerateExcelController;
use App\Http\Controllers\Spk\AlternativeCriteriaController;

Route::middleware('auth')->prefix('admin/spk')->name('admin.spk.')->group(function(){
    Route::get('',[BatchController::class,'dashboard'])->name('index');
    Route::get('statistic/{batch}',[BatchResultController::class,'statistic'])->name('statistic');
    Route::get('student-development/{alternative}',[BatchResultController::class,'development'])->name('development');
    Route::resources([
        'criteria' => CriteriaController::class,
        'batch' => BatchController::class
    ]);

    Route::get('calculation/{batch}',[BatchController::class,'createForm'])->name('calculation.form');
    Route::get('batch-export-excel/{batch}', [GenerateExcelController::class, 'export'])->name('batch.export-excel');
    Route::post('batch-import-excel/{batch}', [GenerateExcelController::class, 'import'])->name('batch.import-excel');
    Route::resource('batch-results', BatchResultController::class)->only('show', 'update');
    Route::get('retrieve-dataset/{batch}', [AlternativeCriteriaController::class, 'retrieveDataset'])->name('retrieve-dataset');
    Route::post('update-dataset', [AlternativeCriteriaController::class, 'updateDataset'])->name('update-dataset');
});

