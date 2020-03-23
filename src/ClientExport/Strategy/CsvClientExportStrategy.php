<?php

namespace App\ClientExport\Strategy;

use App\ClientExport\Entity\Client;

class CsvClientExportStrategy implements ExportStrategyInterface
{
    const PUBLIC_PATH = '/public/';

    const HEADERS = [
        'name',
        'email',
        'phone',
        'companyName'
    ];

    /**
     * @var string
     */
    private $projectDir;

    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }


    /**
     * @param Client[] $clients
     */
    public function export(array $clients): void
    {
        if (count($clients) > 0) {
            $fp = fopen(
                $this->projectDir .
                self::PUBLIC_PATH .
                'clients.csv',
                'w'
            );
            fputcsv($fp, self::HEADERS, ';');
            foreach ($clients as $client) {
                fputcsv($fp, $client->toArray(), ';');
            }
            fclose($fp);
        }
    }
}