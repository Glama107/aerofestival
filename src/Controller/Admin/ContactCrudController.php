<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')
                ->setLabel('Nom')
                ->setRequired(true),
            TextField::new('email')
                ->setLabel('Email')
                ->setRequired(true),
            TextField::new('subject')
                ->setLabel('Sujet')
                ->setRequired(true),
            TextEditorField::new('message')
                ->setLabel('Message')
                ->setRequired(true)
                ->onlyOnForms(),

        ];
    }

}
