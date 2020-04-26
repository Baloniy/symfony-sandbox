<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Collection;
use App\Form\CollectionFormType;
use App\Repository\CollectionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\{
    Response, Request
};
use Symfony\Component\Routing\Annotation\Route;

class CollectionsController extends AbstractController
{
    /**
     * @param CollectionRepository $collectionRepository
     * @Route("/collections", name="collections")
     * @return Response
     */
    public function index(CollectionRepository $collectionRepository)
    {
        $collections = $collectionRepository->findAllByNewest();
        return $this->render('collections/index.html.twig', [
            'collections' => $collections,
        ]);
    }

    /**
     * @param int $id
     * @param CollectionRepository $collectionRepository
     * @Route("/collections/{id<\d+>}", name="collection_item")
     * @return Response
     */
    public function view(int $id, CollectionRepository $collectionRepository)
    {
        $collection = $collectionRepository->find($id);
        $files = [
            'First file',
            'Second file',
            '3th file',
            '4th file'
        ];

        return $this->render('collections/view.html.twig', [
            'files' => $files,
            'collection' => $collection
        ]);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $em
     * @Route("/collections/create", name="collection_create")
     * @return Response
     * @throws
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(CollectionFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {
            /** @var Collection $collection */
            $collection = $form->getData();
            $collection->setCreatedAt(new\DateTime());
            $em->persist($collection);
            $em->flush();

            $this->addFlash('success', 'Collection is created!');

            return $this->redirectToRoute('collections');
        }

        return $this->render('collections/create.html.twig', [
            'collectionForm' => $form->createView()
        ]);
    }

    /**
     * @param int $id
     * @param CollectionRepository $collectionRepository
     * @Route("/collections/{id}/edit", name="collection_edit")
     * @return Response
     *
     */
    public function edit(int $id, CollectionRepository $collectionRepository)
    {
        $collection = $collectionRepository->find($id);
        return $this->render('collections/edit.html.twig', [
            'collection' => $collection
        ]);
    }
}
