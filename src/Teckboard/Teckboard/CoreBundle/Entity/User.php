<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:02
 */

namespace Teckboard\Teckboard\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Teckboard\Teckboard\CoreBundle\Entity\Traits\TimestampableTrait;

/**
 * Class User
 * @package Teckboard\Teckboard\CoreBundle\Entity
 *
 * @ORM\Entity
 */
class User extends Owner
{
    use TimestampableTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, nullable=false, length=100)
     */
    protected $userName;

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }



    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $password;

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $privateKey;

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param string $privateKey
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
    }


    protected $picture;


}