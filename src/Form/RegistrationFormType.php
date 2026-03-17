<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Nom d\'utilisateur',
                'label_attr' => [
                    'class' => 'block  font-medium mb-2',
                ],
                'attr' => [
                    'class' => 'w-full px-2 py-2 rounded-lg border border-white/20 bg-white/10 text-white placeholder-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400',
                    'placeholder' => 'exemple@email.com',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse e-mail',
                'label_attr' => [
                    'class' => 'block  font-medium mb-2',
                ],
                'attr' => [
                    'class' => 'w-full px-2 py-2 rounded-lg border border-white/20 bg-white/10 text-white placeholder-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400',
                    'placeholder' => 'exemple@email.com',
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'J\'accepte les conditions',
                'attr' => [
                    'class' => 'mr-2',
                ],
                'label_attr' => [
                    'class' => 'block  font-medium',
                ],
                'required' => true,
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Mot de passe',
                'label_attr' => [
                    'class' => 'block  font-medium mb-2',
                ],
                'attr' => [
                    'class' => 'w-full px-2 py-2 rounded-lg border border-white/20 bg-white/10 text-white placeholder-gray-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-400',
                    'placeholder' => '••••••••',
                ],
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
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
