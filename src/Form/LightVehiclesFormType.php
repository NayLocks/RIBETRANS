<?php

namespace App\Form;

use App\Entity\LightVehicles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LightVehiclesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numberPlate', TextType::class, array(
                'label' => "Immatriculation",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

//            ->add('putCirculation')

//            ->add('entrancePark')

//            ->add('exitPark')

            ->add('km', TextType::class, array(
                'label' => "Kilométrage Actuel",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XXXXXX"]))

//            ->add('isArchived')

            ->add('weight', TextType::class, array(
                'label' => "Poids (PTAC)",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('emptyWeight', TextType::class, array(
                'label' => "Poids à Vide",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('tireSizeAV', TextType::class, array(
                'label' => "Dimension ",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('tireSizeAR', TextType::class, array(
                'label' => "Dimension ",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('bodyType', TextType::class, array(
                'label' => "Type Carrosserie",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('nbPlaces', TextType::class, array(
                'label' => "Nombre de places",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('energy', TextType::class, array(
                'label' => "Energie",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('power', TextType::class, array(
                'label' => "Puissance",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

//            ->add('company')
//            ->add('body')
//            ->add('brand')
//            ->add('category')
//            ->add('tireBrandsAV')
//            ->add('tireBrandsAR')
//            ->add('kind')
//            ->add('type')

            ->add('valider', SubmitType::class, array(
                'label' => "VALIDER LES MODIFICATIONS",
                'attr' => ['class' => 'btn btn-success btn-round waves-effect',
                    'width' => '100%']))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LightVehicles::class,
        ]);
    }
}
