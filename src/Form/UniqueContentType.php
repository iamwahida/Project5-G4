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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UniqueContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class, [
                'attr' => ['class' => 'form-control border border-dark p-2 mb-3']
            ])
            ->add('last_name', TextType::class, [
                'attr' => ['class' => 'form-control border border-dark p-2 mb-3']
            ])
            ->add('description' , TextareaType::class, [
                'attr' => ['class' => 'form-control border border-dark p-2 mb-3']
            ])
            ->add('tut_pic',FileType::class,[
                'attr' => ['class' => 'form-control border border-dark p-2 mb-3'],
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
                'attr' => ['class' => 'form-control border border-dark p-2 mb-3'],
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
            ] );
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UniqueContent::class,
        ]);
    }
}
