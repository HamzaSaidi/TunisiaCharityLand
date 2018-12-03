<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array('label' =>'email','translation_domain' => 'FOSUserBundle','attr'=>[
                'class'=>'form-control',
                'placeholder'=>'enter email',


            ]))
            ->add('username', null, array('label' => 'username', 'translation_domain' => 'FOSUserBundle',
                'attr'=>[
                    'class'=>'form-control',
                    'placeholder'=>'User Name',
                    'label.class'=>'col-form-label',


                ]))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array(
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                            'autocomplete' => 'new-password',


                    ),
                ),
                'first_options' => array('label' => 'password','attr'=>['placeholder'=>'password','class'=>'form-control',]),
                'second_options' => array('label' => 'password confirmation','attr'=>['placeholder'=>'confirm password','class'=>'form-control',]),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('roles', ChoiceType::class, array('label' => 'Type ','choices' => array(' Foundation' => 'ROLE_ASSOCIATION',
                'Membre' => 'ROLE_MEMBRE'),     'required' => true, 'multiple' => true,))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'csrf_token_id' => 'registration',
        ));
    }

    // BC for SF < 3.0

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fos_user_registration';
    }
}
