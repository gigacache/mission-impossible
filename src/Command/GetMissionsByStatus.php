<?php

namespace Mission\Impossible\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetMissionsByStatus extends Mission
{
    protected function configure()
    {
        $this->setName('get:missions:enabled')
            ->setDescription('get missions by command')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                $currentMissions = $this->parser->read('all');
                $sortedMissions = $this->sorter->search($currentMissions, 'status', 'ENABLED');
                $this->print($output, 'Missions Enabled: ' . count($sortedMissions->getItems()));
                $this->printMissions($sortedMissions, $output);
                return Command::SUCCESS;
            });
    }
}