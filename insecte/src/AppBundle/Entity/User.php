<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=true)
     */
    private $nom;

    /**
     * @var string
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="famille", type="string", length=20, nullable=true)
     */
    private $famille;

    /**
     * @var string
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="race", type="string", length=20, nullable=true)
     */
    private $race;

    /**
     * @var integer
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="age", type="integer", length=4, nullable=true)
     */
    private $age;

    /**
     * @var string
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="nourriture", type="string", length=20, nullable=true)
     */
    private $nourriture;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * @param string $famille
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;
    }

    /**
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param integer $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param string $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * @return string
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }

    /**
     * @param string $nourriture
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;
    }

}