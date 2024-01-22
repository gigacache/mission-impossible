<?php

namespace Mission\Impossible\Command;

use Mission\Impossible\Model\MissionCollection;
use Symfony\Component\Console\Command\Command;
use Mission\Impossible\Service\Parser\Parser;
use Symfony\Component\Console\Output\OutputInterface;
use Mission\Impossible\Service\Sorter\Sorter;

class Mission extends Command
{
    protected MissionCollection $missionCollection;
    protected OutputInterface $outputInterface;
    protected Parser $parser;
    protected Sorter $sorter;
    protected string|null $environment;

    public function __construct(Parser $parser, Sorter $sorter)
    {
        $this->parser = $parser;
        $this->sorter = $sorter;
        $this->environment = null;
        parent::__construct();
    }

    public function printMissions()
    {
        if (count($this->missionCollection->getItems()) != 0) {
            foreach ($this->missionCollection->getItems() as $mission) {
                $this->outputInterface->writeln($mission->getName());
            }
        } else {
            $this->outputInterface->writeln('No missions found');
        }
    }

    public function print($data)
    {
        $this->outputInterface->writeln($data);
    }

    public function checkEnvironment()
    {
        if (is_null($this->environment)) {
            $this->environment = 'all';
        }
    }
}