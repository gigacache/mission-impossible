<?php

namespace Mission\Impossible\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Mission\Impossible\Service\Parser\Parser;
use Mission\Impossible\Service\Sorter\Sorter;

class GetMissionsByEvent extends Mission
{
    public function __construct(Parser $parser, Sorter $sorter)
    {
        parent::__construct($parser,$sorter);
    }

    protected function configure()
    {
        $this->setName('get:missions:by:event')
            ->setDescription('get missions by command')
            ->addArgument('eventInput', InputArgument::REQUIRED, 'enter the event name')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                $currentMissions = $this->parser->read('all');
                $sortedMissions = $this->sorter->search('event', $input->getArgument('eventInput'));
                $this->printMissions($sortedMissions, $output);
                return Command::SUCCESS;
            });
    }
}