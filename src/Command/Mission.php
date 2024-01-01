<?php

namespace Mission\Impossible\Command;

use Mission\Impossible\Model\MissionCollection;
use Symfony\Component\Console\Command\Command;
use Mission\Impossible\Service\Parser\Parser;
use Symfony\Component\Console\Output\OutputInterface;
use Mission\Impossible\Service\Sorter\Sorter;

class Mission extends Command
{
    protected Parser $parser;
    protected Sorter $sorter;

    public function __construct()
    {
        $this->parser = Parser::create();
        $this->sorter = Sorter::create();
        parent::__construct();
    }

    public function printMissions(MissionCollection $missionCollection, OutputInterface $output)
    {
        foreach ($missionCollection->getItems() as $mission) {
            $output->writeln($mission->getName());
        }
    }
}