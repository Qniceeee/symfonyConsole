<?php

namespace console\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ConsoleCalculate extends Command
{
    protected static $defaultName = 'calculate';

    protected function configure()
    {
        $this->setName('calculate')
            ->setDescription('some roman calculate')
            ->addArgument(
                'x',
                InputArgument::REQUIRED
            )->addArgument(
                'operator',
                InputArgument::REQUIRED
            )
            ->addArgument(
                'y',
                InputArgument::REQUIRED
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $x = $input->getArgument('x');
        $y = $input->getArgument('y');
        $operator = $input->getArgument('operator');

        if ($operator == '+' | $operator == '-') {
            $arabian = ConsoleCommandHelper::convertToArabian($x, $y, $operator);
            $roman = ConsoleCommandHelper::convertToRoman($arabian);
            $output->writeln($roman . "($arabian)");

            return Command::SUCCESS;
        }

            $output->writeln('Неверная операция');

            return Command::FAILURE;

    }

}