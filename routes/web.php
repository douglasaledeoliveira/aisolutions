<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentImportController;

Route::redirect('/', '/import');
Route::get('/import', [DocumentImportController::class, 'importView'])->name('document.import.view');
Route::post('/import', [DocumentImportController::class, 'import'])->name('document.import');
Route::get('/process-queue', [DocumentImportController::class, 'processQueueView'])->name('process.queue.view');
Route::post('/process-queue', [DocumentImportController::class, 'processQueue'])->name('process.queue');

