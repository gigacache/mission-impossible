<?php

namespace Mission\Impossible\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Mission\Impossible\Service\Parser\Parser;
use Mission\Impossible\Service\Sorter\Sorter;

class GetMissionsByCommand extends Mission
{
    public function __construct(Parser $parser, Sorter $sorter)
    {
        parent::__construct($parser,$sorter);
    }

    protected function configure()
    {
        $this->setName('get:missions:by:command')
            ->setDescription('get missions by command')
            ->addArgument('commandInput', InputArgument::REQUIRED, 'enter the command name')
            ->addArgument('environment', InputArgument::OPTIONAL, 'enter the environment')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                $this->outputInterface = $output;
                $this->environment = $input->getArgument('environment');
                $this->checkEnvironment();
                $this->missionCollection = $this->parser->read($this->environment);
                $this->sorter->sortMissionCollection('command', $input->getArgument('commandInput'));
                $this->printMissions();
                return Command::SUCCESS;
            });
    }
}