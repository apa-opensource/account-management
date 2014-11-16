<?php

namespace FNC\Bundle\AccountManagementBundle\Form;

use Proxies\__CG__\FNC\AccountBundle\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'type',
                'choice',
                array(
                    'choices' => $options['types']
                )
            )
            ->add(
                'currency',
                'choice',
                array(
                    'choices' => $options['currencies']
                )
            )
            ->add('balance')
            ->add('disabled')
            ->add('number')
            ->add('pin');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'FNC\Bundle\AccountServiceBundle\Entity\Account',
                'currencies' => array(),
                'types' => array()
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fnc_accountbundle_account';
    }
}
