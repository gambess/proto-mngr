<?php

namespace App\Controller;

use App\Entity\RideStop;
use App\Form\RideStopForm;
use App\Repository\RideStopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ride/stop')]
final class RideStopController extends AbstractController
{
    #[Route(name: 'app_ride_stop_index', methods: ['GET'])]
    public function index(RideStopRepository $rideStopRepository): Response
    {
        return $this->render('ride_stop/index.html.twig', [
            'ride_stops' => $rideStopRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ride_stop_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rideStop = new RideStop();
        $form = $this->createForm(RideStopForm::class, $rideStop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rideStop);
            $entityManager->flush();

            return $this->redirectToRoute('app_ride_stop_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ride_stop/new.html.twig', [
            'ride_stop' => $rideStop,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ride_stop_show', methods: ['GET'])]
    public function show(RideStop $rideStop): Response
    {
        return $this->render('ride_stop/show.html.twig', [
            'ride_stop' => $rideStop,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ride_stop_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RideStop $rideStop, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RideStopForm::class, $rideStop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ride_stop_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ride_stop/edit.html.twig', [
            'ride_stop' => $rideStop,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ride_stop_delete', methods: ['POST'])]
    public function delete(Request $request, RideStop $rideStop, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rideStop->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($rideStop);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ride_stop_index', [], Response::HTTP_SEE_OTHER);
    }
}
