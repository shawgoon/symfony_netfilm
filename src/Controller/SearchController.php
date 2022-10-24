<?php

namespace App\Controller;

use App\Repository\FilmsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="app_search")
     */
    public function index(FilmsRepository $filmsRepository): Response
    {
        if(isset($_POST['searchValue']) && !empty($_POST['searchValue'])){
            $searchValue = $_POST['searchValue'];
            // je vais devoir faire une requete pour trouver un films.title correspondant
            $result = $filmsRepository->getTitleLike($searchValue);
            $output = [];
            foreach ($result as $key => $value){
                array_push($output,[
                    "id"=>$value->getId(),
                    "title"=>$value->getTitle()
                ]);
            }
            return new JsonResponse($output);
        }
    }
}
