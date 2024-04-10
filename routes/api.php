<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

# API Codigos Postales
Route::prefix('mx/')->group(function () {
    Route::get('ubicacion-por-codigo-postal/{codigo_postal}', [ApiController::class, 'ubicacionPorCodigoPostal'])->name('obtener_codigos_postales_municipios');
    Route::get('codigos-postales/{paginacion?}', [ApiController::class, 'codigosPostales'])->name('codigos_postales');
    Route::get('colonia/{colonia}', [ApiController::class, 'colonia'])->name('colonia');
    Route::get('colonias/{paginacion?}', [ApiController::class, 'colonias'])->name('colonias');
    Route::get('estado/{estado}', [ApiController::class, 'estado'])->name('estado');
    Route::get('estados/{paginacion?}', [ApiController::class, 'estados'])->name('estados');
});
