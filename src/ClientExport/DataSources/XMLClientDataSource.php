<?php

namespace App\ClientExport\DataSources;

use App\ClientExport\Entity\Client;
use App\ClientExport\Exception\InvalidSourceFormatClientException;

final class XMLClientDataSource implements  ClientDataSourceInterface
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

    public function extract(): array
    {
        $xml = simplexml_load_file($this->projectDir . self::PUBLIC_PATH . 'data.xml');

        foreach ($xml->reading as $clientLine) {
            try {
                $this->clients[] = Client::fromXml($clientLine);
            } catch (InvalidSourceFormatClientException $e) {
                continue;
            }
        }

        return $this->clients;
    }
}