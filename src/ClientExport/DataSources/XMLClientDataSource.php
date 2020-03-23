<?php

namespace App\ClientExport\DataSources;

use App\ClientExport\Entity\Client;

class XMLClientDataSource implements  ClientDataSourceInterface
{
    const PUBLIC_PATH = '/public/';

    /**
     * @var Client[]
     */
    private $clients = [];

    /**
     * @var string
     */
    private $projectDir;

    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }

    /**
     * @return array
     */
    public function extract(): array
    {
        $xml = simplexml_load_file($this->projectDir . self::PUBLIC_PATH . 'data.xml');

        foreach ($xml->reading as $clientLine) {
            $this->clients[] = new Client(
                $clientLine->attributes()['name'],
                $clientLine,
                $clientLine->attributes()['phone'],
                $clientLine->attributes()['company']
            );
        }

        return $this->clients;
    }
}