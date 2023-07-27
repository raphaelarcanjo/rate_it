<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig');
    }
    
    #[Route('/contact/send', name: 'contact_message', methods: ['POST'])]
    public function send(Request $request): Response
    {
        if ($this->isCsrfTokenValid('send-message', $request->request->get('token'))) {
            $this->addFlash('success', "Your message was sent successfuly!");
        } else {
            $this->addFlash('danger', "Stop sending CSRF attacks!");
        }
        
        return $this->redirectToRoute('contact');
    }
}
