<?php

namespace App\Controller;

use App\Entity\Epiavion;
use App\Form\EpiavionType;
use App\Repository\EpiavionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/epiavion")
 */
class EpiavionController extends AbstractController
{
    /**
     * @Route("/", name="epiavion_index", methods={"GET"})
     */
    public function epiavion_index(EpiavionRepository $epiavionRepository): Response
    {
        return $this->render('epiavion/index.html.twig', [
            'epiavions' => $epiavionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="epiavion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $epiavion = new Epiavion();
        $form = $this->createForm(EpiavionType::class, $epiavion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($epiavion);
            $entityManager->flush();

            return $this->redirectToRoute('epiavion_index');
        }

        return $this->render('epiavion/new.html.twig', [
            'epiavion' => $epiavion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="epiavion_show", methods={"GET"})
     */
    public function show(Epiavion $epiavion): Response
    {
        return $this->render('epiavion/show.html.twig', [
            'epiavion' => $epiavion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="epiavion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Epiavion $epiavion): Response
    {
        $form = $this->createForm(EpiavionType::class, $epiavion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('epiavion_index');
        }

        return $this->render('epiavion/edit.html.twig', [
            'epiavion' => $epiavion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="epiavion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Epiavion $epiavion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$epiavion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($epiavion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('epiavion_index');
    }
}
