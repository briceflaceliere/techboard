<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 21/02/2015
 * Time: 18:02
 */

namespace Teckboard\Teckboard\CoreBundle;

use Doctrine\ORM\Mapping as ORM;
use Teckboard\Teckboard\CoreBundle\Traits\TimestampableTrait;

class User implements OwnerableInterface {

    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



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

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", nullable=true)
     */
    protected $birthDay;

    /**
     * @return \DateTime
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }

    /**
     * @param \DateTime $birthDay
     */
    public function setBirthDay(\DateTime $birthDay)
    {
        $this->birthDay = $birthDay;
    }


    protected $city;

}