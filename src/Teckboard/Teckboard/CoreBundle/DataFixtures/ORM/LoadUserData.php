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
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Teckboard\Teckboard\CoreBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('test-user');

        $encoder = $this->getContainer()
            ->get('security.encoder_factory')
            ->getEncoder($user);
        $user->setPassword($encoder->encodePassword('0000', $user->getSalt()));

        $user->setPrivateKey(hash('sha512', 'test-user'));
        $user->setPicture('/pictures/user1.jpg');

        $manager->persist($user);
        $manager->flush();

        $this->addReference('test-user', $user);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    protected function getContainer()
    {
        return $this->container;
    }
} 