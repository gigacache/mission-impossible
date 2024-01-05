<?php

namespace Mission\Impossible\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GetMissionsByCommand extends Mission
{
    /** finish  environment switch */
    protected function configure()
    {
        $this->setName('get:missions:by:command')
            ->setDescription('get missions by command')
            ->addArgument('commandInput', InputArgument::REQUIRED, 'enter the command name')
            ->addArgument('environment', InputArgument::OPTIONAL, 'enter the command name')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                $environment = $this->sortEnvironment($input->getArgument('environment'));
                $currentMissions = $this->parser->read($environment);
                $sortedMissions = $this->sorter->search($currentMissions, 'command', $input->getArgument('commandInput'));
                $this->printMissions($sortedMissions, $output);
                return Command::SUCCESS;
            });
    }
}