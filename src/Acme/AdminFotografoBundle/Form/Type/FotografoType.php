<?php

namespace Acme\AdminFotografoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FotografoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $generador, array $opciones){
        $generador->add('id','hidden', array(
        ));
        $generador->add('nombre','text', array(
            'label' =>'Nombre ',
            'max_length' =>50,
        ));
        $generador->add('apellido','text', array(
            'label' =>'Apellido ',
            'max_length' =>50,
        ));
        $generador->add('email','text', array(
            'label' =>'Email ',
            'max_length' =>50,
        ));
        $generador->add('usuario','text', array(
            'label' =>'Usuario ',
            'max_length' =>30,
        ));
        $generador->add('contrasenia','password', array(
            'label' =>'Contraseña ',
            'max_length' =>30,
        ));
        $generador->add('direccion','text', array(
            'label' =>'Dirección ',
            'max_length' =>50,
        ));
        $generador->add('telefono','text', array(
            'label' =>'Teléfono ',
            'max_length' =>20,
        ));
        $generador->add('estudio','text', array(
            'label' =>'Estudio',
            'max_length' =>50,
        ));
        $generador->add('direccionEstudio','text', array(
            'label' =>'Dirección Estudio',
            'max_length' =>50,
            'required' =>false,
        ));
        $generador->add('telefonoEstudio','text', array(
            'label' =>'Teléfono Estudio',
            'max_length' =>50,
            'required' =>false,
        ));

    }
    
    public function getDefaultOptions(array $options) {
        return array('data_class' => 'Acme\AdminFotografoBundle\Entity\Fotografo',);
    }
    
    
    public function getName() {
        return 'nombre';
    }
}

?>
