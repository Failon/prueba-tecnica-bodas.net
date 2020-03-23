<?php

namespace App\ClientExport;

use App\ClientExport\DataSources\ClientDataSourceInterface;
use App\ClientExport\Entity\Client;
use App\ClientExport\Strategy\ExportStrategyInterface;

class ClientsExportService
{
    /**
     * @var ClientDataSourceInterface[]
     */
    private $dataSources;

    /**
     * @var ExportStrategyInterface
     */
    private $exportStrategy;

    /**
     * @var Client[]
     */
    private $clients = [];

    /**
     * ClientsExportService constructor.
     * @param ClientDataSourceInterface[] $dataSources
     * @param ExportStrategyInterface $exportStrategy
     */
    public function __construct(array $dataSources, ExportStrategyInterface $exportStrategy)
    {
        $this->dataSources = $dataSources;
        $this->exportStrategy = $exportStrategy;
    }

    public function export(): void
    {
        foreach ($this->dataSources as $dataSource) {
            $this->clients = array_merge(
                $this->clients,
                $dataSource->extract()
            );
        }

        $this->exportStrategy->export($this->clients);
    }
}