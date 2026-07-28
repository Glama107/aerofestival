<?php

namespace App\Repository;

use App\Entity\FestivalSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FestivalSettings>
 */
class FestivalSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FestivalSettings::class);
    }

    public function getCurrent(): FestivalSettings
    {
        return $this->find(1);
    }
}
