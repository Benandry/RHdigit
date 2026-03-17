<?php

namespace App\Form;

use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\Entity\Contrat;
use App\Entity\Poste;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-4',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4 cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100',
                    'placeholder' => 'Sélectionnez une image...',
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Nom du employé',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-4',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le nom  ',
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Prénom du employé',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-4',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le prénom  ',
                ]
            ])
            ->add('cin', TextType::class, [
                'label' => 'CIN',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-4',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le CIN  ',
                ]
            ])
            ->add('dateOfBirth', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',
                'input' => 'datetime_immutable',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-4',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez la date de naissance  ',
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-4',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez l\'adresse  ',
                ]
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'Numéro de Téléphone',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-4',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le numéro de téléphone  ',
                ]
            ])
            ->add('salary', TextType::class, [
                'label' => 'Salaire',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-4',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le salaire  ',
                ]
            ])
            ->add('poste', EntityType::class, [
                'autocomplete' => true,
                'class' => Poste::class,
                'choice_label' => 'name',
                'label' => 'Poste',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'placeholder' => 'Sélectionnez le poste  ',
                    'class' => 'mb-8',
                ]
            ])
            ->add('contrat', EntityType::class, [
                'class' => Contrat::class,
                'autocomplete' => true,
                'choice_label' => 'name',
                'label' => 'Contrat',
                'label_attr' => [
                    'class' => 'block text-sm font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'placeholder' => 'Sélectionnez le contrat  ',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
