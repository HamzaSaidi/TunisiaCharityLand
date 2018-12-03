<?php

namespace DonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', ChoiceType::class, ['label' => 'type',
            'choices' => ['Money' => 'Money', 'Other' => 'Other'],
            'attr' => ['class' => 'form-control'],
            'label_attr' => ['class' => 'col-form-label'],])
            ->add('amount', TextType::class, ['label' => 'Amount',
                'attr' => ['placeholder' => 'enter amount', 'class' => 'form-control'],
                'label_attr' => ['class' => 'col-form-label']])
            ->add('description', TextType::class, ['label' => 'Description',
                'attr' => ['placeholder' => 'enter a description of your donation', 'class' => 'form-control'],
                'label_attr' => ['class' => 'col-form-label']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DonBundle\Entity\Category'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'donbundle_category';
    }


}
