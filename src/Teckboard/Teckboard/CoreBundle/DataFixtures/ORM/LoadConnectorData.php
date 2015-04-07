<?php
/**
 * Created by PhpStorm.
 * User: brice
 * Date: 25/02/15
 * Time: 13:32
 */

namespace Teckboard\Teckboard\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Teckboard\Teckboard\CoreBundle\Entity\Board;
use Teckboard\Teckboard\CoreBundle\Entity\BoardAccount;
use Teckboard\Teckboard\CoreBundle\Entity\Connector;
use Teckboard\Teckboard\CoreBundle\Entity\Widget;

class LoadConnectorData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $connector = new Connector();
        $connector->setCreateBy($this->getReference('test-user'))
                  ->setName('Test connector')
                  ->setUrl('http://teckboard-connector.local');

        $manager->persist($connector);
        $manager->flush();

        $this->addReference('test-connector', $connector);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
} 