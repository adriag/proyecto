<?php


namespace Acme\AdminFotografoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $generador, array $opciones){
        $generador->add('id','hidden', array(
        ));
        $generador->add('codigoPlan','text', array(
            'label' =>'Código ',
            'max_length' =>10,
        ));
        $generador->add('nombre','text', array(
            'label' =>'Nombre ',
            'max_length' =>50,
        ));
        $generador->add('descripcion','textarea', array(
            'label' =>'Descripción ',
            'required' =>false,
            'max_length' =>100,
        ));
        $generador->add('diasVigencia','integer', array(
            'label' =>'Días Vigencia ',
            'max_length' =>3,
        ));
        $generador->add('disponible','checkbox', array(
            'label' =>'Disponible ',
            'required' =>false,
        ));
        $generador->add('entidadFormaPago','entity', array(
            'class' =>'Acme\\AdminFotografoBundle\\Entity\\FormaPagoFotografo',
            'label' =>'Forma de Pago ',
            'required' =>false,
        ));

    }
    
    public function getDefaultOptions(array $options) {
        return array('data_class' => 'Acme\AdminFotografoBundle\Entity\PlanFotografo',);
    }
    
    
    public function getName() {
        return 'nombre';
    }
}

?>
