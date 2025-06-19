<?php

namespace App\Controller\Admin;

use App\Entity\Partner;
use App\Entity\TombolaPrize;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TombolaPrizeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TombolaPrize::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('description')
                ->setLabel('Description'),
            NumberField::new('value', 'Valeur €')
                ->setNumDecimals(0),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new('image')
                ->setBasePath('/uploads/prize')
                ->onlyOnIndex(),

        ];
    }

}
