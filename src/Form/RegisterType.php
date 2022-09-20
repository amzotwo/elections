<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label'=>'Votre Prenom',
                'attr'=>[
                    'placeholder' =>'Merci de saisir votre prenom'
                ]
            ])
            ->add('nom', TextType::class, [
                'label'=>'Votre Nom',
                'attr'=>[
                    'placeholder' =>'Merci de saisir votre Nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label'=>'Votre Email',
                'attr'=>[
                    'placeholder' =>'Merci de saisir votre Email'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type'=>PasswordType::class,
                'invalid_message'=>'le mot de passe et la confirmation doivent etre identique. ',
                'label'=>'Votre Mot de passe',
                'required'=>true,
                'first_options'=> [
                    'label'=>'Mot de passe',
                    'attr'=>[
                        'placeholder'=>'Mot de passe'
                    ]
                ],
                'second_options'=>[
                    'label'=>'Confirmation mot de passe',
                    'attr'=>[
                        'placeholder'=>'Confirmation mot de passe'
                    ]
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label'=>"S'inscrire",
                'attr'=>[
                    'class' =>'btn common-btn'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
