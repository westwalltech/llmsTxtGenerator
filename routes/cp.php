<?php

use Illuminate\Support\Facades\Route;
use Ravenna\LlmsGenerator\Http\Controllers\CpController;
use Ravenna\LlmsGenerator\Http\Controllers\CollectionsController;

Route::prefix('llms-generator')
    ->name('llms-generator.')
    ->group(function () {
        Route::get('/', [CpController::class, 'index'])->name('index');
        Route::get('/collections', [CpController::class, 'collections'])->name('collections');
        Route::get('/additional-fields', [CpController::class, 'additional_fields'])->name('additional_fields');
        Route::get('/generate', [CpController::class, 'generate_page'])->name('generate_page');

        Route::post('/collections/save', [CollectionsController::class, 'save'])->name('collections.save');
        Route::post('/generate-file', [CpController::class, 'generate_file'])->name('generate_file');
    });
