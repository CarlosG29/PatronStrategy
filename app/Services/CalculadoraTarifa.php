<?php

namespace App\Services;

use App\Strategies\TarifaStrategy;

class CalculadoraTarifa
{
    private TarifaStrategy $tarifaStrategy;

    public function __construct(TarifaStrategy $tarifaStrategy)
    {
        $this->tarifaStrategy = $tarifaStrategy;
    }

    public function setTarifaStrategy(TarifaStrategy $tarifaStrategy): void
    {
        $this->tarifaStrategy = $tarifaStrategy;
    }

    public function calcularTarifa(float $distancia, float $tiempo): float
    {
        return $this->tarifaStrategy->calcularTarifa($distancia, $tiempo);
    }
}
