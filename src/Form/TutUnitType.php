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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class TutUnitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('available', CheckboxType::class, [
                'attr' => ['style' => 'margin-bottom:15px; margin-left:15px', 'class' => 'form-check-input border border-dark p-2 mb-3', 'type' => 'checkbox']
            ])
            ->add('datetime', DateTimeType::class, ['attr'=>['value' => 'datetime','class' => 'form-control border border-dark p-2 mb-3 d-flex' ]])
            
            ->add('fk_subject', EntityType::class,
            ['class' => Subject::class,'choice_label' => 'subjectName', 'attr' => ['class' => 'form-control border border-dark p-2 mb-3'] ])
            ->add('fk_university', EntityType::class,
            ['class' => University::class,'choice_label' => 'universityName', 'attr' => ['class' => 'form-control border border-dark p-2 mb-3']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TutUnit::class,
        ]);
    }
}
