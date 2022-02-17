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
use Modules\Suivi\Entities\Candidat;

Route::prefix('suivi')->group(function() {
    Route::get('/dashboard', 'SuiviController@index')->name('home')->middleware(['auth']);
    Route::get('/test', function() {
        $model = Candidat::all();
        return view('suivi::index', compact('model'));
    });
});
