<?php

namespace App\ClientExport\Strategy;

use App\ClientExport\Entity\Client;

interface ExportStrategyInterface
{
    /**
     * @param array|Client[] $clients
     */
    public function export(array $clients): void;
}