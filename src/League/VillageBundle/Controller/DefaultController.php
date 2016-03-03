<?php

namespace League\VillageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LeagueVillageBundle:Default:index.html.twig');
    }
}
