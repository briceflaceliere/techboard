<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:18
 */

namespace Teckboard\Teckboard\CoreBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Gedmo\Mapping\Annotation as Gedmo;

trait NameTrait {

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     * @JMS\Expose
     *
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=125, unique=true)
     * @JMS\Expose()
     */
    private $slugName;

    /**
     * @return mixed
     */
    public function getSlugName()
    {
        return $this->slugName;
    }

    /**
     * @param mixed $slugName
     *
     * @return $this
     */
    public function setSlugName($slugName)
    {
        $this->slugName = $slugName;
        return $this;
    }



}