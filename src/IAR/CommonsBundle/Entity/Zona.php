<?php

namespace IAR\CommonsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zona
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Zona
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Localidad
     *
     * @ORM\ManyToOne(targetEntity="Localidad")
     * @ORM\JoinColumn(name="localidad_id", referencedColumnName="id")
     */
    private $localidad;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Zona
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    public function __toString() {
        return $this->name;
    }

    /**
     * Set localidad
     *
     * @param \IAR\CommonsBundle\Entity\Localidad $localidad
     * @return Zona
     */
    public function setLocalidad(\IAR\CommonsBundle\Entity\Localidad $localidad = null)
    {
        $this->localidad = $localidad;
    
        return $this;
    }

    /**
     * Get localidad
     *
     * @return \IAR\CommonsBundle\Entity\Localidad 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }
}