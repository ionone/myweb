<?php

namespace League\VillageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PortalController extends Controller
{

    public function indexAction()
    {
        return $this->render('LeagueVillageBundle:Portal:index.html.twig');
    }

    public function villagesAction($page)
    {
        /* $city = new Cities();
          $city = $this->getDoctrine()
          ->getRepository('LeagueVillageBundle:Cities')
          ->find($id);
          if (null === $city)
          // TODO: Crear página de error
          return $this->render('LeagueVillageBundle:village.html.twig', array('village' => "No encontrado", 'description' => "No encontrado"));
          else {
          $cityString = $city->getName();
          $cityDescription = $city->getDescription();
          return $this->render('LeagueVillageBundle:Portal:villages.html.twig');
          } */

        //Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Repositorios de entidades a utilizar
        $citiesRepository = $em->getRepository("LeagueVillageBundle:Cities");
        /*
          $categoryRepository=$em->getRepository("LeagueVillageBundle:Categories");
          $postRepository=$em->getRepository("LeagueVillageBundle:Posts");

          //Conseguir todas las categorías
          $categories=$categoryRepository->findAll();
         */

        //Conseguir todos los posts paginados
        $pageSize = 3;
        
        $paginator = $citiesRepository->findAll();
        $totalItems = count($paginator);        
        $pagesCount = ceil($totalItems / $pageSize);
        
        $paginator = $citiesRepository->findby(
                array(), //criteria
                array('name' => 'ASC'), //order
                $pageSize, // limit
                ($page * $pageSize - $pageSize)); // first        
        //Renderizamos la vista
        return $this->render('LeagueVillageBundle:Portal:villages.html.twig', array(
                    "cities" => $paginator,
                    "totalItems" => $totalItems,
                    "pagesCount" => $pagesCount,
                    "currentPag" => $page
        ));
    }
}
