<?php

namespace App\Controller;

use App\Entity\Entertainment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Entertainment::class);
        $entertainments = [
            'movies' => $repository->findBy([ 'type' => Entertainment::Movie ]),
            'books' => $repository->findBy([ 'type' => Entertainment::Book ]),
            'musics' => $repository->findBy([ 'type' => Entertainment::Music ]),
            'games' => $repository->findBy([ 'type' => Entertainment::Game ]),
        ];
        return $this->render('home/index.html.twig', $entertainments);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig', [
        ]);
    }
}
