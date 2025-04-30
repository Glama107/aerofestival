<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Scoreline;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => null,
                'attr' => ['class' => 'w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white']
            ])
            ->add('email', EmailType::class, [
                'label' => null,
                'attr' => ['class' => 'w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white']
            ])
            ->add('subject', ChoiceType::class, [
                'label' => null,
                'choices' => [
                    'Être bénévole' => 'Être bénévole',
                    'Problème technique' => 'Problème technique',
                    'Demander un partenariat' => 'Demander un partenariat',
                    'Autre' => 'Autre'
                ],
                'attr' => ['class' => 'w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white']
            ])
            ->add('message', TextareaType::class, [
                'label' => null,

                'attr' => [
                    'rows' => 5,
                    'class' => 'w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
