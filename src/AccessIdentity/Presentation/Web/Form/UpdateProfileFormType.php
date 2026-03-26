<?php

namespace App\AccessIdentity\Presentation\Web\Form;

use App\AccessIdentity\Presentation\Web\WriteModel\UserModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UpdateProfileFormType
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 */
class UpdateProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Nom d\'utilisateur',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse e-mail',
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Prénom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserModel::class,
        ]);
    }
}