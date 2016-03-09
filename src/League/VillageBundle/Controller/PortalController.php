<?php

namespace League\VillageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PortalController extends Controller
{

    public function indexAction()
    {
        return $this->render('LeagueVillageBundle:Portal:index.html.twig');
    }    
}
