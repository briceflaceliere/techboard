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
use Teckboard\Teckboard\CoreBundle\Entity\Traits\CreateByTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\IdTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\NameTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\GridTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\PrivateKeyTrait;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\TimestampableTrait;
use JMS\Serializer\Annotation as JMS;
use Hateoas\Configuration\Annotation as Hateoas;
use Symfony\Component\Validator\Constraints as Assert;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\UrlTrait;

/**
 * Class Connector
 * @package Teckboard\Teckboard\CoreBundle\Entity
 *
 * @JMS\ExclusionPolicy("all")
 * @ORM\Entity(repositoryClass="Teckboard\Teckboard\CoreBundle\Repository\ConnectorRepository")
 *
 * @Hateoas\Relation(
 *          "self",
 *          href = @Hateoas\Route("api_connector_get_connectors", parameters = {"id" = "expr(object.getId())" })
 * )
 */
class Connector
{
    use IdTrait, TimestampableTrait, NameTrait, CreateByTrait, PrivateKeyTrait, UrlTrait;

    /**
     * @ORM\OneToMany(targetEntity="Widget", mappedBy="connector", cascade={"all"})
     * @ORM\OrderBy({"id" = "ASC"})
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
     * @ORM\Column(type="json_array", nullable=true)
     * @JMS\Expose
     *
     * @var array
     */
    private $dimension;

    /**
     * @return array
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * @param array $dimension
     *
     * @return this
     */
    public function setDimension($dimension)
    {
        $this->dimension = $dimension;
        return $this;
    }




}
