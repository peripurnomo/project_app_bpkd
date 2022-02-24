<?php

namespace App\Controller;

use App\Entity\Kendaraan;
use App\Form\KendaraanType;
use App\Repository\KendaraanRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KendaraanController extends AbstractController
{
    #[Route('/', name: 'kendaraan_index', methods: ['GET'])]
    public function index(KendaraanRepository $kendaraanRepository): Response
    {
        return $this->render('kendaraan/index.html.twig', [
            'kendaraans' => $kendaraanRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'kendaraan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $kendaraan = new Kendaraan();
        $form = $this->createForm(KendaraanType::class, $kendaraan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($kendaraan);
            $entityManager->flush();

            return $this->redirectToRoute('kendaraan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('kendaraan/new.html.twig', [
            'kendaraan' => $kendaraan,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'kendaraan_show', methods: ['GET'])]
    public function show(Kendaraan $kendaraan): Response
    {
        return $this->render('kendaraan/show.html.twig', [
            'kendaraan' => $kendaraan,
        ]);
    }

    #[Route('/{id}/edit', name: 'kendaraan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Kendaraan $kendaraan, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(KendaraanType::class, $kendaraan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('kendaraan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('kendaraan/edit.html.twig', [
            'kendaraan' => $kendaraan,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'kendaraan_delete', methods: ['POST'])]
    public function delete(Request $request, Kendaraan $kendaraan, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kendaraan->getId(), $request->request->get('_token'))) {
            $entityManager->remove($kendaraan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('kendaraan_index', [], Response::HTTP_SEE_OTHER);
    }
}
