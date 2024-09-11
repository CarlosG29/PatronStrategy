<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CalculadoraTarifa;
use App\Strategies\TarifaFija;
use App\Strategies\TarifaPorDistancia;
use App\Strategies\TarifaPorTiempo;

class TarifaController extends Controller
{
    // Método para mostrar el formulario
    public function showForm()
    {
        return view('tarifa');
    }

    // Método para calcular la tarifa
    public function calcular(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'strategy' => 'required|string',
            'distancia' => 'nullable|numeric|min:0',
            'tiempo' => 'nullable|numeric|min:0',
        ]);

        // Obtener los datos de la solicitud
        $strategy = $request->input('strategy');
        $distancia = $request->input('distancia', 0);
        $tiempo = $request->input('tiempo', 0);

        // Seleccionar la estrategia de cálculo
        switch ($strategy) {
            case 'fija':
                $calculadora = new CalculadoraTarifa(new TarifaFija());
                $resultado = $calculadora->calcularTarifa(0, 0);
                break;

            case 'distancia':
                $calculadora = new CalculadoraTarifa(new TarifaPorDistancia());
                $resultado = $calculadora->calcularTarifa($distancia, 0); // Solo usamos la distancia
                break;

            case 'tiempo':
                $calculadora = new CalculadoraTarifa(new TarifaPorTiempo());
                $resultado = $calculadora->calcularTarifa(0, $tiempo); // Solo usamos el tiempo
                break;

            default:
                return redirect()->back()->withErrors('Método de cálculo de tarifa no válido.');
        }

        // Devolver la vista con el resultado
        return view('tarifa', compact('resultado'));
    }
}
