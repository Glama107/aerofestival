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

    /**
     * Le back-office ne gere qu'une seule ligne de reglages, mais rien ne
     * garantit qu'elle porte l'id 1 : la supprimer puis la recreer lui en
     * donne un autre. On prend donc la premiere ligne existante, et null
     * quand la table est vide.
     */
    public function getCurrent(): ?FestivalSettings
    {
        return $this->findOneBy([], ['id' => 'ASC']);
    }
}
