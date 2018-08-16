<?php

namespace App\Controller;

use App\Entity\Upload;
use App\Form\UploadType;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @param FileUploader $fileUploader
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, FileUploader $fileUploader) {
        $upload = new Upload();
        $form = $this->createForm(UploadType::class, $upload);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $upload->getName();
            $fileName = $fileUploader->uploadFile($file);
            $upload->setName($fileName);

            return $this->redirectToRoute('homepage');
        }

        $template = 'default/index.html.twig';
        $args = [
            'name' => 'Artur Torres',
            'form' => $form->createView(),
        ];

        return $this->render($template, $args);
    }
}
