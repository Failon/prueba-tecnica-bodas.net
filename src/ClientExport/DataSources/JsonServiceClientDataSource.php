<?php

namespace App\ClientExport\DataSources;

use App\ClientExport\DataSources\Client\HttpClient;
use App\ClientExport\Entity\Client;


final class JsonServiceClientDataSource implements ClientDataSourceInterface
{

    private const CLIENTS_URI = '/users';

    /**
     * @var Client[]
     */
    private $clients = [];

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function extract(): array
    {
        $response = $this->httpClient->request('GET', self::CLIENTS_URI);
        $clients = json_decode($response->getBody(), true);

        foreach ($clients as $client) {
            $this->clients[] = new Client(
              $client['name'],
              $client['email'],
              $client['phone'],
              $client['company']['name']
            );
        }

        return $this->clients;
    }
}