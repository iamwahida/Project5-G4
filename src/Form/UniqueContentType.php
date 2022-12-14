<?php

namespace App\Form;

use App\Entity\UniqueContent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UniqueContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name' , TextType::class, [
                'attr' => ['class' => 'form-control border border-dark', 'style' => 'margin-bottom:15px'],
                ],
               )
            ->add('last_name', TextType::class, [
                'attr' => ['class' => 'form-control border border-dark', 'style' => 'margin-bottom:15px'],
                ],)
            ->add('description', TextType::class, [
                'attr' => ['class' => 'form-control border border-dark', 'style' => 'margin-bottom:15px'],
                ],)
            ->add('tut_pic', TextType::class, [
                'attr' => ['class' => 'form-control border border-dark', 'style' => 'margin-bottom:15px'],
                ],)
            ->add('bg_pic', TextType::class, [
                'attr' => ['class' => 'form-control border border-dark', 'style' => 'margin-bottom:15px'],
                ],)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UniqueContent::class,
        ]);
    }
}
