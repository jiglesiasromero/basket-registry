<?php


namespace App\Infrastructure\Command;


use App\Application\Create\CreatePlayerCommandHandler;
use App\Application\Query\ViewPlayersQuery;
use App\Application\Query\ViewPlayersQueryHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FindPlayersByCriteriaCommand extends Command
{
    protected static $defaultName = 'app:find-players';

    /**
     * @var ViewPlayersQueryHandler
     */
    private $queryHandler;

    /**
     * CreatePlayerCommand constructor.
     * @param ViewPlayersQueryHandler $queryHandler
     */
    public function __construct(ViewPlayersQueryHandler $queryHandler)
    {
        $this->queryHandler = $queryHandler;
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription('Find players')
            ->setHelp('This command allows you to create a player...')
            ->addArgument('criteria', InputArgument::OPTIONAL, 'Criteria')
            ->addArgument('orderBy', InputArgument::OPTIONAL, 'Order by')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $players = $this->queryHandler->handleQuery(
            new ViewPlayersQuery(
                $input->getArgument('criteria'),
                $input->getArgument('orderBy')
            )
        );

        $output->writeln(json_encode($players));

        return 1;
    }
}