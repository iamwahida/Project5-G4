<?php

namespace App\Form;

use App\Entity\Subject;
use App\Entity\CardContent;
use App\Entity\University;
use App\Repository\CardContentRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CardContentType extends AbstractType
{    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('card_title', TextType::class, [
                'attr' => ['class' => 'form-control border border-dark', 'style' => 'margin-bottom:15px'],
            ])
            ->add('card_text', TextType::class, [
                'attr' => ['class' => 'form-control border border-dark', 'style' => 'margin-bottom:15px'],
            ])
            ->add('card_pic', FileType::class,[
                'attr' => ['class' => 'form-control border border-dark', 'style' => 'margin-bottom:15px'],
                'label' => 'image (PDF file)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' =>'1024k',
                        'mimeTypes' =>[
                            'image/png',
                            'image/jpg',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid picture',
                    ])
                ]
            ])
            ->add('fk_university', EntityType::class,
             ['class' => University::class,'choice_label' => 'universityName', 'attr' => ['class' => 'form-control my-1 mb-2 w-50']])

            ->add('fk_subject', EntityType::class, 
            ['class' => Subject::class,'choice_label' =>'subject_name', 'attr' => ['class' => 'form-control my-1 mb-2 w-50']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CardContent::class,
        ]);
    }
}
