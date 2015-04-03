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
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WidgetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('position_x', 'hidden')
                ->add('position_y', 'hidden')
                ->add('width', 'hidden')
                ->add('height', 'hidden');
    }

    public function getName()
    {
        return 'widget';
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Teckboard\Teckboard\CoreBundle\Entity\Widget'
        ));
    }
} 