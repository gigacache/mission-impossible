<?php

namespace Mission\Impossible\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Mission\Impossible\Service\Parser\Parser;
use Mission\Impossible\Service\Sorter\Sorter;

class NextMissions extends Mission
{
    public function __construct(Parser $parser, Sorter $sorter)
    {
        parent::__construct($parser,$sorter);
    }
    protected function configure()
    {
        $this->setName('get:missions:next')
            ->setDescription('gets next missions')
            ->addArgument('mission', InputArgument::REQUIRED, 'enter the mission name')
            ->addArgument('environment', InputArgument::OPTIONAL, 'enter the environment')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                    $this->outputInterface = $output;
                    $this->environment = $input->getArgument('environment');
                    $this->checkEnvironment();
                    $this->missionCollection = $this->parser->read($this->environment);
                    $mission = $this->missionCollection->getItems()[$input->getArgument('mission')];
                    $this->sorter->sortMissionCollection('event',  $mission->getCommand());
                    $this->printMissions();
                    return Command::SUCCESS;
            });
    }
}