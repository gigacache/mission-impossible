<?php

namespace Mission\Impossible\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mission\Impossible\Service\Parser\Parser;

class GetMissions extends Command
{
    protected Parser $parser;

    public function __construct()
    {
        $this->parser = Parser::create();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('get missions')
            ->setDescription('Gets all missions for project')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                $currentMissions = $this->parser->__invoke('all');
                foreach($currentMissions->getItems() as $mission){
                    $output->writeln($mission->getName());
                }
                return Command::SUCCESS;
            });
    }

}