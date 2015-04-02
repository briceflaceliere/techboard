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

class BoardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('widgets', 'collection', [
            'type' => new WidgetType(),
        ]);
    }

    public function getName()
    {
        return 'board';
    }
} 