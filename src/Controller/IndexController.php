<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CollectionRepository;

class IndexController extends AbstractController
{
    /**
     * @param CollectionRepository $collectionRepository
     * @Route("/", name="homepage")
     * @return Response
     */
    public function homepage(CollectionRepository $collectionRepository)
    {
        $collections = $collectionRepository->findAll();
        $files = [
            'First file',
            'Second file',
            '3th file',
            '4th file'
        ];
        return $this->render('index.html.twig',[
            'collections' => $collections,
            'files' => $files
        ]);
    }
}