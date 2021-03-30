<?php

namespace App\Form;

use App\Entity\LVehiclesRentals;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LVRentalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('driver')
            ->add('startRental')
            ->add('endRental')
            ->add('price')
            ->add('valider', SubmitType::class, array(
                'label' => "ENVOYER LE DOCUMENT",
                'attr' => ['class' => 'btn btn-success btn-round waves-effect'
                ]))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LVehiclesRentals::class,
        ]);
    }
}
