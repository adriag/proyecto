<?php

namespace Acme\AdminFotografoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\AdminFotografoBundle\Entity\FormaPagoFotografo;
use Acme\AdminFotografoBundle\Entity\EntidadCobradora;
use Acme\AdminFotografoBundle\Form\Type\FormaPagoType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Acme\AdminFotografoBundle\Entity\PlanFotografo;
use Acme\AdminFotografoBundle\Form\Type\PlanType;
use Acme\AdminFotografoBundle\Entity\Fotografo;
use Acme\AdminFotografoBundle\Form\Type\FotografoType;


class DefaultController extends Controller
{
    
    public function menuFotografoAction()
    {
        return $this->render('AcmeAdminFotografoBundle:Default:newTwigTemplate2.html.twig');
    }


    /*
     * Administración de Formas de Pago para Fotógrafos
     */
    public function adminFPFotografoAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $formaspago = $em->getRepository('AcmeAdminFotografoBundle:FormaPagoFotografo')
                            ->findAll();
        
         return $this->render('AcmeAdminFotografoBundle:Default:adminFormaPago.html.twig', array('formaspago' =>$formaspago));
    }
    
    /*
     * Alta de nueva Forma de Pago para Fotógrafos
     */
    public function altaFPFotografoAction(Request $request)
    {
        
        $formaPago = new FormaPagoFotografo();

        $form = $this->createForm(new FormaPagoType(), $formaPago);
        
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());
            
            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($formaPago);
                $em->flush();

                return $this->redirect($this->generateUrl('admin_fp_fotografo'));
            }
        }
        
        $em1 = $this->getDoctrine()->getEntityManager();

        $entidades = $em1->getRepository('AcmeAdminFotografoBundle:EntidadCobradora')
                            ->findAll();

        return $this->render('AcmeAdminFotografoBundle:Default:altaFormaPago.html.twig', array(
            'form' => $form->createView(),
            ));
    }
    
    /*
     * Modificar una Forma de Pago para Fotógrafos
     */
    public function modifFPFotografoAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getEntityManager();

        $id = $_GET["id"];
        
        $fpfotografo = $em->getRepository('AcmeAdminFotografoBundle:FormaPagoFotografo')->find($id);
       
        $form = $this->createForm(new FormaPagoType(), $fpfotografo);

        /*
        $form = $this->createFormBuilder($fpfotografo)
			->add('codigoFormaPago', 'text',array('label' => 'Código:'))
                        ->add('nombre', 'text', array('label' => 'Nombre:'))
                        ->getForm();
        */

        if ($this->getRequest()->getMethod() == 'POST') {
            
           $form->bindRequest($request);
            
            if ($form->isValid()) {

                $em->flush();

                return $this->redirect($this->generateUrl('admin_fp_fotografo'));
            }
        }

        return $this->render('AcmeAdminFotografoBundle:Default:modifFormaPago1.html.twig', array(
            'form' => $form->createView(),
            'id'   => $id,
            ));
    }
    
    /*
     * Eliminar una Forma de Pago para Fotógrafos
     */
    public function elimFPFotografoAction(Request $request)
    {
        $ids = $_GET["id"];
        $em = $this->getDoctrine()->getEntityManager();
        
        $fpfotografo = $em->getRepository('AcmeAdminFotografoBundle:FormaPagoFotografo')
                            ->find($ids);
        
        $entidad = $fpfotografo -> getEntidadCobradoraExterna();
        $RT = $entidad -> getId();
        $existe = FALSE;
        
        $planesFotografo = $em->getRepository('AcmeAdminFotografoBundle:PlanFotografo')
                ->findAll();
        
        foreach ($planesFotografo as $plan) {
            $idPlan = $plan->getId();
            if ($idPlan == $RT){
                 $existe = TRUE;
            }
        }
        
        $em->remove($fpfotografo);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_fp_fotografo'));
    }
    
    
    /*
     * Administración Planes para Fotógrafos
     */
    public function adminPlanFotografoAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $planes = $em->getRepository('AcmeAdminFotografoBundle:PlanFotografo')
                            ->findAll();
        
        
         return $this->render('AcmeAdminFotografoBundle:Default:adminPlanFotografo.html.twig', array('planes' =>$planes));
    }
    
    
     /*
     * Alta de nuevo Plan para Fotógrafos
     */
    public function altaPlanFotografoAction(Request $request)
    {
        $plan = new PlanFotografo();

        $form = $this->createForm(new PlanType(), $plan);
        
        if ($this->getRequest()->getMethod() == 'POST') {
            
            $form->bindRequest($this->getRequest());
            
            if ($form->isValid()) {
                            
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($plan);
                $em->flush();
                
                return $this->redirect($this->generateUrl('admin_plan_fotografo'));
            }
        }
        
        $em1 = $this->getDoctrine()->getEntityManager();

        $formasPago = $em1->getRepository('AcmeAdminFotografoBundle:FormaPagoFotografo')->findAll();

        return $this->render('AcmeAdminFotografoBundle:Default:altaPlan.html.twig', array(
            'form' => $form->createView(),
            ));
    }
   
    
    /*
     * Eliminar Plan para Fotógrafos
     */
    public function elimPlanFotografoAction(Request $request)
    {
        
        $ids = $_GET["id"];
        $em = $this->getDoctrine()->getEntityManager();
        
        $planFot = $em->getRepository('AcmeAdminFotografoBundle:PlanFotografo')
                            ->find($ids);
        
        $existe = FALSE;
        
        $em->remove($planFot);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_plan_fotografo'));
    }
    
    
    /*
     * Modificar Plan para Fotógrafos
     */
    public function modifPlanFotografoAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $id = $_GET["id"];
        
        $plan = $em->getRepository('AcmeAdminFotografoBundle:PlanFotografo')->find($id);

        $form = $this->createForm(new PlanType(), $plan);

        if ($this->getRequest()->getMethod() == 'POST') {
            
            $form->bindRequest($request);
            
            if ($form->isValid()) {
            
                $em->flush();

                return $this->redirect($this->generateUrl('admin_plan_fotografo'));
            }
        }
        
        return $this->render('AcmeAdminFotografoBundle:Default:modifPlan.html.twig', array(
            'form' => $form->createView(),
            'id'   => $id,
            ));
    }
    
    
    
    
    /*
     * Alta de nuevo Fotógrafo
     */
    public function altaFotografoAction(Request $request)
    {
        $fotografo = new Fotografo();

        $form = $this->createForm(new FotografoType(), $fotografo);
        
        if ($this->getRequest()->getMethod() == 'POST') {
            
            $form->bindRequest($this->getRequest());
            
       
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($fotografo);
                $em->flush();
                $email1 = $fotografo->getEmail();
                
                $repositorio = $this->getDoctrine()->getRepository('AcmeAdminFotografoBundle:Fotografo');
                $fotog = $repositorio->findOneByEmail($email1);
                $id = $fotog->getId();
                
                return $this->render('AcmeAdminFotografoBundle:Default:adminFotografo1.html.twig', array(
                    'email1' => $email1,
                     'id'    => $id,
                    ));
            }
        }
        

        return $this->render('AcmeAdminFotografoBundle:Default:altaFotografo.html.twig', array(
            'form' => $form->createView(),
            ));
    }
   
    
    /*
     * Eliminar Fotógrafo
     */
    public function elimFotografoAction(Request $request)
    {
        
        $ids = $_GET["id"];
        $em = $this->getDoctrine()->getEntityManager();
        
        $planFot = $em->getRepository('AcmeAdminFotografoBundle:Fotografo')
                            ->find($ids);
        
        $existe = FALSE;
        
        $em->remove($planFot);
        $em->flush();
        
        return $this->redirect($this->generateUrl('admin_fotografo'));
    }
    
    
    /*
     * Modificar datos Fotógrafo
     */
    public function modifFotografoAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $id = $_GET["id"];
        
        $fotografo = $em->getRepository('AcmeAdminFotografoBundle:Fotografo')->find($id);
        
        $form = $this->createForm(new FotografoType(), $fotografo);
        
        if ($this->getRequest()->getMethod() == 'POST') {
            
            $form->bindRequest($request);
            
            if ($form->isValid()) {
            
                $em->flush();

                return $this->render('AcmeAdminFotografoBundle:Default:adminFotografo1.html.twig', array(
                'id'   => $id,
                ));
            }
        }
        
        return $this->render('AcmeAdminFotografoBundle:Default:modifFotografo.html.twig', array(
            'form' => $form->createView(),
            'id'   => $id,
            ));
    }
    
    
    public function adminFotografo1Action()
    {
        $id = $_GET["id"];
               
         return $this->render('AcmeAdminFotografoBundle:Default:adminFotografo1.html.twig', array(
                'id'   => $id,
                ));
    }
    
    
     /*
     * Administración Fotógrafos
     */
    public function adminFotografoAction()
    {
               
         return $this->render('AcmeAdminFotografoBundle:Default:adminFotografo.html.twig');
    }
    
    
    /*
     * Cerrar sesión Fotógrafo
     */
    public function logoutFotografoAction()
    {
               
         return $this->render('AcmeAdminFotografoBundle:Default:adminFotografo.html.twig');
    }
    
    
    
    /*
     * Login Fotógrafo
     */
    public function loginFotografoAction(Request $request)
    {
        
        session_start();
        
         if ($this->getRequest()->getMethod() == 'POST'){
             
             $username = $_POST["frmUsername"];
             $password = $_POST["frmPassword"];

             $loginExitoso = false;

             $em = $this->getDoctrine()->getEntityManager();
             $fotografos = $em->getRepository('AcmeAdminFotografoBundle:Fotografo')->findAll();
             
             
             foreach ($fotografos as $fotografo){
                 
                 $user = $fotografo->getUsuario();
                 $pass = $fotografo->getContrasenia();
                 
                 if($user == $username && $pass == $password){
                     $loginExitoso = true;
                     $id = $fotografo->getId();
                 }
                 
             }
             
             if($loginExitoso){
                 return $this->render('AcmeAdminFotografoBundle:Default:adminFotografo1.html.twig', array(
                'id'   => $id,
                ));
             } else {
                 return $this->render('AcmeAdminFotografoBundle:Default:login.html.twig');
             }
 
         }
        return $this->render('AcmeAdminFotografoBundle:Default:login.html.twig');
        
    }
    
    
}
