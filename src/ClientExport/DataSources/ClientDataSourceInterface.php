<?php

namespace App\ClientExport\DataSources;

use App\ClientExport\Entity\Client;

interface ClientDataSourceInterface
{
    /**
     * @return Client[]
     */
    public function extract(): array;
}