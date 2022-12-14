<?php

namespace App\Form;

use App\Entity\UniqueContent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UniqueContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
<<<<<<< HEAD
<<<<<<< HEAD
            ->add('first_name')
            ->add('last_name')
            ->add('description')
            ->add('tut_pic',FileType::class,[
                'label' => 'TuT_Pic (PDF file)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' =>'2048k',
                        'mimeTypes' =>[
                            'image/png',
                            'image/jpg',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid picture',
                    ])
                ]
            ])
            ->add('bg_pic', FileType::class,[
                'label' => 'BG_Pic (PDF file)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' =>'2048k',
                        'mimeTypes' =>[
                            'image/png',
                            'image/jpg',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid picture',
                    ])
                ]
            ] )
=======
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
>>>>>>> b4ad69b84ce851aaae3f59c38b36491851a675da
=======
            ->add('first_name')
            ->add('last_name')
            ->add('description')
            ->add('tut_pic')
            ->add('bg_pic')
>>>>>>> 0d1f2d9c50f1df5b8ebc49f8c64a4d2d9f4aac72
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UniqueContent::class,
        ]);
    }
}
