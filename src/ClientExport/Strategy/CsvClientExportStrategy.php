<?php

namespace App\ClientExport\Strategy;

use App\ClientExport\Entity\Client;

final class CsvClientExportStrategy implements ExportStrategyInterface
{
    private const PUBLIC_PATH = '/public/';
    private const HEADERS = [
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
        if (!empty($clients)) {
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