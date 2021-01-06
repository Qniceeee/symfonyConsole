<?php
namespace console\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class FirstCommands extends Command
{
    protected static $defaultName = 'calculate';

    protected function configure()
    {
      $this->setName('calculate')
          ->setDescription('hello boss')
          ->addArgument(
              'name',
              InputArgument::OPTIONAL,
              'Who do you want to greet?'
          );

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        if ($name) {
            $text = 'Hello '.$name;
        } else {
            $text = 'Hello';
        }
        strtoupper($text);
        $output->writeln($text);
        return Command::SUCCESS;
    }
}