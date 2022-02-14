<?php

namespace App\Form;

use App\Entity\Marcas;
use App\Entity\Piezas;
use App\Entity\Tipos;
use App\Entity\Vehiculos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class addVehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tipo', EntityType::class, array(
                'class' => Tipos::class,
                'choice_label' => 'nombre',))
            ->add('marca', EntityType::class, array(
                'class' => Marcas::class,
                'placeholder' => 'Nombre',))
            ->add('modelo', TextType::class , ['attr' => [
                'placeholder' => 'Modelo']])
            ->add('piezas', EntityType::class, array(
                    'class' => Piezas::class,
                    'placeholder' => 'Piezas'));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehiculos::class,
        ]);
    }
}
