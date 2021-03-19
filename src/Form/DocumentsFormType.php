<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class DocumentsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => "Choisir un nom de fichier :",
                'attr' => ['class' => 'form-control',
                    'placeholder' => "Ex : CARTE GRISE"]))

            ->add('document', FileType::class, [
                'label' => 'Seuls les fichiers au format PDF sont acceptés',
                'mapped' => false,
                'required' => true,
                'attr' => ['class' => "dropify-fr-pdf",
                    'data-allowed-file-extensions' => "pdf png"],
                'constraints' => [
                    new File([
                        'maxSize' => '20M',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid PDF document',
                    ])
                ],
            ])
            ->add('valider', SubmitType::class, array(
                'label' => "ENVOYER LE DOCUMENT",
                'attr' => ['class' => 'btn btn-success btn-round waves-effect'
                ]))
        ;
    }
}
