<?php

namespace App\Controller\Admin;

use App\Entity\FestivalSettings;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Vich\UploaderBundle\Form\Type\VichImageType;

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
            UrlField::new('volunteerLink')
                ->setLabel('Lien pour devenir bénévole'),
            DateTimeField::new('tombolaDrawingDate')
                ->setLabel('Date du tirage au sort de la tombola'),
            TextField::new('posterImageFile')
                ->setLabel('Affiche officielle')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new('posterImage')
                ->setLabel('Affiche officielle')
                ->formatValue(fn ($value, $entity) => $value ? '/uploads/poster/' . $value : '/images/affiche2.JPG')
                ->onlyOnIndex(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Réglages généraux')
            ->setEntityLabelInPlural('Réglages généraux');
    }
}
