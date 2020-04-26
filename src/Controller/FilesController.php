<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FilesController extends AbstractController
{
    /**
     * @Route("/files", name="files")
     */
    public function index()
    {
        $files = [
            'First file',
            'Second file',
            '3th file',
            '4th file'
        ];
        return $this->render('files/index.html.twig', [
            'files' => $files,
        ]);
    }

    /**
     * @Route("files/new", name="files_new")
     */
    public function create()
    {
        return $this->render('files/create.html.twig');
    }

    /**
     * @Route("/files/test", name="upload_test", methods={"POST"})
     * @param Request $request
     */
    public function temporaryUploadAction(Request  $request)
    {
        dd($request->files->get('file'));
    }
}
