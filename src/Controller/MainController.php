<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(EventRepository $eventRepository): Response
    {
        $groupedEvents = $eventRepository->findAllGroupedByDay();
        return $this->render('homepage.html.twig', [
            'groupedEvents' => $groupedEvents,
        ]);
    }
}
