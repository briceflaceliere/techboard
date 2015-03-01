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
        $board->setName('board-user');
        $board->setCreateBy($this->getReference('test-user'));

        $boardAccount1 = new BoardAccount();
        $boardAccount1->setBoard($board)
                      ->setType(BoardAccount::TYPE_OWNER)
                      ->setAccount($this->getReference('test-user'))
                      ->setPosition(1)
                      ->setName($board->getName());

        $manager->persist($board);
        $manager->persist($boardAccount1);

        $board2 = new Board();
        $board2->setName('board-orga');
        $board2->setCreateBy($this->getReference('test-user'));

        $boardAccount2 = new BoardAccount();
        $boardAccount2->setBoard($board2)
                      ->setType(BoardAccount::TYPE_OWNER)
                      ->setAccount($this->getReference('test-user'))
                      ->setPosition(2)
                      ->setName($board2->getName());

        $boardAccount3 = new BoardAccount();
        $boardAccount3->setBoard($board2)
                      ->setAccount($this->getReference('test-orga'))
                      ->setPosition(1)
                      ->setName($board2->getName());

        $manager->persist($board2);
        $manager->persist($boardAccount2);
        $manager->persist($boardAccount3);

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