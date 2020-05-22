<?php

declare(strict_types=1);

namespace App\Tests\Application\Create;

use App\Application\Create\CreatePlayerCommand;
use App\Application\Create\CreatePlayerCommandHandler;
use App\Domain\PlayerRepository;
use App\Tests\Infrastructure\Player\Specification\UniqueIdSatisfiedSpecificationStub;
use App\Tests\Infrastructure\Player\Specification\ValidAvegareRateSatisfiedSpecificationStub;
use App\Tests\Infrastructure\Player\Specification\ValidAvegareRateUnsatisfiedSpecificationStub;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CreatePlayerCommandHandlerTest extends TestCase
{
    /**
     * @var PlayerRepository|MockObject
     */
    private $playerRepository;


    public function setUp(){
        $this->playerRepository = $this->getMockBuilder(PlayerRepository::class)->getMock();
    }

    public function testIfPlayerCanBeAdded(){

        $commandHandler = new CreatePlayerCommandHandler(
            $this->playerRepository,
            new UniqueIdSatisfiedSpecificationStub(),
            new ValidAvegareRateSatisfiedSpecificationStub()
        );
        $commandHandler->execute(new CreatePlayerCommand(1, 'name-test', 'role', 50));

    }

    public function testIfPlayerCanNotBeAddedIfAverageRateIsNotValid(){
        $commandHandler = new CreatePlayerCommandHandler(
            $this->playerRepository,
            new UniqueIdSatisfiedSpecificationStub(),
            new ValidAvegareRateUnsatisfiedSpecificationStub()
        );
        $commandHandler->execute(new CreatePlayerCommand(1, 'name-test', 'role', 200));
    }
}