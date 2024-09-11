<?php

namespace App\Strategies;

class TarifaPorTiempo implements TarifaStrategy
{
    public function calcularTarifa(float $distancia, float $tiempo): float
    {
        return $tiempo * 1.5; // Ejemplo: $1.5 por minuto
    }
}
