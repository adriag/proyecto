<?php
namespace Acme\AdminFotografoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Acme\AdminFotografoBundle\Entity\FormaPagoFotografo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="PlanFotografo")
 * 
 * @DoctrineAssert\UniqueEntity(fields = "codigoPlan", message="El código ingresado ya existe para otro Plan.")
 * 
 */

class PlanFotografo {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank()
     * @Assert\MaxLength(limit = 3, message = "El máximo número de caracteres es 3.")
     * 
     */
    protected $codigoPlan;
    
    
    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\MaxLength(limit = 50, message = "El máximo número de caracteres es 50.")
     * 
     */
    protected $nombre;
    
    
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Assert\MaxLength(limit = 100, message = "El máximo número de caracteres es 100.")
     * 
     */
    protected $descripcion;
    

    /**
     * @ORM\Column(type="integer", length=3)
     * @Assert\MaxLength(limit = 3, message = "El máximo número de dígitos es 3.")
     * 
     */
    protected $diasVigencia;
    
    
    /**
     * @ORM\Column(type="boolean", length=1, nullable=true)
     * 
     */
    protected $disponible;
    
    
    
    /**
     * @ORM\ManyToOne(targetEntity="FormaPagoFotografo", inversedBy="planesFotografos")
     * @ORM\JoinColumn(name = "idFormaPago", referencedColumnName = "id")
     * 
     */
    protected $entidadFormaPago;
    

    /**
     * Set id
     *
     * 
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
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
     * Set codigoPlan
     *
     * @param string $codigoPlan
     * @return PlanFotografo
     */
    public function setCodigoPlan($codigoPlan)
    {
        $this->codigoPlan = $codigoPlan;
    
        return $this;
    }

    /**
     * Get codigoPlan
     *
     * @return string 
     */
    public function getCodigoPlan()
    {
        return $this->codigoPlan;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return PlanFotografo
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return PlanFotografo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set diasVigencia
     *
     * @param integer $diasVigencia
     * @return PlanFotografo
     */
    public function setDiasVigencia($diasVigencia)
    {
        $this->diasVigencia = $diasVigencia;
    
        return $this;
    }

    /**
     * Get diasVigencia
     *
     * @return integer 
     */
    public function getDiasVigencia()
    {
        return $this->diasVigencia;
    }

    /**
     * Set disponible
     *
     * @param boolean $disponible
     * @return PlanFotografo
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;
    
        return $this;
    }

    /**
     * Get disponible
     *
     * @return boolean 
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set entidadFormaPago
     *
     * @param \Acme\AdminFotografoBundle\Entity\FormaPagoFotografo $entidadFormaPago
     * @return PlanFotografo
     */
    public function setEntidadFormaPago(\Acme\AdminFotografoBundle\Entity\FormaPagoFotografo $entidadFormaPago = null)
    {
        $this->entidadFormaPago = $entidadFormaPago;
    
        return $this;
    }

    /**
     * Get entidadFormaPago
     *
     * @return \Acme\AdminFotografoBundle\Entity\FormaPagoFotografo 
     */
    public function getEntidadFormaPago()
    {
        return $this->entidadFormaPago;
    }
}