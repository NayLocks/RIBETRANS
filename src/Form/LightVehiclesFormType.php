<?php

namespace App\Form;

use App\Entity\Bodies;
use App\Entity\Brands;
use App\Entity\Categories;
use App\Entity\Companies;
use App\Entity\LightVehicles;
use App\Entity\TireBrands;
use App\Entity\VehiclesKind;
use App\Entity\VehiclesType;
use App\Repository\BodiesRepository;
use App\Repository\BrandsRepository;
use App\Repository\CategoriesRepository;
use App\Repository\CompaniesRepository;
use App\Repository\TireBrandsRepository;
use App\Repository\VehiclesKindRepository;
use App\Repository\VehiclesTypeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
                'label' => "Immatriculation :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XX-XXX-XX"]))

            ->add('putCirculation', DateType::class, array(
                'label' => "Mise en Circulation :",
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
                'attr' => ['class' => 'form-control date']))

            ->add('entrancePark', DateType::class, array(
                'label' => "Entrée dans le parc :",
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
                'attr' => ['class' => 'form-control date']))

            ->add('exitPark', DateType::class, array(
                'label' => "Sortie du parc :",
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
                'attr' => ['class' => 'form-control date']))

            ->add('km', TextType::class, array(
                'label' => "Kilométrage Actuel :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : XXXXXX"]))

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

            ->add('company', EntityType::class, [
                'label' => "Société :",
                'class' => Companies::class,
                'query_builder' => function (CompaniesRepository $companies) {
                    return $companies->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
                'choice_label' => 'name',])

            ->add('body', EntityType::class, [
                'label' => "Carroserie :",
                'class' => Bodies::class,
                'query_builder' => function (BodiesRepository $bodies) {
                    return $bodies->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                },
                'choice_label' => 'name',])

            ->add('brand', EntityType::class, [
                'label' => "Marque :",
                'class' => Brands::class,
                'query_builder' => function (BrandsRepository $brands) {
                    return $brands->createQueryBuilder('b')
                        ->orderBy('b.name', 'ASC');
                },
                'choice_label' => 'name',])

            ->add('category', EntityType::class, [
                'label' => "Catégorie :",
                'class' => Categories::class,
                'query_builder' => function (CategoriesRepository $categories) {
                    return $categories->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
                'choice_label' => 'name',])

            ->add('tireBrandsAV', EntityType::class, [
                'label' => "Marque :",
                'class' => TireBrands::class,
                'query_builder' => function (TireBrandsRepository $tireBrands) {
                    return $tireBrands->createQueryBuilder('t')
                        ->orderBy('t.name', 'ASC');
                },
                'choice_label' => 'name',])

            ->add('tireBrandsAR', EntityType::class, [
                'label' => "Marque :",
                'class' => TireBrands::class,
                'query_builder' => function (TireBrandsRepository $tireBrands) {
                    return $tireBrands->createQueryBuilder('t')
                        ->orderBy('t.name', 'ASC');
                },
                'choice_label' => 'name',])

            ->add('kind', EntityType::class, [
                'label' => "Genre :",
                'class' => VehiclesKind::class,
                'query_builder' => function (VehiclesKindRepository $kind) {
                    return $kind->createQueryBuilder('k')
                        ->orderBy('k.name', 'ASC');
                },
                'choice_label' => 'name',])

            ->add('type', EntityType::class, [
                'label' => "Type :",
                'class' => VehiclesType::class,
                'query_builder' => function (VehiclesTypeRepository $type) {
                    return $type->createQueryBuilder('t')
                        ->orderBy('t.name', 'ASC');
                },
                'choice_label' => 'name',])


            ->add('valider', SubmitType::class, array(
                'label' => "VALIDER LES MODIFICATIONS",
                'attr' => ['class' => 'btn btn-success btn-round waves-effect',
                    'style' => 'width: 100%; font-size: 15px']))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LightVehicles::class,
        ]);
    }
}
