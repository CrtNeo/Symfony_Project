<?php

namespace App\Form;

use App\Entity\Marcas;
use App\Entity\Piezas;
use App\Entity\Tipos;
use App\Entity\Vehiculos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class addVehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tipos', EntityType::class, array(
                'class' => Tipos::class,
                'choice_label' => 'nombre'))
            ->add('marca', EntityType::class, array(
                'class' => Marcas::class,
                'choice_label' => 'nombre'))
            ->add('nombre', TextType::class, ['attr' => array('placeholder' => 'Modelo')]);    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehiculos::class,
        ]);
    }
}
