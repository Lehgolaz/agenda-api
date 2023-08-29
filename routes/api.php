<?php

use App\Http\Controllers\TipoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/tipos/', [TipoController::class, 'index'])->name('tipos.index');
Route::post('/tipos/', [TipoController::class, 'store']) ->name('tipos.store');
Route::get('/tipos/{tipo}', [TipoController::class, 'show'])->name('tipos.show');
Route::put('/tipos/{tipo}', [TipoController::class, 'update'])->name('tipos.update');
Route::delete('/tipos/{tipo}', [TipoController::class, 'destroy']) ->name('tipos.destroy');


Route::get('/tarefs/', [TarefController::class, 'index'])->name('tarefs.index');
Route::post('/tarefs/', [TarefController::class, 'store']) ->name('tarefs.store');
Route::get('/tarefs/{tipo}', [TarefController::class, 'show'])->name('tarefs.show');
Route::put('/tarefs/{tipo}', [TarefController::class, 'update'])->name('tarefs.update');
Route::delete('/tarefs/{tipo}', [TarefController::class, 'destroy']) ->name('tarefs.destroy');


// Route::resource('/tipos',TipoController::class);
