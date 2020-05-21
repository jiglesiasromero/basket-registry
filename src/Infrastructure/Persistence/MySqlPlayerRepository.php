<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Entity\Player;
use App\Domain\PlayerRepository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class MySqlPlayerRepository implements PlayerRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Player $player): void
    {
        $this->entityManager->persist($player);
        $this->entityManager->flush();
    }

    public function findById(int $id): ?Player
    {
        return $this->entityManager->getRepository(Player::class)->findOneBy(['id' => $id]);
    }

    public function findAll(): ?array
    {
        return $this->entityManager->getRepository(Player::class)->findAll();
    }

    public function remove(Player $player): void
    {
        $this->entityManager->remove($player);
        $this->entityManager->flush();
    }

    public function findAllByCriteria(?string $criteria, ?string $orderBy): ?array
    {
        $sql = 'SELECT p FROM App\Domain\Entity\Player p';
        if($criteria && $orderBy){
            $sql = $sql . ' ORDER BY p.'.$criteria.' '.$orderBy;
        }

        return $this->entityManager->createQuery($sql)->getArrayResult();

        //return $this->entityManager->getRepository(Player::class)->findAll();

        //$qb = $this->entityManager->createQueryBuilder();

//        $qb->from('basket-registry:player', 'p');
//
//        if(null !== $criteria){
//            $qb->orderBy($criteria, $orderBy);
//        }

//        $qb->add('select', 'p')
//            ->add('from', 'player p');
//
//        if(null !== $criteria){
//            $qb->add('orderBy', 'p'.$criteria.' '.$orderBy);
//        }
//
//        return $qb->getQuery()->getArrayResult();
    }
}
