<?php

namespace App\Form;

use App\Entity\Adress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class AdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Votre nom ?',
                'attr' =>[
                    'placeholder' => 'Entrez votre nom'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom ?',
                'attr' =>[
                    'placeholder' => ' Entrez votre prénom'
                ]
            ])
            ->add('lastname',TextType::class, [
                'label' => 'Votre nom ?',
                'attr' =>[
                    'placeholder' => ' Entrez votre nom'
                ]
            ])
            ->add('company',TextType::class, [
                'label' => 'Votre société ?',
                'required' => false,
                'attr' =>[
                    'placeholder' => ' (facultatif) Entrez votre entreprise',
                    
                ]
            ])
            ->add('adress',TextType::class, [
                'label' => 'Votre adresse ?',
                'attr' =>[
                    'placeholder' => ' Entrez votre adresse'
                ]
            ])
            ->add('postal',TextType::class, [
                'label' => 'Votre code postal ?',
                'attr' =>[
                    'placeholder' => 'Entrez votre code postal'
                ]
            ])
            ->add('city',TextType::class, [
                'label' => 'Votre ville ?',
                'attr' =>[
                    'placeholder' => ' Entrez votre ville'
                ]
            ])
            ->add('country',CountryType::class, [
                'label' => 'Votre pays ?',
                'attr' =>[
                    'placeholder' => ' Entrez votre pays'
                ]
            ])
            ->add('phone',TelType::class, [
                'label' => 'Votre téléphone?',
                'attr' =>[
                    'placeholder' => ' Entrez votre numéro de téléphone'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => ' Valider mon adresse',
                'attr' =>[
                    'class'=>'btn-block btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adress::class,
        ]);
    }
}