<?php

namespace App\Infrastructure\Command;

use App\Application\Create\CreatePlayerCommandHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePlayerCommand extends Command
{
    protected static $defaultName = 'app:create-player';

    /**
     * @var CreatePlayerCommandHandler
     */
    private $commandHandler;

    /**
     * CreatePlayerCommand constructor.
     * @param CreatePlayerCommandHandler $commandHandler
     */
    public function __construct(CreatePlayerCommandHandler $commandHandler)
    {
        $this->commandHandler = $commandHandler;
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription('Creates a new player.')
            ->setHelp('This command allows you to create a player...')
            ->addArgument('id', InputArgument::REQUIRED, 'Player id')
            ->addArgument('name', InputArgument::REQUIRED, 'Player name')
            ->addArgument('role', InputArgument::REQUIRED, 'Player role')
            ->addArgument('rate', InputArgument::REQUIRED, 'Player average rate')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->commandHandler->execute(
            new \App\Application\Create\CreatePlayerCommand(
                $input->getArgument('id'),
                $input->getArgument('name'),
                $input->getArgument('role'),
                $input->getArgument('rate'),
            )
        );

        $output->writeln('Player created');

        return 1;
    }
}
