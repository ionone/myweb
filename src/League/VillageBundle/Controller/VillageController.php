<?php

namespace League\VillageBundle\Controller;

use League\VillageBundle\Entity\Cities;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VillageController extends Controller
{
    public function indexAction()
    {
        /*
        $city = new Cities();
        $city = $this->getDoctrine()
            ->getRepository('LeagueVillageBundle:Cities')
            ->find($id);
        if(null === $city)
            // TODO: Crear página de error
            return $this->render('LeagueVillageBundle:village.html.twig', array('village'=> "No encontrado", 'description' => "No encontrado"));
        else {
            $cityString = $city->getName();
            $cityDescription = $city->getDescription();
            return $this->render('LeagueVillageBundle:village.html.twig', array('village'=> $cityString, 'description' => $cityDescription));
        }*/
        return $this->render('LeagueVillageBundle:village.html.twig');
    }
}