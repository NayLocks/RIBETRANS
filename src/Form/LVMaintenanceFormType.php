<?php

namespace App\Form;

use App\Entity\LVehiclesMaintenances;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LVMaintenanceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('driver', TextType::class, array(
                'label' => "Conducteur :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('intervenant', TextType::class, array(
                'label' => "Intervenant :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('entrance', DateType::class, array(
                'label' => "Entrée :",
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
                'attr' => ['class' => 'form-control date']))

            ->add('exitRT', DateType::class, array(
                'label' => "Sortie :",
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
                'attr' => ['class' => 'form-control date']))

            ->add('km', TextType::class, array(
                'label' => "Kilométrage :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('intervention', TextType::class, array(
                'label' => "Intervention :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('quantite', TextType::class, array(
                'label' => "Quantité :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('priceUnit', TextType::class, array(
                'label' => "Prix Unité :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('total', TextType::class, array(
                'label' => "Total :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

//            ->add('company')

//            ->add('vehicle')

            ->add('valider', SubmitType::class, array(
                'label' => "VALIDER LA LOCATION",
                'attr' => ['class' => 'btn btn-success btn-round waves-effect',
                    'style' => 'width: 100%; font-size: 15px']))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LVehiclesMaintenances::class,
        ]);
    }
}
