<?php

namespace App\Form;

use App\Entity\Subject;
use App\Entity\University;
use App\Entity\TutUnit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class TutUnitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('available')
            ->add('datetime', DateTimeType::class, ['attr'=>['value' => 'datetime']])
            
            ->add('fk_subject', EntityType::class,
            ['class' => Subject::class,'choice_label' => 'subjectName'])
            ->add('fk_university', EntityType::class,
            ['class' => University::class,'choice_label' => 'universityName'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TutUnit::class,
        ]);
    }
}
