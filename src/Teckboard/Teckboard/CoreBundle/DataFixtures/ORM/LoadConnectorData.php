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
use Teckboard\Teckboard\CoreBundle\Entity\Board;
use Teckboard\Teckboard\CoreBundle\Entity\BoardAccount;
use Teckboard\Teckboard\CoreBundle\Entity\Connector;
use Teckboard\Teckboard\CoreBundle\Entity\Widget;

class LoadConnectorData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $connector = new Connector();

        $encoder = $this->getContainer()
                        ->get('security.encoder_factory')
                        ->getEncoder($connector);

        $connector->setCreateBy($this->getReference('test-user'))
                  ->setName('Test connector')
                  ->setPrivateKey($encoder->encodePassword(microtime(), $this->getContainer()->getParameter('secret')))
                  ->setUrl('http://teckboard.local/widget-demo/test-widget.php');

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