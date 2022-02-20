<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Suivi\Http\Controllers\SeanceController;

Route::prefix('suivi')->group(function() {
    Route::get('/dashboard', 'SuiviController@index')->name('back')->middleware(['auth']);
    Route::get('/dashboard/event', [SeanceController::class, 'index'])->name('event.index');
    Route::get('/dashboard/event/archives', [SeanceController::class, 'archive'])->name('event.archive');
    Route::get('/dashboard/event/{id}', [SeanceController::class, 'index_tri'])->name('event.index_tri');
    Route::get('/dashboard/event/archives/{id}', [SeanceController::class, 'archive_tri'])->name('event.archive_tri');

    //archiver une séance ou remettre visible
    Route::put('/dashboard/event/fin/{id}', [SeanceController::class, 'finSeance'])->name('event.update');
    //cloturer une séance
    Route::put('/dashboard/seance/cloture/{id}', [SeanceController::class, 'cloture'])->name('seance.cloture');
    //crud séance
    Route::get('/dashboard/create/event', [SeanceController::class, 'create'])->name('event.create');
    Route::get('/dashboard/create/event/type', [SeanceController::class, 'createSecondStep'])->name('event.secondStep');
    Route::post('/dashboard/store/event', [SeanceController::class, 'store'])->name('event.store');
    Route::get('/dashboard/event/create/seance/{id}', [SeanceController::class, 'createSeance'])->name('seance.create');
    Route::post('/dashboard/store/seance', [SeanceController::class, 'storeSeance'])->name('seance.store');
    Route::get('/dashboard/edit/seance/{id}', [SeanceController::class, 'editSeance'])->name('seance.edit');
    Route::put('/dashboard/update/seance/{id}', [SeanceController::class, 'updateSeance'])->name('seance.update');
    Route::delete('/dashboard/destroy/seance/{id}', [SeanceController::class, 'destroySeance'])->name('seance.destroy');
    Route::get('/dahsboard/event/{id}/etudiants/', [SeanceController::class, 'etudiants'])->name('event.etudiants');
    //gérer les candidats
});
