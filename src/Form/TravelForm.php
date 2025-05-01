<?php

namespace App\Form;

use App\Entity\Travel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TravelForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('num_passengers')
            ->add('duration')
            ->add('out_time')
            ->add('arrive_time')
            ->add('kilometers')
            ->add('gas_used_liters')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Travel::class,
        ]);
    }
}
