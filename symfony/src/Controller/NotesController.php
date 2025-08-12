<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NotesController extends AbstractController
{
    #[Route('/notes', name: 'app_notes')]
    public function index(): Response
    {
        return $this->render('notes/index.html.twig', [
            
        ]);
    }

    #[Route('/notes/create', name: 'app_notes_create')]
    public function create(): Response
    {        return $this->render('notes/create.html.twig', [
            'controller_name' => 'NotesController',
        ]); 
}

}
