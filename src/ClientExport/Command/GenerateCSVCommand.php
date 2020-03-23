<?php
/**
 * CORDIS Frontend application
 * 2018 - Developed by Lot D for CORDIS.
 *
 * @author Lot D - everis Barcelona
 */

namespace App\ClientExport\Command;

use App\ClientExport\ClientsExportService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;




class GenerateCSVCommand extends Command
{
    /* @var ClientsExportService */
    private $clientsExportService;

    protected static $defaultName = 'app:generate-csv';


    public function __construct(ClientsExportService $clientsExportService)
    {
        $this->clientsExportService = $clientsExportService;
        parent::__construct(self::$defaultName);
    }

    protected function configure()
    {
        $this->setDescription('Creates a csv file.')
            ->setHelp('This command allows you to generate a csv file');
    }

    // ...
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Generating CSV ...');
        $this->clientsExportService->export();
        $output->writeln('CSV generated successfully');
    }
}