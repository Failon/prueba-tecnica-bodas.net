<?php

namespace App\ClientExport\DataSources;

use GuzzleHttp\Client as GuzzleClient;
use App\ClientExport\Entity\Client;


class JsonServiceClientDataSource implements ClientDataSourceInterface
{

    const WEBSERVICE_URL = 'https://jsonplaceholder.typicode.com/users';
    /**
     * @var Client[]
     */
    private $clients = [];


    public function extract(): array
    {
        $client = new GuzzleClient();
        $response = $client->request('GET', self::WEBSERVICE_URL);
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