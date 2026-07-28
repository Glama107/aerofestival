<?php

namespace App\Controller\Admin;

use App\Entity\FestivalSettings;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class FestivalSettingsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FestivalSettings::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('startDate')
                ->setLabel('Date de début'),
            DateTimeField::new('endDate')
                ->setLabel('Date de fin'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }
}
