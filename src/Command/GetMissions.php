<?php
namespace Mission\Impossible\Command;
 
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
 
class GetMission extends Command
{
    protected function configure()
    {
        $this->setName('hello-world')
            ->setDescription('Prints Hello-World!')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addArgument('username', InputArgument::REQUIRED, 'Pass the username.')
            ->setCode(function (InputInterface $input, OutputInterface $output): int {
                $output->writeln(sprintf('Hello World!, %s', $input->getArgument('username')));
                return Command::SUCCESS;
            });
    }

}