<?php

namespace App\Form;

use App\Entity\Pokoje;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PokojeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Wymiar', IntegerType::class, [
                'label' => 'Room Size (m²)'
            ])
            ->add('Cena', IntegerType::class, [
                'label' => 'Price (PLN)'
            ])
            ->add('Przeznaczenie', TextType::class, [
                'label' => 'Room Type'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pokoje::class,
        ]);
    }
}
