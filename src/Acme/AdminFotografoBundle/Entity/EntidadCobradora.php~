<?php

namespace Acme\AdminFotografoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="EntidadCobradora")
 * 
 */
class EntidadCobradora {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=200)
     * 
     */
    protected $entidadCobradora;
    
    /**
     * @ORM\OneToMany(targetEntity="FormaPagoFotografo", mappedBy="entidadCobradoraExterna")
     */
    protected $formasPagoFotografos;
    
    
    public function __construct() {
        
        $this->formasPagoFotografos = new ArrayCollection();
    }

    public function __toString() { 
        
       return $this->getEntidadCobradora(); 
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
     * Set entidadCobradora
     *
     * @param string $entidadCobradora
     * @return EntidadCobradora
     */
    public function setEntidadCobradora($entidadCobradora)
    {
        $this->entidadCobradora = $entidadCobradora;
    
        return $this;
    }

    /**
     * Get entidadCobradora
     *
     * @return string 
     */
    public function getEntidadCobradora()
    {
        return $this->entidadCobradora;
    }

    /**
     * Add formasPagoFotografos
     *
     * @param \Acme\AdminFotografoBundle\Entity\FormaPagoFotografo $formasPagoFotografos
     * @return EntidadCobradora
     */
    public function addFormasPagoFotografo(\Acme\AdminFotografoBundle\Entity\FormaPagoFotografo $formasPagoFotografos)
    {
        $this->formasPagoFotografos[] = $formasPagoFotografos;
    
        return $this;
    }

    /**
     * Remove formasPagoFotografos
     *
     * @param \Acme\AdminFotografoBundle\Entity\FormaPagoFotografo $formasPagoFotografos
     */
    public function removeFormasPagoFotografo(\Acme\AdminFotografoBundle\Entity\FormaPagoFotografo $formasPagoFotografos)
    {
        $this->formasPagoFotografos->removeElement($formasPagoFotografos);
    }

    /**
     * Get formasPagoFotografos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormasPagoFotografos()
    {
        return $this->formasPagoFotografos;
    }
}