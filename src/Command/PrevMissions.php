<?php

namespace Mission\Impossible\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class PrevMissions extends Mission
{
    protected function configure()
    {
        $this->setName('get:missions:prev')
            ->setDescription('gets previous missions')
            ->addArgument('mission', InputArgument::REQUIRED, 'enter the mission name')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                $currentMissions = $this->parser->read('all');
                $mission = $currentMissions->getItems()[$input->getArgument('mission')];
                $sortedMissions = $this->sorter->search($currentMissions , 'command',  $mission->getEvent());
                $this->printMissions($sortedMissions,$output);
                return Command::SUCCESS;
            });
    }
}