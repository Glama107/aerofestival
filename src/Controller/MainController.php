<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\EventRepository;
use App\Repository\PartnerRepository;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(EventRepository $eventRepository, PartnerRepository $partnerRepository, Request $request, EntityManagerInterface $entityManager, MailerService $mailerService): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $mailerService->sendEmail($contact);


            $this->addFlash('success', 'Votre message a bien été envoyé !');
            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }
        $groupedEvents = $eventRepository->findAllGroupedByDay();
        $partners = $partnerRepository->findAll();
        return $this->render('homepage.html.twig', [
            'groupedEvents' => $groupedEvents,
            'partners' => $partners,
            'contactForm' => $form->createView(),
        ]);
    }
}
