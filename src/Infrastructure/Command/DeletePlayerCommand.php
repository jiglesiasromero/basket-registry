<?php


namespace App\Infrastructure\Command;


use App\Application\Delete\DeletePlayerCommandHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeletePlayerCommand extends Command
{
    protected static $defaultName = 'app:remove-player';

    /**
     * @var DeletePlayerCommandHandler
     */
    private $commandHandler;

    /**
     * DeletePlayerCommandHandler constructor.
     * @param DeletePlayerCommandHandler $commandHandler
     */
    public function __construct(DeletePlayerCommandHandler $commandHandler)
    {
        $this->commandHandler = $commandHandler;
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription('Remove player.')
            ->setHelp('This command allows you to remove a player.')
            ->addArgument('id', InputArgument::REQUIRED, 'Player id')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->commandHandler->execute(
            new \App\Application\Delete\DeletePlayerCommand(
                $input->getArgument('id')
            )
        );

        $output->writeln('Player removed');

        return 1;
    }
}
