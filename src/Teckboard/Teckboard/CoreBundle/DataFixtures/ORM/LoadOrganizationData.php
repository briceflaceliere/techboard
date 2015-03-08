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
use Teckboard\Teckboard\CoreBundle\Entity\Organization;

class LoadOrganizationData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $orga = new Organization();
        $orga->setName('test-orga');
        $orga->setPrivateKey(hash('sha512', 'test-orga'));
        $orga->setCreateBy($this->getReference('test-user'));
        $orga->setPicture('user2.jpg');

        $manager->persist($orga);
        $manager->flush();

        $this->addReference('test-orga', $orga);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }


} 