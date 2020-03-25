<?php

namespace App\ClientExport\DataSources\Client;

use GuzzleHttp\Client;

class HttpClient extends Client
{

    public function __construct(string $host)
    {
        parent::__construct([
            'base_uri' => $host
        ]);
    }
}