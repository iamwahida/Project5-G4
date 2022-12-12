<?php

namespace App\Form;

use App\Entity\TutUnit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TutUnitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('available')
            ->add('datetime')
            ->add('fk_student')
            ->add('fk_subject')
            ->add('fk_university')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TutUnit::class,
        ]);
    }
}
