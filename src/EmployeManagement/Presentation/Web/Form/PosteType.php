<?php

namespace App\EmployeManagement\Presentation\Web\Form;

use App\EmployeManagement\Domain\Model\Entity\Departement;
use App\EmployeManagement\Domain\Model\Entity\Poste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PosteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du poste',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez le poste  ',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Description du poste',
                ],
            ])
            ->add('departement', EntityType::class, [
                'autocomplete' => true,
                'class' => Departement::class,
                'label' => 'Departement',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'class' => 'mb-4',
                ],
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Poste::class,
        ]);
    }
}
