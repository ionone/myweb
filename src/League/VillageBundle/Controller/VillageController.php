<?php

namespace League\VillageBundle\Controller;

use League\VillageBundle\Entity\Cities;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VillageController extends Controller
{
    public function indexAction($id)
    {
        $city = new Cities();
        $city = $this->getDoctrine()
            ->getRepository('LeagueVillageBundle:Cities')
            ->find($id);
        if(null === $city)
            // TODO: Crear página de error
            return $this->render('LeagueVillageBundle:village.html.twig', array('village'=> "No encontrado"));
        else {
            $cityString = $city->getName();        
            return $this->render('LeagueVillageBundle:village.html.twig', array('village'=> $cityString));
        }
    }
}