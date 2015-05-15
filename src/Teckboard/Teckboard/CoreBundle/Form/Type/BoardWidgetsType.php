<?php
/**
 * Created by PhpStorm.
 * User: brice
 * Date: 02/04/15
 * Time: 13:48
 */

namespace Teckboard\Teckboard\CoreBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoardWidgetsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('widgets', 'collection', [
            'type' => 'widget',
            'by_reference' => false,
        ]);
    }

    public function getName()
    {
        return 'boardWidgets';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Teckboard\Teckboard\CoreBundle\Entity\Board',
            'cascade_validation' => true
        ));
    }
} 