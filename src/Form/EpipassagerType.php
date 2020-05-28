<?php

namespace App\Form;

use App\Entity\Epipassager;
use App\Entity\Epiavion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EpipassagerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('cin')
            ->add('age')
            ->add('classe')
                      ->add('payee',ChoiceType::class, [
    'choices' => [
                  'Dollar $' =>'Dollar $',
                 'Euro €' => 'Euro €',
                 'Dinar TD' =>  'Dinar TD',
                 'Bitcoin ฿' => 'Bitcoin ฿', 
    ]])
            ->add('email')
            ->add('epiavion' , EntityType::class, [

              'class' => 'App\Entity\Epiavion'
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Epipassager::class,
        ]);
    }
}
