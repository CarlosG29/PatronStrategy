<?php

namespace App\Strategies;

interface TarifaStrategy
{
    public function calcularTarifa(float $distancia, float $tiempo): float;
}
