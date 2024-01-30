<?php

namespace Mission\Impossible\Command;

use Mission\Impossible\Service\Parser\Parser;
use Mission\Impossible\Service\Sorter\Sorter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetMissionsByEvent extends Mission
{
    public function __construct(Parser $parser, Sorter $sorter)
    {
        parent::__construct($parser, $sorter);
    }

    protected function configure()
    {
        $this->setName('get:missions:by:event')
            ->setDescription('get missions by command')
            ->addArgument('eventInput', InputArgument::REQUIRED, 'enter the event name')
            ->addArgument('environment', InputArgument::OPTIONAL, 'enter the environment')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                $this->outputInterface = $output;
                $this->environment = $input->getArgument('environment');
                $this->checkEnvironment();
                $this->missionCollection = $this->parser->read($this->environment);
                $this->sorter->sortMissionCollection('event', $input->getArgument('eventInput'));
                $this->printMissions();
                return Command::SUCCESS;
            });
    }
}
