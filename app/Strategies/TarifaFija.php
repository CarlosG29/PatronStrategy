<?php

namespace App\Strategies;

class TarifaFija implements TarifaStrategy
{
    public function calcularTarifa(float $distancia, float $tiempo): float
    {
        return 50; // Tarifa fija de $50
    }
}
