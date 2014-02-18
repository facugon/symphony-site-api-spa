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
     * @var Zona 
     *
     * @Assert\NotNull
     * @Assert\Valid
     *
     * @ORM\ManyToOne(targetEntity="Zona")
     * @ORM\JoinColumn(name="zona_id",referencedColumnName="id", nullable=false)
     */
    private $zona;

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
     * Set zona
     *
     * @param \IAR\ComprasBundle\Entity\Zona $zona
     * @return Solicitud
     */
    public function setZona(\IAR\ComprasBundle\Entity\Zona $zona)
    {
        $this->zona = $zona;
    
        return $this;
    }

    /**
     * Get zona
     *
     * @return \IAR\ComprasBundle\Entity\Zona 
     */
    public function getZona()
    {
        return $this->zona;
    }

    public function set(array $input)
    {
        $props = get_object_vars($this);

        foreach( $props as $property => $value ) {
            if( isset($input[ $property ]) ) {
                $this->{$property} = $input[$property] ;
            }
        }

        return $this;
    }
}