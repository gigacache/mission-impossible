<?php

namespace Mission\Impossible\Command;

use Mission\Impossible\Service\Parser\Parser;
use Mission\Impossible\Service\Sorter\Sorter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetMissionsByStatus extends Mission
{
    public function __construct(Parser $parser, Sorter $sorter)
    {
        parent::__construct($parser, $sorter);
    }
    protected function configure()
    {
        $this->setName('get:missions:enabled')
            ->setDescription('get missions by command')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                $this->outputInterface = $output;
                $this->checkEnvironment();
                $this->missionCollection = $this->parser->read($this->environment);
                $this->sorter->sortMissionCollection('status', 'ENABLED');
                $this->print('Missions Enabled: ' . count($this->missionCollection->getItems()));
                $this->printMissions();
                return Command::SUCCESS;
            });
    }
}
