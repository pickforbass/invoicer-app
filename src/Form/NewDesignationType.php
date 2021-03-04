<?php

namespace App\Form;

use App\Entity\Designation;
use App\Entity\Task;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewDesignationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation', EntityType::class, [
                'class' => Task::class,
                'choice_attr' => ChoiceList::attr($this, function (Task $task) {
                    return $task ? ['data-hour' => $task->getFee()] : [];
                }),
                    ])
                ->add('price')
            ->add('invoice', HiddenType::class)
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Designation::class,
        ]);
    }
}
