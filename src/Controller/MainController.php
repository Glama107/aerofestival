<?php

namespace App\Controller;

use App\Repository\EventRepository;
use App\Repository\PartnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(EventRepository $eventRepository, PartnerRepository $partnerRepository): Response
    {
        $groupedEvents = $eventRepository->findAllGroupedByDay();
        $partners = $partnerRepository->findAll();
        return $this->render('homepage.html.twig', [
            'groupedEvents' => $groupedEvents,
            'partners' => $partners,
        ]);
    }
}
