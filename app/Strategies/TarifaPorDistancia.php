<?php

namespace App\Strategies;

class TarifaPorDistancia implements TarifaStrategy
{
    public function calcularTarifa(float $distancia, float $tiempo): float
    {
        return $distancia * 2; // Ejemplo: $2 por kilómetro
    }
}
