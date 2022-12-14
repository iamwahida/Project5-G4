<?php

namespace App\Form;

use App\Entity\TutUnit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TutUnitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('available')
            ->add('datetime')
            
            ->add('fk_subject', ChoiceType::class, ['choices' => ["Maths" => "1"]])
            ->add('fk_university', ChoiceType::class, ['choices' => ["TU Wien" => "1"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TutUnit::class,
        ]);
    }
}
