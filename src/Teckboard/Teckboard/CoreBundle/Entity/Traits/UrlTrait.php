<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:18
 */

namespace Teckboard\Teckboard\CoreBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\ORMInvalidArgumentException;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

trait UrlTrait {

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     *
     * @JMS\Expose
     */
    protected $url;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new ORMInvalidArgumentException("$url is a valid URL");
        }

        $this->url = $url;
        return $this;
    }

}