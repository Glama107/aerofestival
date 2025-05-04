<?php

namespace App\Controller\Admin;

use App\Entity\Partner;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PartnerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partner::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            UrlField::new('link')
                ->setLabel('Link')
                ->setRequired(false),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new('image')
                ->setBasePath('/uploads/partners')
                ->onlyOnIndex(),
        ];
    }

}
