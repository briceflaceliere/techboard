<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:02
 */

namespace Teckboard\Teckboard\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\CreateByTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\IdTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\NameTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\TimestampableTrait;
use JMS\Serializer\Annotation as JMS;
use Hateoas\Configuration\Annotation as Hateoas;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Board
 * @package Teckboard\Teckboard\CoreBundle\Entity
 *
 * @JMS\ExclusionPolicy("all")
 * @ORM\Entity(repositoryClass="Teckboard\Teckboard\CoreBundle\Repository\BoardRepository")
 *
 * @Hateoas\Relation(
 *          "self",
 *          href = @Hateoas\Route("api_board_get_boards", parameters = {"id" = "expr(object.getId())" })
 * )
 */
class Board
{
    use IdTrait, TimestampableTrait, NameTrait, CreateByTrait;

    public function __construct()
    {
        $this->widgets = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="boards")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id", nullable=false)
     * @JMS\Expose
     * @JMS\Groups({"BoardDetail"})
     *
     * @Assert\NotNull()
     *
     * @var Account $account
     **/
    protected $account;

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param Account $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity="Widget", mappedBy="board", cascade={"all"})
     * @ORM\OrderBy({"positionX" = "ASC", "positionY" = "ASC"})
     *
     * @JMS\Groups({"BoardDetail"})
     * @JMS\Expose
     *
     * @var ArrayCollection $widgets
     **/
    protected $widgets;

    /**
     * @return ArrayCollection
     */
    public function getWidgets()
    {
        return $this->widgets;
    }

    /**
     * @param Collection $widgets
     * @return $this
     */
    public function setWidgets(Collection $widgets)
    {
        $this->widgets = $widgets;
        return $this;
    }

    /**
     * @Assert\Callback
     */
    public function validateWidgetsPositions(ExecutionContextInterface $context)
    {
        $widgetChecked = [];

        foreach ($this->getWidgets() as $widget1) {
            foreach ($this->getWidgets() as $widget2) {
                if ($widget1->getId() == $widget2->getId()) {
                    continue;
                }

                $minId = min($widget1->getId(), $widget2->getId());
                $maxId = max($widget1->getId(), $widget2->getId());

                if (isset($widgetChecked[$minId][$maxId])) {
                    continue;
                }

                $left = max($widget1->getPositionX(), $widget2->getPositionX());
                $right = min($widget1->getPositionX() + $widget1->getWidth(), $widget2->getPositionX() + $widget2->getWidth());
                $bottom = max($widget1->getPositionY(), $widget2->getPositionY());
                $top = min($widget1->getPositionY() + $widget1->getHeight(), $widget2->getPositionY() + $widget2->getHeight());

                if ($left < $right || $bottom < $top) {
                    $context->addViolationAt(
                        'widgets',
                        'Detected collision widgets',
                        array(),
                        null
                    );
                    return;
                }


                $widgetChecked[$minId][$maxId] = true;
            }
        }
    }

}
