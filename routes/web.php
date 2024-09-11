<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarifaController;

// Ruta para mostrar el formulario de selección de tarifas
Route::get('/tarifas', [TarifaController::class, 'showForm'])->name('mostrar.formulario');

// Ruta para procesar el cálculo de la tarifa
Route::post('/calcular-tarifa', [TarifaController::class, 'calcular'])->name('calcular.tarifa');

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});
