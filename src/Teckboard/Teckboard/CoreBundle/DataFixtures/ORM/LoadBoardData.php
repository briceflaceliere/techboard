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

class LoadBoardData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $board = new Board();
        $board->setName('board-user')
              ->setAccount($this->getReference('test-user'))
              ->setCreateBy($this->getReference('test-user'));

        $manager->persist($board);

        $board2 = new Board();
        $board2->setName('board-orga')
               ->setAccount($this->getReference('test-orga'))
               ->setCreateBy($this->getReference('test-user'));

        $manager->persist($board2);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
} 