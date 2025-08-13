<?php

namespace App\Controller;

use Dom\Entity;
use App\Entity\Notes;
use App\Form\NotesType;
use App\Repository\NotesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class NotesController extends AbstractController
{
    #[Route('/notes', name: 'app_notes')]
    public function index(NotesRepository $notes): Response
    {
        
        return $this->render('notes/index.html.twig', parameters: [
            'notes' => $notes->findAll()
        ]);
    }

    #[Route('/notes/create', name: 'app_notes_create', priority:2)]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {   
        $form = $this->createForm(NotesType::class, new Notes());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $note = $form->getData();
            $note->setCreated(new \DateTime());
            $entityManager->persist($note);
            $entityManager->flush();

            $this->addFlash('success', 'Utworzono nową notatkę');

            return $this->redirectToRoute('app_notes');
        }

        return $this->render('notes/create.html.twig', parameters: [
            'form' => $form
        ]); 
    }

    #[Route('/notes/{id}', name: 'app_notes_show')]
    public function show(Notes $note): Response
    {

        return $this->render('notes/show.html.twig', [
            'note' => $note
        ]);
    }

}
