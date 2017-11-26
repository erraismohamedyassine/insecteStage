<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

use FOS\UserBundle\Model\User as BaseUser;


/**
 * Insecte
 *
 * @ORM\Table(name="insecte")
 * @ORM\Entity
 */
class Insecte
{
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

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;




    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Insecte", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Insecte", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="amis",
     *      joinColumns={@ORM\JoinColumn(name="id_insecte1", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_insecte2", referencedColumnName="id")}
     *      )
     */
    private $myFriends;





    /**
     * Constructor
     */
    public function __construct()
    {
        $this->friendsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myFriends = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    /**
     * @param mixed $friendsWithMe
     */
    public function setFriendsWithMe($friendsWithMe)
    {
        $this->friendsWithMe = $friendsWithMe;
    }

    /**
     * @return mixed
     */
    public function getMyFriends()
    {
        return $this->myFriends;
    }

    /**
     * @param mixed $myFriends
     */
    public function setMyFriends($myFriends)
    {
        $this->myFriends = $myFriends;
    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        return "[nom = ] " . $this->getNom();
    }


}

