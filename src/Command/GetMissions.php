<?php

namespace Mission\Impossible\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mission\Impossible\Command\Mission;

class GetMissions extends Mission
{
    protected function configure()
    {
        $this->setName('get:missions')
            ->setDescription('gets all missions for project')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                $currentMissions = $this->parser->read('all');
                $this->printMissions($currentMissions, $output);
                return Command::SUCCESS;
            });
    }

}