<?php

namespace Acme\AdminFotografoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FormaPagoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $generador, array $opciones){
        $generador->add('id','hidden', array(
        ));
        $generador->add('codigoFormaPago','text', array(
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
        $generador->add('ayuda','textarea', array(
            'label' =>'Ayuda ',
            'required' =>false,
            'max_length' =>250,
        ));
        $generador->add('disponible','checkbox', array(
            'label' =>'Disponible ',
            'required' =>false,
        ));
        $generador->add('esPrepago','checkbox', array(
            'label' =>'Es Prepago ',
            'required' =>false,
        ));
        $generador->add('esDepositoBancario','checkbox', array(
            'label' =>'Es Depósito Bancario ',
            'required' =>false,
        ));
        $generador->add('entidadCobradoraExterna','entity', array(
            'class' =>'Acme\\AdminFotografoBundle\\Entity\\EntidadCobradora',
            'label' =>'Entidad Cobradora Externa '
        ));

    }
    
    public function getDefaultOptions(array $options) {
        return array('data_class' => 'Acme\AdminFotografoBundle\Entity\FormaPagoFotografo',);
    }
    
    
    public function getName() {
        return 'nombre';
    }
}

?>
