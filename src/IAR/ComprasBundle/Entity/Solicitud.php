<?php

namespace IAR\ComprasBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicitud
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Solicitud
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
     * @ORM\Column(name="detalles", type="text", nullable=true)
     */
    private $detalles;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Email()
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var Brand
     *
     * @Assert\NotNull
     * @Assert\Valid
     *
     * @ORM\ManyToOne(targetEntity="Brand")
     * @ORM\JoinColumn(name="brand_id",referencedColumnName="id", nullable=false)
     */
    private $brand;

    /**
     * @var Model 
     *
     * @Assert\NotNull
     * @Assert\Valid
     *
     * @ORM\ManyToOne(targetEntity="Model")
     * @ORM\JoinColumn(name="model_id",referencedColumnName="id", nullable=false)
     */
    private $model;

    /**
     * @var ArrayCollection(\IAR\CommonsBundle\Entity\Zona) $zonas
     *
     * @Assert\NotNull
     * @Assert\Valid
     * @ORM\ManyToMany(targetEntity="\IAR\CommonsBundle\Entity\Zona")
     * @ORM\JoinTable(name="Solicitud_Zona",
     *      joinColumns={@ORM\JoinColumn(name="solicitud_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="zona_id", referencedColumnName="id")}
     * )
     */
    private $zonas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime")
     */
    private $timestamp;

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
     * Set detalles
     *
     * @param string $detalles
     * @return Solicitud
     */
    public function setDetalles($detalles)
    {
        $this->detalles = $detalles;
    
        return $this;
    }

    /**
     * Get detalles
     *
     * @return string 
     */
    public function getDetalles()
    {
        return $this->detalles;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Solicitud
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Solicitud
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Solicitud
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Solicitud
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set brand
     *
     * @param \IAR\ComprasBundle\Entity\Brand $brand
     * @return Solicitud
     */
    public function setBrand(\IAR\ComprasBundle\Entity\Brand $brand)
    {
        $this->brand = $brand;
    
        return $this;
    }

    /**
     * Get brand
     *
     * @return \IAR\ComprasBundle\Entity\Brand 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param \IAR\ComprasBundle\Entity\Model $model
     * @return Solicitud
     */
    public function setModel(\IAR\ComprasBundle\Entity\Model $model)
    {
        $this->model = $model;
    
        return $this;
    }

    /**
     * Get model
     *
     * @return \IAR\ComprasBundle\Entity\Model 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Solicitud
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Solicitud
     */
    public function setTime(\DateTime $time)
    {
        $this->time = $time;
    
        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return Solicitud
     */
    public function setTimestamp(\DateTime $timestamp)
    {
        $this->timestamp = $timestamp;
    
        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set all properties at once
     *
     * @param array $input
     * @return Solicitud
     */
    public function set(array $input)
    {
        $props = get_object_vars($this);

        foreach( $props as $property => $value ) {
            if($property != 'zona'){
                if(isset($input[$property])){ // index exists
                    $this->{$property} = $input[$property] ;
                }
            }
        }

        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->zonas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add zonas
     *
     * @param \IAR\CommonsBundle\Entity\Zona $zona
     * @return Solicitud
     */
    public function addZona(\IAR\CommonsBundle\Entity\Zona $zona)
    {
        $this->zonas[] = $zona;
    
        return $this;
    }

    /**
     * Remove zonas
     *
     * @param \IAR\CommonsBundle\Entity\Zona $zona
     */
    public function removeZona(\IAR\CommonsBundle\Entity\Zona $zona)
    {
        $this->zonas->removeElement($zona);
    }

    /**
     * Get zonas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getZonas()
    {
        return $this->zonas;
    }
}
