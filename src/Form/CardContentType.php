<?php

namespace App\Form;

use App\Entity\CardContent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('card_title')
            ->add('card_text')
            ->add('card_pic')
            ->add('fk_university')
            ->add('fk_subject')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CardContent::class,
        ]);
    }
}
