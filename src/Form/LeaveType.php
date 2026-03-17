<?php

namespace App\Form;

use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\Entity\Leave;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LeaveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('staredAt', DateType::class, [
                'label' => 'Date de début',
                'widget' => 'single_text',
                'input' => 'datetime_immutable',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700 mb-4',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Entrez la date de naissance  ',
                ]
            ])
            ->add('numberOfDay', NumberType::class, [
                'label' => 'Nombre de jours',
                'html5' => true,
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                    'placeholder' => 'Nombre de jours de congé',
                ],
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Statut',
                'choices' => [
                    'Pending' => 'pending',
                    'Approved' => 'approved',
                    'Rejected' => 'rejected',
                ],
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4',
                ],
            ])
            ->add('motif', TextareaType::class, [
                'label' => 'Motif',
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700',
                ],
                'attr' => [
                    'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-4', // Ajout de mb-4 pour la marge
                    'placeholder' => 'Motif de congé',
                ],
            ])
            ->add('employee', EntityType::class, [
                'label' => 'Employé',
                'class' => Employee::class,
                'choice_label' => function ($employee) {
                    return $employee->getFirstName() . ' ' . $employee->getLastName();
                },
                'label_attr' => [
                    'class' => 'block  font-medium text-gray-700 mb-2',
                ],
                'attr' => [
                    'class' => 'mb-4',
                ],
                'autocomplete' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Leave::class,
        ]);
    }
}
