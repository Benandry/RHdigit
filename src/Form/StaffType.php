<?php

namespace App\Form;

use App\Entity\Staff;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StaffType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('firstname', TextType::class, [
            'label' => 'Nom du staff',
            'label_attr' => [
                'class' => 'block  font-medium text-gray-700', // Classes pour le libellé
            ],
            'attr' => [
                'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                'placeholder' => 'Entrez le nom ', // Placeholder optionnel
            ],
        ])
            ->add('lastname', TextType::class, [
                'label' => 'Prénom du staff',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700', // Classes pour le libellé
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le prénom ', // Placeholder optionnel
                ],
            ])
            ->add('birth_', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700', // Classes pour le libellé
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez la date de naissance ', // Placeholder optionnel
                ],
            ])
            ->add('number_cin', TextType::class, [
                'label' => 'Numéro de CIN',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700', // Classes pour le libellé
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le numéro de CIN ', // Placeholder optionnel
                ],
            ])
            ->add('number_matricule', TextType::class, [
                'label' => 'Numéro de matricule',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700', // Classes pour le libellé
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le numéro de matricule ', // Placeholder optionnel
                ],
            ])
            ->add('adresse_exact', TextType::class, [
                'label' => 'Adresse exacte',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700', // Classes pour le libellé
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez l\'adresse exacte ', // Placeholder optionnel
                ],
            ])
            ->add('work_post', TextType::class, [
                'label' => 'Poste de travail',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700', // Classes pour le libellé
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le poste de travail ', // Placeholder optionnel
                ],
            ])
            ->add('phone_number', TextType::class, [
                'label' => 'Numéro de téléphone',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700', // Classes pour le libellé
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le numéro de téléphone ', // Placeholder optionnel
                ],
            ])
            ->add('situation_family', TextType::class, [
                'label' => 'Situation familiale',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700', // Classes pour le libellé
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez la situation familiale ', // Placeholder optionnel
                ],
            ])
            ->add('civility', ChoiceType::class, [
                'label' => 'Civilité',
                'choices' => [
                    'Monsieur' => 'M',
                    'Madame' => 'Mme',
                    'Mademoiselle' => 'Mlle',
                ],
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                ],
            ])
            ->add('nationality', CountryType::class, [
                'label' => 'Nationalité',
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                ],
                'placeholder' => 'Sélectionnez un pays',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                    'placeholder' => 'exemple@email.com',
                ],
            ])
            ->add('code_postal', TextType::class, [
                'label' => 'Code postal',
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                    'placeholder' => 'Entrez le code postal',
                ],
            ])
            ->add('number_child', IntegerType::class, [
                'label' => 'Nombre d\'enfants',
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                    'placeholder' => '0',
                    'min' => 0,
                ],
            ])
            ->add('lieu', TextType::class, [
                'label' => 'Lieu',
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                    'placeholder' => 'Entrez le lieu',
                ],
            ])
            ->add('salary_base', NumberType::class, [
                'label' => 'Salaire de base',
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                    'placeholder' => '0000.00',
                    'step' => '0.01',
                ],
            ])
            ->add('date_begin', DateType::class, [
                'label' => 'Date de début',
                'widget' => 'single_text',
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                ],
            ])
            ->add('date_end', DateType::class, [
                'label' => 'Date de fin',
                'widget' => 'single_text',
                'required' => false,
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                ],
            ])
            ->add('hours_per_week', IntegerType::class, [
                'label' => 'Heures/semaine',
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                    'placeholder' => '35',
                    'min' => 0,
                ],
            ])
            ->add('day_per_week', IntegerType::class, [
                'label' => 'Jours/semaine',
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                    'placeholder' => '5',
                    'min' => 0,
                    'max' => 7,
                ],
            ])
            ->add('horary', TimeType::class, [
                'label' => 'Horaire',
                'widget' => 'single_text',
                'label_attr' => ['class' => 'block  font-medium text-gray-700'],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Staff::class,
        ]);
    }
}
