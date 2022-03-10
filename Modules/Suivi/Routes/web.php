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
use Modules\Suivi\Http\Controllers\CandidatController;
use Modules\Suivi\Http\Controllers\CommentaireController;
use Modules\Suivi\Http\Controllers\SeanceController;
use Modules\Suivi\Http\Controllers\SuiviController;

Route::prefix('suivi')->group(function() {
    Route::middleware(['auth'])->group(function() {

        Route::get('/admin', [SuiviController::class,'index'])->name('back');
        Route::get('/admin/seance', [SeanceController::class, 'index'])->name('seance.index');
        Route::get('/admin/seance/archives', [SeanceController::class, 'archive'])->name('seance.archive');
        Route::get('/admin/seance/{id}', [SeanceController::class, 'index_tri'])->name('seance.index_tri');
        Route::get('/admin/seance/archives/{id}', [SeanceController::class, 'archive_tri'])->name('seance.archive_tri');
    
        //archiver une séance ou remettre visible
        Route::put('/admin/seance/fin/{id}', [SeanceController::class, 'finSeance'])->name('seance.update');
        //cloturer une séance
        Route::put('/admin/seance/cloture/{id}', [SeanceController::class, 'cloture'])->name('seance.cloture');
        //crud séance
        Route::get('/admin/create/seance', [SeanceController::class, 'create'])->name('seance.create');
        Route::get('/admin/create/seance/type', [SeanceController::class, 'createSecondStep'])->name('seance.secondStep');
        Route::post('/admin/store/seance', [SeanceController::class, 'store'])->name('seance.store');
        Route::post('/admin/store/seance/nouveau', [SeanceController::class, 'storeSeance'])->name('seance.storeSeance');
        Route::get('/admin/seance/create/seance/{id}', [SeanceController::class, 'createSeance'])->name('seance.createSeance');
        Route::get('/admin/edit/seance/{id}', [SeanceController::class, 'editSeance'])->name('seance.edit');
        Route::put('/admin/update/seance/{id}', [SeanceController::class, 'updateSeance'])->name('seance.update');
        Route::delete('/admin/destroy/seance/{id}', [SeanceController::class, 'destroySeance'])->name('seance.destroy');
        Route::delete('/admin/destroy/evenement/{id}', [SeanceController::class, 'destroy_evenementtype'])->name('evenementtype.destroy');
        Route::get('/admin/seance/{id}/etudiants/', [SeanceController::class, 'etudiants'])->name('seance.etudiants');
        //gérer les candidats
        Route::get('/admin/etudiant/all', [CandidatController::class, 'index'])->name('etudiant.index');
        Route::get('/admin/etudiant/candidat', [CandidatController::class, 'index_candidat'])->name('etudiant.index_candidat');
        Route::get('/admin/etudiant/etudiant', [CandidatController::class, 'index_etudiant'])->name('etudiant.index_etudiant');
        Route::get('/admin/etudiant/edit/{id}', [CandidatController::class,'edit'])->name('etudiant.edit');
        Route::put('/admin/etudiant/update/{id}', [CandidatController::class,'update'])->name('etudiant.update');
        Route::get('/admin/etudiant/{id}/show', [CandidatController::class, 'show'])->name('etudiant.show');
        Route::get('/admin/etudiant/recherche', [CandidatController::class, 'search'])->name('search');
        Route::put('/admin/etudiant/admis/{id}', [CandidatController::class, 'admis'])->name('etudiant.admis');
        Route::put('/admin/seance/presence/{id}/{seance}', [CandidatController::class, 'presence'])->name('seance.presence');

        //commentaire
        Route::post('/admin/etudiant/store/commentaire/{candidat}', [CommentaireController::class, 'store'])->name('commentaire.store'); 
        Route::delete('/admin/etudiant/delete/commentaire/{commentaire}', [CommentaireController::class, 'destroy'])->name('commentaire.destroy');

    });

});
