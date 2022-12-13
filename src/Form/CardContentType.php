<?php

namespace App\Form;

use App\Entity\CardContent;
use App\Repository\CardContentRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class CardContentType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        
        $builder
            ->add('card_title')
            ->add('card_text')
            ->add('card_pic', FileType::class,[
                'label' => 'card_pic (PDF file)',
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
            ->add('fk_university', ChoiceType::class, ['choices' => ["1" => "TU Wien"], 'attr' => ['class' => 'form-control my-1 mb-2 w-50']])
            ->add('fk_subject', ChoiceType::class, ['choices' => ["Math" => "1", "Biology" => "2"], 'attr' => ['class' => 'form-control my-1 mb-2 w-50']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CardContent::class,
        ]);
    }
}
