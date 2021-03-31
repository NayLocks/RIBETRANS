<?php

namespace App\Form;

use App\Entity\LVehiclesRentals;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LVRentalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('driver', TextType::class, array(
                'label' => "Conducteur :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XXX YYY"]))
            ->add('startRental')
            ->add('endRental')
            ->add('price', TextType::class, array(
                'label' => "Tarif :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX"]))
            ->add('valider', SubmitType::class, array(
                'label' => "VALIDER LA LOCATION",
                'attr' => ['class' => 'btn btn-success btn-round waves-effect',
                    'style' => 'width: 100%; font-size: 15px']))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LVehiclesRentals::class,
        ]);
    }
}
