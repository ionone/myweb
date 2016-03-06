<?php

namespace League\VillageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use League\VillageBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('LeagueVillageBundle:Default:index.html.twig');
    }

    public function contactAction()
    {       
        $frmContact = new Contact();
        $frmContact->setDate(new \DateTime('now'));

        $form = $this->createFormBuilder($frmContact)
                ->add('date', 'datetime', array(                    
                    'label' => ' ',
                    ))
                ->add('email', 'email', array(                    
                    'label' => 'Correo Electrónico',
                    ))
                ->add('name', 'text', array(                    
                    'label' => 'Nombre',
                    ))
                ->add('text', 'textarea', array(                    
                    'label' => 'Inserte su comentario',
                    ))
                ->getForm();

        return $this->render('LeagueVillageBundle:Default:contactnew.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    public function responseAction(Request $request)
    {
        $frmContact = new Contact();

        $form = $this->createFormBuilder($frmContact)    
                ->add('date', 'datetime')
                ->add('email', 'email')
                ->add('name', 'text')
                ->add('text', 'textarea')
                ->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                // realiza alguna acción, tal como guardar la tarea en la base de datos

                return $this->render('LeagueVillageBundle:Default:send_ok.html.twig');
            }
        }
    }    
}
