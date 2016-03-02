<?php

namespace Themes\BootstrapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /***
     * @Route("/hello/{name}")
     * @Template()
     */
    
    public function indexAction($name)
    {
        return $this->render('ThemesBootstrapBundle:Default:index.html.twig',
                array('name'=>$name));
    }
}
