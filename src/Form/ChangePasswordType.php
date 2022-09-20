<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label'=>'Votre Prenom',
                'disabled'=>true,
                'attr'=>[
                    'placeholder' =>'Merci de saisir votre prenom'
                ]
            ])
            ->add('nom', TextType::class, [
                'label'=>'Votre Nom',
                'disabled'=>true,
                'attr'=>[
                    'placeholder' =>'Merci de saisir votre Nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label'=>'Votre Email',
                'disabled'=>true,
                'attr'=>[
                    'placeholder' =>'Merci de saisir votre Email'
                ]
            ])
            ->add('old_password', PasswordType::class, [
                'label'=>'Votre mot de passe actuel',
                'mapped'=>false,
                'attr'=>[
                    'placeholder' =>'Merci de saisir votre mot de passe actuel'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type'=>PasswordType::class,
                'mapped'=>false,
                'invalid_message'=>'le mot de passe et la confirmation doivent etre identique. ',
                'label'=>'Votre Mot de passe',
                'required'=>true,
                'first_options'=> [
                    'label'=>'Nouveau mot de passe',
                    'attr'=>[
                        'placeholder'=>'Nouveau mot de passe'
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
                'label'=>"Mettre à jour",
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
