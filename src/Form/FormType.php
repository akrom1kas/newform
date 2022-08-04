<?php

namespace App\Form;

use App\Entity\Naujas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Vardas')
            ->add('Pavarde')
            ->add('Epastas')
            ->add('Telefonas')
            ->add('Adresas')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Naujas::class,
        ]);
    }
}
