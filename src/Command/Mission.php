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

    public function __construct(Parser $parser, Sorter $sorter)
    {
        $this->parser = $parser;
        $this->sorter = $sorter;
        parent::__construct();
    }

    public function printMissions(MissionCollection $missionCollection, OutputInterface $output)
    {
        $missions = $missionCollection->getItems();
        if (!count($missions) === 0) {
            foreach ($missionCollection->getItems() as $mission) {
                $output->writeln($mission->getName());
            }
        }
        $output->writeln('No missions found');
    }

    public function print(OutputInterface $output, $data)
    {
        $output->writeln($data);
    }

    public function sortEnvironment(mixed $environment): string
    {
        switch ($environment) {
            case ('staging'):
                return 'staging';
            case ('production'):
                return 'production';
            default:
                return 'all';
        }
    }

}