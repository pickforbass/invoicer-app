<?php

namespace App\Form;

use App\Entity\Designation;
use App\Entity\Task;
use Container2RuAs02\getConsole_Command_YamlLintService;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
